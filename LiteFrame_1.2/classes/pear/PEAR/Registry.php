<?php
/**
 * PEAR_Registry
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   pear
 * @package    PEAR
 * @author     Stig Bakken <ssb@php.net>
 * @author     Tomas V. V. Cox <cox@idecnet.com>
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Registry.php,v 1.170 2008/01/03 20:26:36 cellog Exp $
 * @link       http://pear.php.net/package/PEAR
 * @since      File available since Release 0.1
 */

/**
 * for PEAR_Error
 */
require_once 'PEAR.php';
require_once 'PEAR/DependencyDB.php';

define('PEAR_REGISTRY_ERROR_LOCK',   -2);
define('PEAR_REGISTRY_ERROR_FORMAT', -3);
define('PEAR_REGISTRY_ERROR_FILE',   -4);
define('PEAR_REGISTRY_ERROR_CONFLICT', -5);
define('PEAR_REGISTRY_ERROR_CHANNEL_FILE', -6);

/**
 * Administration class used to maintain the installed package database.
 * @category   pear
 * @package    PEAR
 * @author     Stig Bakken <ssb@php.net>
 * @author     Tomas V. V. Cox <cox@idecnet.com>
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: 1.7.1
 * @link       http://pear.php.net/package/PEAR
 * @since      Class available since Release 1.4.0a1
 */
class PEAR_Registry extends PEAR
{
    // {{{ properties

    /**
     * File containing all channel information.
     * @var string
     */
    var $channels = '';

    /** Directory where registry files are stored.
     * @var string
     */
    var $statedir = '';

    /** File where the file map is stored
     * @var string
     */
    var $filemap = '';

    /** Directory where registry files for channels are stored.
     * @var string
     */
    var $channelsdir = '';

    /** Name of file used for locking the registry
     * @var string
     */
    var $lockfile = '';

    /** File descriptor used during locking
     * @var resource
     */
    var $lock_fp = null;

    /** Mode used during locking
     * @var int
     */
    var $lock_mode = 0; // XXX UNUSED

    /** Cache of package information.  Structure:
     * array(
     *   'package' => array('id' => ... ),
     *   ... )
     * @var array
     */
    var $pkginfo_cache = array();

    /** Cache of file map.  Structure:
     * array( '/path/to/file' => 'package', ... )
     * @var array
     */
    var $filemap_cache = array();

    /**
     * @var false|PEAR_ChannelFile
     */
    var $_pearChannel;

    /**
     * @var false|PEAR_ChannelFile
     */
    var $_peclChannel;

    /**
     * @var PEAR_DependencyDB
     */
    var $_dependencyDB;

    /**
     * @var PEAR_Config
     */
    var $_config;
    // }}}

    // {{{ constructor

    /**
     * PEAR_Registry constructor.
     *
     * @param string (optional) PEAR install directory (for .php files)
     * @param PEAR_ChannelFile PEAR_ChannelFile object representing the PEAR channel, if
     *        default values are not desired.  Only used the very first time a PEAR
     *        repository is initialized
     * @param PEAR_ChannelFile PEAR_ChannelFile object representing the PECL channel, if
     *        default values are not desired.  Only used the very first time a PEAR
     *        repository is initialized
     *
     * @access public
     */
    function PEAR_Registry($pear_install_dir = PEAR_INSTALL_DIR, $pear_channel = false,
                           $pecl_channel = false)
    {
        parent::PEAR();
        $ds = DIRECTORY_SEPARATOR;
        $this->install_dir = $pear_install_dir;
        $this->channelsdir = $pear_install_dir.$ds.'.channels';
        $this->statedir = $pear_install_dir.$ds.'.registry';
        $this->filemap  = $pear_install_dir.$ds.'.filemap';
        $this->lockfile = $pear_install_dir.$ds.'.lock';
        $this->_pearChannel = $pear_channel;
        $this->_peclChannel = $pecl_channel;
        $this->_config = false;
    }

    function hasWriteAccess()
    {
        if (!file_exists($this->install_dir)) {
            $dir = $this->install_dir;
            while ($dir && $dir != '.') {
                $olddir = $dir;
                $dir = dirname($dir); // cd ..
                if ($dir != '.' && file_exists($dir)) {
                    if (is_writeable($dir)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if ($dir == $olddir) { // this can happen in safe mode
                    return @is_writable($dir);
                }
            }
            return false;
        }
        return is_writeable($this->install_dir);
    }

    function setConfig(&$config)
    {
        $this->_config = &$config;
    }

    function _initializeChannelDirs()
    {
        static $running = false;
        if (!$running) {
            $running = true;
            $ds = DIRECTORY_SEPARATOR;
            if (!is_dir($this->channelsdir) ||
                  !file_exists($this->channelsdir . $ds . 'pear.php.net.reg') ||
                  !file_exists($this->channelsdir . $ds . 'pecl.php.net.reg') ||
                  !file_exists($this->channelsdir . $ds . '__uri.reg')) {
                if (!file_exists($this->channelsdir . $ds . 'pear.php.net.reg')) {
                    $pear_channel = $this->_pearChannel;
                    if (!is_a($pear_channel, 'PEAR_ChannelFile') || !$pear_channel->validate()) {
                        if (!class_exists('PEAR_ChannelFile')) {
                            require_once 'PEAR/ChannelFile.php';
                        }
                        $pear_channel = new PEAR_ChannelFile;
                        $pear_channel->setName('pear.php.net');
                        $pear_channel->setAlias('pear');
                        $pear_channel->setServer('pear.php.net');
                        $pear_channel->setSummary('PHP Extension and Application Repository');
                        $pear_channel->setDefaultPEARProtocols();
                        $pear_channel->setBaseURL('REST1.0', 'http://pear.php.net/rest/');
                        $pear_channel->setBaseURL('REST1.1', 'http://pear.php.net/rest/');
                    } else {
                        $pear_channel->setName('pear.php.net');
                        $pear_channel->setAlias('pear');
                    }
                    $pear_channel->validate();
                    $this->_addChannel($pear_channel);
                }
                if (!file_exists($this->channelsdir . $ds . 'pecl.php.net.reg')) {
                    $pecl_channel = $this->_peclChannel;
                    if (!is_a($pecl_channel, 'PEAR_ChannelFile') || !$pecl_channel->validate()) {
                        if (!class_exists('PEAR_ChannelFile')) {
                            require_once 'PEAR/ChannelFile.php';
                        }
                        $pecl_channel = new PEAR_ChannelFile;
                        $pecl_channel->setName('pecl.php.net');
                        $pecl_channel->setAlias('pecl');
                        $pecl_channel->setServer('pecl.php.net');
                        $pecl_channel->setSummary('PHP Extension Community Library');
                        $pecl_channel->setDefaultPEARProtocols();
                        $pecl_channel->setBaseURL('REST1.0', 'http://pecl.php.net/rest/');
                        $pecl_channel->setBaseURL('REST1.1', 'http://pecl.php.net/rest/');
                        $pecl_channel->setValidationPackage('PEAR_Validator_PECL', '1.0');
                    } else {
                        $pecl_channel->setName('pecl.php.net');
                        $pecl_channel->setAlias('pecl');
                    }
                    $pecl_channel->validate();
                    $this->_addChannel($pecl_channel);
                }
                if (!file_exists($this->channelsdir . $ds . '__uri.reg')) {
                    if (!class_exists('PEAR_ChannelFile')) {
                        require_once 'PEAR/ChannelFile.php';
                    }
                    $private = new PEAR_ChannelFile;
                    $private->setName('__uri');
                    $private->addFunction('xmlrpc', '1.0', '****');
                    $private->setSummary('Pseudo-channel for static packages');
                    $this->_addChannel($private);
                }
                $this->_rebuildFileMap();
            }
            $running = false;
        }
    }

    function _initializeDirs()
    {
        $ds = DIRECTORY_SEPARATOR;
        // XXX Compatibility code should be removed in the future
        // rename all registry files if any to lowercase
        if (!OS_WINDOWS && file_exists($this->statedir) && is_dir($this->statedir) &&
              $handle = opendir($this->statedir)) {
            $dest = $this->statedir . $ds;
            while (false !== ($file = readdir($handle))) {
                if (preg_match('/^.*[A-Z].*\.reg\\z/', $file)) {
                    rename($dest . $file, $dest . strtolower($file));
                }
            }
            closedir($handle);
        }
        $this->_initializeChannelDirs();
        if (!file_exists($this->filemap)) {
            $this->_rebuildFileMap();
        }
        $this->_initializeDepDB();
    }

    function _initializeDepDB()
    {
        if (!isset($this->_dependencyDB)) {
            static $initializing = false;
            if (!$initializing) {
                $initializing = true;
                if (!$this->_config) { // never used?
                    if (OS_WINDOWS) {
                        $file = 'pear.ini';
                    } else {
                        $file = '.pearrc';
                    }
                    $this->_config = &new PEAR_Config($this->statedir . DIRECTORY_SEPARATOR .
                        $file);
                    $this->_config->setRegistry($this);
                    $this->_config->set('php_dir', $this->install_dir);
                }
                $this->_dependencyDB = &PEAR_DependencyDB::singleton($this->_config);
                if (PEAR::isError($this->_dependencyDB)) {
                    // attempt to recover by removing the dep db
                    if (file_exists($this->_config->get('php_dir', null, 'pear.php.net') .
                        DIRECTORY_SEPARATOR . '.depdb')) {
                        @unlink($this->_config->get('php_dir', null, 'pear.php.net') .
                            DIRECTORY_SEPARATOR . '.depdb');
                    }
                    $this->_dependencyDB = &PEAR_DependencyDB::singleton($this->_config);
                    if (PEAR::isError($this->_dependencyDB)) {
                        echo $this->_dependencyDB->getMessage();
                        echo 'Unrecoverable error';
                        exit(1);
                    }
                }
                $initializing = false;
            }
        }
    }
    // }}}
    // {{{ destructor

    /**
     * PEAR_Registry destructor.  Makes sure no locks are forgotten.
     *
     * @access private
     */
    function _PEAR_Registry()
    {
        parent::_PEAR();
        if (is_resource($this->lock_fp)) {
            $this->_unlock();
        }
    }

    // }}}

    // {{{ _assertStateDir()

    /**
     * Make sure the directory where we keep registry files exists.
     *
     * @return bool TRUE if directory exists, FALSE if it could not be
     * created
     *
     * @access private
     */
    function _assertStateDir($channel = false)
    {
        if ($channel && $this->_getChannelFromAlias($channel) != 'pear.php.net') {
            return $this->_assertChannelStateDir($channel);
        }
        static $init = false;
        if (!file_exists($this->statedir)) {
            if (!$this->hasWriteAccess()) {
                return false;
            }
            require_once 'System.php';
            if (!System::mkdir(array('-p', $this->statedir))) {
                return $this->raiseError("could not create directory '{$this->statedir}'");
            }
            $init = true;
        } elseif (!is_dir($this->statedir)) {
            return $this->raiseError('Cannot create directory ' . $this->statedir . ', ' .
                'it already exists and is not a directory');
        }
        $ds = DIRECTORY_SEPARATOR;
        if (!file_exists($this->channelsdir)) {
            if (!file_exists($this->channelsdir . $ds . 'pear.php.net.reg') ||
                  !file_exists($this->channelsdir . $ds . 'pecl.php.net.reg') ||
                  !file_exists($this->channelsdir . $ds . '__uri.reg')) {
                $init = true;
            }
        } elseif (!is_dir($this->channelsdir)) {
            return $this->raiseError('Cannot create directory ' . $this->channelsdir . ', ' .
                'it already exists and is not a directory');
        }
        if ($init) {
            static $running = false;
            if (!$running) {
                $running = true;
                $this->_initializeDirs();
                $running = false;
                $init = false;
            }
        } else {
            $this->_initializeDepDB();
        }
        return true;
    }

    // }}}
    // {{{ _assertChannelStateDir()

    /**
     * Make sure the directory where we keep registry files exists for a non-standard channel.
     *
     * @param string channel name
     * @return bool TRUE if directory exists, FALSE if it could not be
     * created
     *
     * @access private
     */
    function _assertChannelStateDir($channel)
    {
        $ds = DIRECTORY_SEPARATOR;
        if (!$channel || $this->_getChannelFromAlias($channel) == 'pear.php.net') {
            if (!file_exists($this->channelsdir . $ds . 'pear.php.net.reg')) {
                $this->_initializeChannelDirs();
            }
            return $this->_assertStateDir($channel);
        }
        $channelDir = $this->_channelDirectoryName($channel);
        if (!is_dir($this->channelsdir) ||
              !file_exists($this->channelsdir . $ds . 'pear.php.net.reg')) {
            $this->_initializeChannelDirs();
        }
        if (!file_exists($channelDir)) {
            if (!$this->hasWriteAccess()) {
                return false;
            }
            require_once 'System.php';
            if (!System::mkdir(array('-p', $channelDir))) {
                return $this->raiseError("could not create directory '" . $channelDir .
                    "'");
            }
        } elseif (!is_dir($channelDir)) {
            return $this->raiseError("could not create directory '" . $channelDir .
                "', already exists and is not a directory");
        }
        return true;
    }

    // }}}
    // {{{ _assertChannelDir()

    /**
     * Make sure the directory where we keep registry files for channels exists
     *
     * @return bool TRUE if directory exists, FALSE if it could not be
     * created
     *
     * @access private
     */
    function _assertChannelDir()
    {
        if (!file_exists($this->channelsdir)) {
            if (!$this->hasWriteAccess()) {
                return false;
            }
            require_once 'System.php';
            if (!System::mkdir(array('-p', $this->channelsdir))) {
                return $this->raiseError("could not create directory '{$this->channelsdir}'");
            }
        } elseif (!is_dir($this->channelsdir)) {
            return $this->raiseError("could not create directory '{$this->channelsdir}" .
                "', it already exists and is not a directory");
            
        }
        if (!file_exists($this->channelsdir . DIRECTORY_SEPARATOR . '.alias')) {
            if (!$this->hasWriteAccess()) {
                return false;
            }
            require_once 'System.php';
            if (!System::mkdir(array('-p', $this->channelsdir . DIRECTORY_SEPARATOR . '.alias'))) {
                return $this->raiseError("could not create directory '{$this->channelsdir}/.alias'");
            }
        } elseif (!is_dir($this->channelsdir . DIRECTORY_SEPARATOR . '.alias')) {
            return $this->raiseError("could not create directory '{$this->channelsdir}" .
                "/.alias', it already exists and is not a directory");
            
        }
        return true;
    }

    // }}}
    // {{{ _packageFileName()

    /**
     * Get the name of the file where data for a given package is stored.
     *
     * @param string channel name, or false if this is a PEAR package
     * @param string package name
     *
     * @return string registry file name
     *
     * @access public
     */
    function _packageFileName($package, $channel = false)
    {
        if ($channel && $this->_getChannelFromAlias($channel) != 'pear.php.net') {
            return $this->_channelDirectoryName($channel) . DIRECTORY_SEPARATOR .
                strtolower($package) . '.reg';
        }
        return $this->statedir . DIRECTORY_SEPARATOR . strtolower($package) . '.reg';
    }

    // }}}
    // {{{ _channelFileName()

    /**
     * Get the name of the file where data for a given channel is stored.
     * @param string channel name
     * @return string registry file name
     */
    function _channelFileName($channel, $noaliases = false)
    {
        if (!$noaliases) {
            if (file_exists($this->_getChannelAliasFileName($channel))) {
                $channel = implode('', file($this->_getChannelAliasFileName($channel)));
            }
        }
        return $this->channelsdir . DIRECTORY_SEPARATOR . str_replace('/', '_',
            strtolower($channel)) . '.reg';
    }

    // }}}
    // {{{ getChannelAliasFileName()

    /**
     * @param string
     * @return string
     */
    function _getChannelAliasFileName($alias)
    {
        return $this->channelsdir . DIRECTORY_SEPARATOR . '.alias' .
              DIRECTORY_SEPARATOR . str_replace('/', '_', strtolower($alias)) . '.txt';
    }

    // }}}
    // {{{ _getChannelFromAlias()

    /**
     * Get the name of a channel from its alias
     */
    function _getChannelFromAlias($channel)
    {
        if (!$this->_channelExists($channel)) {
            if ($channel == 'pear.php.net') {
                return 'pear.php.net';
            }
            if ($channel == 'pecl.php.net') {
                return 'pecl.php.net';
            }
            if ($channel == '__uri') {
                return '__uri';
            }
            return false;
        }
        $channel = strtolower($channel);
        if (file_exists($this->_getChannelAliasFileName($channel))) {
            // translate an alias to an actual channel
            return implode('', file($this->_getChannelAliasFileName($channel)));
        } else {
            return $channel;
        }
    }    
    // }}}
    // {{{ _getChannelFromAlias()

    /**
     * Get the alias of a channel from its alias or its name
     */
    function _getAlias($channel)
    {
        if (!$this->_channelExists($channel)) {
            if ($channel == 'pear.php.net') {
                return 'pear';
            }
            if ($channel == 'pecl.php.net') {
                return 'pecl';
            }
            return false;
        }
        $channel = $this->_getChannel($channel);
        if (PEAR::isError($channel)) {
            return $channel;
        }
        return $channel->getAlias();
    }    
    // }}}
    // {{{ _channelDirectoryName()

    /**
     * Get the name of the file where data for a given package is stored.
     *
     * @param string channel name, or false if this is a PEAR package
     * @param string package name
     *
     * @return string registry file name
     *
     * @access public
     */
    function _channelDirectoryName($channel)
    {
        if (!$channel || $this->_getChannelFromAlias($channel) == 'pear.php.net') {
            return $this->statedir;
        } else {
            $ch = $this->_getChannelFromAlias($channel);
            if (!$ch) {
                $ch = $channel;
            }
            return $this->statedir . DIRECTORY_SEPARATOR . strtolower('.channel.' .
                str_replace('/', '_', $ch));
        }
    }

    // }}}
    // {{{ _openPackageFile()

    function _openPackageFile($package, $mode, $channel = false)
    {
        if (!$this->_assertStateDir($channel)) {
            return null;
        }
        if (!in_array($mode, array('r', 'rb')) && !$this->hasWriteAccess()) {
            return null;
        }
        $file = $this->_packageFileName($package, $channel);
        if (!file_exists($file) && $mode == 'r' || $mode == 'rb') {
            return null;
        }
        $fp = @fopen($file, $mode);
        if (!$fp) {
            return null;
        }
        return $fp;
    }

    // }}}
    // {{{ _closePackageFile()

    function _closePackageFile($fp)
    {
        fclose($fp);
    }

    // }}}
    // {{{ _openChannelFile()

    function _openChannelFile($channel, $mode)
    {
        if (!$this->_assertChannelDir()) {
            return null;
        }
        if (!in_array($mode, array('r', 'rb')) && !$this->hasWriteAccess()) {
            return null;
        }
        $file = $this->_channelFileName($channel);
        if (!file_exists($file) && $mode == 'r' || $mode == 'rb') {
            return null;
        }
        $fp = @fopen($file, $mode);
        if (!$fp) {
            return null;
        }
        return $fp;
    }

    // }}}
    // {{{ _closePackageFile()

    function _closeChannelFile($fp)
    {
        fclose($fp);
    }

    // }}}
    // {{{ _rebuildFileMap()

    function _rebuildFileMap()
    {
        if (!class_exists('PEAR_Installer_Role')) {
            require_once 'PEAR/Installer/Role.php';
        }
        $channels = $this->_listAllPackages();
        $files = array();
        foreach ($channels as $channel => $packages) {
            foreach ($packages as $package) {
                $version = $this->_packageInfo($package, 'version', $channel);
                $filelist = $this->_packageInfo($package, 'filelist', $channel);
                if (!is_array($filelist)) {
                    continue;
                }
                foreach ($filelist as $name => $attrs) {
                    if (isset($attrs['attribs'])) {
                        $attrs = $attrs['attribs'];
                    }
                    // it is possible for conflicting packages in different channels to
                    // conflict with data files/doc files
                    if ($name == 'dirtree') {
                        continue;
                    }
                    if (isset($attrs['role']) && !in_array($attrs['role'],
                          PEAR_Installer_Role::getInstallableRoles())) {
                        // these are not installed
                        continue;
                    }
                    if (isset($attrs['role']) && !in_array($attrs['role'],
                          PEAR_Installer_Role::getBaseinstallRoles())) {
                        $attrs['baseinstalldir'] = $package;
                    }
                    if (isset($attrs['baseinstalldir'])) {
                        $file = $attrs['baseinstalldir'].DIRECTORY_SEPARATOR.$name;
                    } else {
                        $file = $name;
                    }
                    $file = preg_replace(',^/+,', '', $file);
                    if ($channel != 'pear.php.net') {
                        if (!isset($files[$attrs['role']])) {
                            $files[$attrs['role']] = array();
                        }
                        $files[$attrs['role']][$file] = array(strtolower($channel),
                            strtolower($package));
                    } else {
                        if (!isset($files[$attrs['role']])) {
                            $files[$attrs['role']] = array();
                        }
                        $files[$attrs['role']][$file] = strtolower($package);
                    }
                }
            }
        }
        $this->_assertStateDir();
        if (!$this->hasWriteAccess()) {
            return false;
        }
        $fp = @fopen($this->filemap, 'wb');
        if (!$fp) {
            return false;
        }
        $this->filemap_cache = $files;
        fwrite($fp, serialize($files));
        fclose($fp);
        return true;
    }

    // }}}
    // {{{ _readFileMap()

    function _readFileMap()
    {
        if (!file_exists($this->filemap)) {
            return array();
        }
        $fp = @fopen($this->filemap, 'r');
        if (!$fp) {
            return $this->raiseError('PEAR_Registry: could not open filemap "' . $this->filemap . '"', PEAR_REGISTRY_ERROR_FILE, null, null, $php_errormsg);
        }
        clearstatcache();
        $rt = get_magic_quotes_runtime();
        set_magic_quotes_runtime(0);
        $fsize = filesize($this->filemap);
        fclose($fp);
        $data = file_get_contents($this->filemap);
        set_magic_quotes_runtime($rt);
        $tmp = unserialize($data);
        if (!$tmp && $fsize > 7) {
            return $this->raiseError('PEAR_Registry: invalid filemap data', PEAR_REGISTRY_ERROR_FORMAT, null, null, $data);
        }
        $this->filemap_cache = $tmp;
        return true;
    }

    // }}}
    // {{{ _lock()

    /**
     * Lock the registry.
     *
     * @param integer lock mode, one of LOCK_EX, LOCK_SH or LOCK_UN.
     *                See flock manual for more information.
     *
     * @return bool TRUE on success, FALSE if locking failed, or a
     *              PEAR error if some other error occurs (such as the
     *              lock file not being writable).
     *
     * @access private
     */
    function _lock($mode = LOCK_EX)
    {
        if (!eregi('Windows 9', php_uname())) {
            if ($mode != LOCK_UN && is_resource($this->lock_fp)) {
                // XXX does not check type of lock (LOCK_SH/LOCK_EX)
                return true;
            }
            if (!$this->_assertStateDir()) {
                if ($mode == LOCK_EX) {
                    return $this->raiseError('Registry directory is not writeable by the current user');
                } else {
                    return true;
                }
            }
            $open_mode = 'w';
            // XXX People reported problems with LOCK_SH and 'w'
            if ($mode === LOCK_SH || $mode === LOCK_UN) {
                if (!file_exists($this->lockfile)) {
                    touch($this->lockfile);
                }
                $open_mode = 'r';
            }

            if (!is_resource($this->lock_fp)) {
                $this->lock_fp = @fopen($this->lockfile, $open_mode);
            }

            if (!is_resource($this->lock_fp)) {
                $this->lock_fp = null;
                return $this->raiseError("could not create lock file" .
                                         (isset($php_errormsg) ? ": " . $php_errormsg : ""));
            }
            if (!(int)flock($this->lock_fp, $mode)) {
                switch ($mode) {
                    case LOCK_SH: $str = 'shared';    break;
                    case LOCK_EX: $str = 'exclusive'; break;
                    case LOCK_UN: $str = 'unlock';    break;
                    default:      $str = 'unknown';   break;
                }
                //is resource at this point, close it on error.
                fclose($this->lock_fp);
                $this->lock_fp = null;
                return $this->raiseError("could not acquire $str lock ($this->lockfile)",
                                         PEAR_REGISTRY_ERROR_LOCK);
            }
        }
        return true;
    }

    // }}}
    // {{{ _unlock()

    function _unlock()
    {
        $ret = $this->_lock(LOCK_UN);
        if (is_resource($this->lock_fp)) {
            fclose($this->lock_fp);
        }
        $this->lock_fp = null;
        return $ret;
    }

    // }}}
    // {{{ _packageExists()

    function _packageExists($package, $channel = false)
    {
        return file_exists($this->_packageFileName($package, $channel));
    }

    // }}}
    // {{{ _channelExists()

    /**
     * Determine whether a channel exists in the registry
     * @param string Channel name
     * @param bool if true, then aliases will be ignored
     * @return boolean
     */
    function _channelExists($channel, $noaliases = false)
    {
        $a = file_exists($this->_channelFileName($channel, $noaliases));
        if (!$a && $channel == 'pear.php.net') {
            return true;
        }
        if (!$a && $channel == 'pecl.php.net') {
            return true;
        }
        return $a;
    }

    // }}}
    // {{{ _addChannel()

    /**
     * @param PEAR_ChannelFile Channel object
     * @param donotuse
     * @param string Last-Modified HTTP tag from remote request
     * @return boolean|PEAR_Error True on creation, false if it already exists
     */
    function _addChannel($channel, $update = false, $lastmodified = false)
    {
        if (!is_a($channel, 'PEAR_ChannelFile')) {
            return false;
        }
        if (!$channel->validate()) {
            return false;
        }
        if (file_exists($this->_channelFileName($channel->getName()))) {
            if (!$update) {
                return false;
            }
            $checker = $this->_getChannel($channel->getName());
            if (PEAR::isError($checker)) {
                return $checker;
            }
            if ($channel->getAlias() != $checker->getAlias()) {
                if (file_exists($this->_getChannelAliasFileName($checker->getAlias()))) {
                    @unlink($this->_getChannelAliasFileName($checker->getAlias()));
                }
            }
        } else {
            if ($update && !in_array($channel->getName(), array('pear.php.net', 'pecl.php.net'))) {
                return false;
            }
        }
        $ret = $this->_assertChannelDir();
        if (PEAR::isError($ret)) {
            return $ret;
        }
        $ret = $this->_assertChannelStateDir($channel->getName());
        if (PEAR::isError($ret)) {
            return $ret;
        }
        if ($channel->getAlias() != $channel->getName()) {
            if (file_exists($this->_getChannelAliasFileName($channel->getAlias())) &&
                  $this->_getChannelFromAlias($channel->getAlias()) != $channel->getName()) {
                $channel->setAlias($channel->getName());
            }
            if (!$this->hasWriteAccess()) {
                return false;
            }
            $fp = @fopen($this->_getChannelAliasFileName($channel->getAlias()), 'w');
            if (!$fp) {
                return false;
            }
            fwrite($fp, $channel->getName());
            fclose($fp);
        }
        if (!$this->hasWriteAccess()) {
            return false;
        }
        $fp = @fopen($this->_channelFileName($channel->getName()), 'wb');
        if (!$fp) {
            return false;
        }
        $info = $channel->toArray();
        if ($lastmodified) {
            $info['_lastmodified'] = $lastmodified;
        } else {
            $info['_lastmodified'] = date('r');
        }
        fwrite($fp, serialize($info));
        fclose($fp);
        return true;
    }

    // }}}
    // {{{ _deleteChannel()

    /**
     * Deletion fails if there are any packages installed from the channel
     * @param string|PEAR_ChannelFile channel name
     * @return boolean|PEAR_Error True on deletion, false if it doesn't exist
     */
    function _deleteChannel($channel)
    {
        if (!is_string($channel)) {
            if (is_a($channel, 'PEAR_ChannelFile')) {
                if (!$channel->validate()) {
                    return false;
                }
                $channel = $channel->getName();
            } else {
                return false;
            }
        }
        if ($this->_getChannelFromAlias($channel) == '__uri') {
            return false;
        }
        if ($this->_getChannelFromAlias($channel) == 'pecl.php.net') {
            return false;
        }
        if (!$this->_channelExists($channel)) {
            return false;
        }
        if (!$channel || $this->_getChannelFromAlias($channel) == 'pear.php.net') {
            return false;
        }
        $channel = $this->_getChannelFromAlias($channel);
        if ($channel == 'pear.php.net') {
            return false;
        }
        $test = $this->_listChannelPackages($channel);
        if (count($test)) {
            return false;
        }
        $test = @rmdir($this->_channelDirectoryName($channel));
        if (!$test) {
            return false;
        }
        $file = $this->_getChannelAliasFileName($this->_getAlias($channel));
        if (file_exists($file)) {
            $test = @unlink($file);
            if (!$test) {
                return false;
            }
        }
        $file = $this->_channelFileName($channel);
        $ret = true;
        if (file_exists($file)) {
            $ret = @unlink($file);
        }
        return $ret;
    }

    // }}}
    // {{{ _isChannelAlias()

    /**
     * Determine whether a channel exists in the registry
     * @param string Channel Alias
     * @return boolean
     */
    function _isChannelAlias($alias)
    {
        return file_exists($this->_getChannelAliasFileName($alias));
    }

    // }}}
    // {{{ _packageInfo()

    /**
     * @param string|null
     * @param string|null
     * @param string|null
     * @return array|null
     * @access private
     */
    function _packageInfo($package = null, $key = null, $channel = 'pear.php.net')
    {
        if ($package === null) {
            if ($channel === null) {
                $channels = $this->_listChannels();
                $ret = array();
                foreach ($channels as $channel) {
                    $channel = strtolower($channel);
                    $ret[$channel] = array();
                    $packages = $this->_listPackages($channel);
                    foreach ($packages as $package) {
                        $ret[$channel][] = $this->_packageInfo($package, null, $channel);
                    }
                }
                return $ret;
            }
            $ps = $this->_listPackages($channel);
            if (!count($ps)) {
                return array();
            }
            return array_map(array(&$this, '_packageInfo'),
                             $ps, array_fill(0, count($ps), null),
                             array_fill(0, count($ps), $channel));
        }
        $fp = $this->_openPackageFile($package, 'r', $channel);
        if ($fp === null) {
            return null;
        }
        $rt = get_magic_quotes_runtime();
        set_magic_quotes_runtime(0);
        clearstatcache();
        $this->_closePackageFile($fp);
        $data = file_get_contents($this->_packageFileName($package, $channel));
        set_magic_quotes_runtime($rt);
        $data = unserialize($data);
        if ($key === null) {
            return $data;
        }
        // compatibility for package.xml version 2.0
        if (isset($data['old'][$key])) {
            return $data['old'][$key];
        }
        if (isset($data[$key])) {
            return $data[$key];
        }
        return null;
    }

    // }}}
    // {{{ _channelInfo()

    /**
     * @param string Channel name
     * @param bool whether to strictly retrieve info of channels, not just aliases
     * @return array|null
     */
    function _channelInfo($channel, $noaliases = false)
    {
        if (!$this->_channelExists($channel, $noaliases)) {
            return null;
        }
        $fp = $this->_openChannelFile($channel, 'r');
        if ($fp === null) {
            return null;
        }
        $rt = get_magic_quotes_runtime();
        set_magic_quotes_runtime(0);
        clearstatcache();
        $this->_closeChannelFile($fp);
        $data = file_get_contents($this->_channelFileName($channel));
        set_magic_quotes_runtime($rt);
        $data = unserialize($data);
        return $data;
    }

    // }}}
    // {{{ _listChannels()

    function _listChannels()
    {
        $channellist = array();
        if (!file_exists($this->channelsdir) || !is_dir($this->channelsdir)) {
            return array('pear.php.net', 'pecl.php.net', '__uri');
        }
        $dp = opendir($this->channelsdir);
        while ($ent = readdir($dp)) {
            if ($ent{0} == '.' || substr($ent, -4) != '.reg') {
                continue;
            }
            if ($ent == '__uri.reg') {
                $channellist[] = '__uri';
                continue;
            }
            $channellist[] = str_replace('_', '/', substr($ent, 0, -4));
        }
        closedir($dp);
        if (!in_array('pear.php.net', $channellist)) {
            $channellist[] = 'pear.php.net';
        }
        if (!in_array('pecl.php.net', $channellist)) {
            $channellist[] = 'pecl.php.net';
        }
        if (!in_array('__uri', $channellist)) {
            $channellist[] = '__uri';
        } 
   
        natsort($channellist);
        return $channellist;
    }

    // }}}
    // {{{ _listPackages()

    function _listPackages($channel = false)
    {
        if ($channel && $this->_getChannelFromAlias($channel) != 'pear.php.net') {
            return $this->_listChannelPackages($channel);
        }
        if (!file_exists($this->statedir) || !is_dir($this->statedir)) {
            return array();
        }
        $pkglist = array();
        $dp = opendir($this->statedir);
        if (!$dp) {
            return $pkglist;
        }
        while ($ent = readdir($dp)) {
            if ($ent{0} == '.' || substr($ent, -4) != '.reg') {
                continue;
            }
            $pkglist[] = substr($ent, 0, -4);
        }
        closedir($dp);
        return $pkglist;
    }

    // }}}
    // {{{ _listChannelPackages()

    function _listChannelPackages($channel)
    {
        $pkglist = array();
        if (!file_exists($this->_channelDirectoryName($channel)) ||
              !is_dir($this->_channelDirectoryName($channel))) {
            return array();
        }
        $dp = opendir($this->_channelDirectoryName($channel));
        if (!$dp) {
            return $pkglist;
        }
        while ($ent = readdir($dp)) {
            if ($ent{0} == '.' || substr($ent, -4) != '.reg') {
                continue;
            }
            $pkglist[] = substr($ent, 0, -4);
        }
        closedir($dp);
        return $pkglist;
    }

    // }}}
    
    function _listAllPackages()
    {
        $ret = array();
        foreach ($this->_listChannels() as $channel) {
            $ret[$channel] = $this->_listPackages($channel);
        }
        return $ret;
    }

    /**
     * Add an installed package to the registry
     * @param string package name
     * @param array package info (parsed by PEAR_Common::infoFrom*() methods)
     * @return bool success of saving
     * @access private
     */
    function _addPackage($package, $info)
    {
        if ($this->_packageExists($package)) {
            return false;
        }
        $fp = $this->_openPackageFile($package, 'wb');
        if ($fp === null) {
            return false;
        }
        $info['_lastmodified'] = time();
        fwrite($fp, serialize($info));
        $this->_closePackageFile($fp);
        if (isset($info['filelist'])) {
            $this->_rebuildFileMap();
        }
        return true;
    }

    /**
     * @param PEAR_PackageFile_v1|PEAR_PackageFile_v2
     * @return bool
     * @access private
     */
    function _addPackage2($info)
    {
        if (!is_a($info, 'PEAR_PackageFile_v1') && !is_a($info, 'PEAR_PackageFile_v2')) {
            return false;
        }

        if (!$info->validate()) {
            if (class_exists('PEAR_Common')) {
                $ui = PEAR_Frontend::singleton();
                if ($ui) {
                    foreach ($info->getValidationWarnings() as $err) {
                        $ui->log($err['message'], true);
                    }
                }
            }
            return false;
        }
        $channel = $info->getChannel();
        $package = $info->getPackage();
        $save = $info;
        if ($this->_packageExists($package, $channel)) {
            return false;
        }
        if (!$this->_channelExists($channel, true)) {
            return false;
        }
        $info = $info->toArray(true);
        if (!$info) {
            return false;
        }
        $fp = $this->_openPackageFile($package, 'wb', $channel);
        if ($fp === null) {
            return false;
        }
        $info['_lastmodified'] = time();
        fwrite($fp, serialize($info));
        $this->_closePackageFile($fp);
        $this->_rebuildFileMap();
        return true;
    }

    /**
     * @param string Package name
     * @param array parsed package.xml 1.0
     * @param bool this parameter is only here for BC.  Don't use it.
     * @access private
     */
    function _updatePackage($package, $info, $merge = true)
    {
        $oldinfo = $this->_packageInfo($package);
        if (empty($oldinfo)) {
            return false;
        }
        $fp = $this->_openPackageFile($package, 'w');
        if ($fp === null) {
            return false;
        }
        if (is_object($info)) {
            $info = $info->toArray();
        }
        $info['_lastmodified'] = time();
        $newinfo = $info;
        if ($merge) {
            $info = array_merge($oldinfo, $info);
        } else {
            $diff = $info;
        }
        fwrite($fp, serialize($info));
        $this->_closePackageFile($fp);
        if (isset($newinfo['filelist'])) {
            $this->_rebuildFileMap();
        }
        return true;
    }

    /**
     * @param PEAR_PackageFile_v1|PEAR_PackageFile_v2
     * @return bool
     * @access private
     */
    function _updatePackage2($info)
    {
        if (!$this->_packageExists($info->getPackage(), $info->getChannel())) {
            return false;
        }
        $fp = $this->_openPackageFile($info->getPackage(), 'w', $info->getChannel());
        if ($fp === null) {
            return false;
        }
        $save = $info;
        $info = $save->getArray(true);
        $info['_lastmodified'] = time();
        fwrite($fp, serialize($info));
        $this->_closePackageFile($fp);
        $this->_rebuildFileMap();
        return true;
    }

    /**
     * @param string Package name
     * @param string Channel name
     * @return PEAR_PackageFile_v1|PEAR_PackageFile_v2|null
     * @access private
     */
    function &_getPackage($package, $channel = 'pear.php.net')
    {
        $info = $this->_packageInfo($package, null, $channel);
        if ($info === null) {
            return $info;
        }
        $a = $this->_config;
        if (!$a) {
            $this->_config = &new PEAR_Config;
            $this->_config->set('php_dir', $this->statedir);
        }
        if (!class_exists('PEAR_PackageFile')) {
            require_once 'PEAR/PackageFile.php';
        }
        $pkg = &new PEAR_PackageFile($this->_config);
        $pf = &$pkg->fromArray($info);
        return $pf;
    }

    /**
     * @param string channel name
     * @param bool whether to strictly retrieve channel names
     * @return PEAR_ChannelFile|PEAR_Error
     * @access private
     */
    function &_getChannel($channel, $noaliases = false)
    {
        $ch = false;
        if ($this->_channelExists($channel, $noaliases)) {
            $chinfo = $this->_channelInfo($channel, $noaliases);
            if ($chinfo) {
                if (!class_exists('PEAR_ChannelFile')) {
                    require_once 'PEAR/ChannelFile.php';
                }
                $ch = &PEAR_ChannelFile::fromArrayWithErrors($chinfo);
            }
        }
        if ($ch) {
            if ($ch->validate()) {
                return $ch;
            }
            foreach ($ch->getErrors(true) as $err) {
                $message = $err['message'] . "\n";
            }
            $ch = PEAR::raiseError($message);
            return $ch;
        }
        if ($this->_getChannelFromAlias($channel) == 'pear.php.net') {
            // the registry is not properly set up, so use defaults
            if (!class_exists('PEAR_ChannelFile')) {
                require_once 'PEAR/ChannelFile.php';
            }
            $pear_channel = new PEAR_ChannelFile;
            $pear_channel->setName('pear.php.net');
            $pear_channel->setAlias('pear');
            $pear_channel->setSummary('PHP Extension and Application Repository');
            $pear_channel->setDefaultPEARProtocols();
            $pear_channel->setBaseURL('REST1.0', 'http://pear.php.net/rest/');
            $pear_channel->setBaseURL('REST1.1', 'http://pear.php.net/rest/');
            return $pear_channel;
        }
        if ($this->_getChannelFromAlias($channel) == 'pecl.php.net') {
            // the registry is not properly set up, so use defaults
            if (!class_exists('PEAR_ChannelFile')) {
                require_once 'PEAR/ChannelFile.php';
            }
            $pear_channel = new PEAR_ChannelFile;
            $pear_channel->setName('pecl.php.net');
            $pear_channel->setAlias('pecl');
            $pear_channel->setSummary('PHP Extension Community Library');
            $pear_channel->setDefaultPEARProtocols();
            $pear_channel->setBaseURL('REST1.0', 'http://pecl.php.net/rest/');
            $pear_channel->setBaseURL('REST1.1', 'http://pecl.php.net/rest/');
            $pear_channel->setValidationPackage('PEAR_Validator_PECL', '1.0');
            return $pear_channel;
        }
        if ($this->_getChannelFromAlias($channel) == '__uri') {
            // the registry is not properly set up, so use defaults
            if (!class_exists('PEAR_ChannelFile')) {
                require_once 'PEAR/ChannelFile.php';
            }
            $private = new PEAR_ChannelFile;
            $private->setName('__uri');
            $private->addFunction('xmlrpc', '1.0', '****');
            $private->setSummary('Pseudo-channel for static packages');
            return $private;
        }
        return $ch;
    }

    // {{{ packageExists()

    /**
     * @param string Package name
     * @param string Channel name
     * @return bool
     */
    function packageExists($package, $channel = 'pear.php.net')
    {
        if (PEAR::isError($e = $this->_lock(LOCK_SH))) {
            return $e;
        }
        $ret = $this->_packageExists($package, $channel);
        $this->_unlock();
        return $ret;
    }

    // }}}

    // {{{ channelExists()

    /**
     * @param string channel name
     * @param bool if true, then aliases will be ignored
     * @return bool
     */
    function channelExists($channel, $noaliases = false)
    {
        if (PEAR::isError($e = $this->_lock(LOCK_SH))) {
            return $e;
        }
        $ret = $this->_channelExists($channel, $noaliases);
        $this->_unlock();
        return $ret;
    }

    // }}}

    // {{{ isAlias()

    /**
     * Determines whether the parameter is an alias of a channel
     * @param string
     * @return bool
     */
    function isA