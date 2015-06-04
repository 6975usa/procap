<?php
/**
 * PEAR_Installer
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
 * @author     Tomas V.V. Cox <cox@idecnet.com>
 * @author     Martin Jansen <mj@php.net>
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Installer.php,v 1.251 2008/01/17 05:48:37 cellog Exp $
 * @link       http://pear.php.net/package/PEAR
 * @since      File available since Release 0.1
 */

/**
 * Used for installation groups in package.xml 2.0 and platform exceptions
 */
require_once 'OS/Guess.php';
require_once 'PEAR/Downloader.php';

define('PEAR_INSTALLER_NOBINARY', -240);
/**
 * Administration class used to install PEAR packages and maintain the
 * installed package database.
 *
 * @category   pear
 * @package    PEAR
 * @author     Stig Bakken <ssb@php.net>
 * @author     Tomas V.V. Cox <cox@idecnet.com>
 * @author     Martin Jansen <mj@php.net>
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: 1.7.1
 * @link       http://pear.php.net/package/PEAR
 * @since      Class available since Release 0.1
 */
class PEAR_Installer extends PEAR_Downloader
{
    // {{{ properties

    /** name of the package directory, for example Foo-1.0
     * @var string
     */
    var $pkgdir;

    /** directory where PHP code files go
     * @var string
     */
    var $phpdir;

    /** directory where PHP extension files go
     * @var string
     */
    var $extdir;

    /** directory where documentation goes
     * @var string
     */
    var $docdir;

    /** installation root directory (ala PHP's INSTALL_ROOT or
     * automake's DESTDIR
     * @var string
     */
    var $installroot = '';

    /** debug level
     * @var int
     */
    var $debug = 1;

    /** temporary directory
     * @var string
     */
    var $tmpdir;

    /**
     * PEAR_Registry object used by the installer
     * @var PEAR_Registry
     */
    var $registry;

    /**
     * array of PEAR_Downloader_Packages
     * @var array
     */
    var $_downloadedPackages;

    /** List of file transactions queued for an install/upgrade/uninstall.
     *
     *  Format:
     *    array(
     *      0 => array("rename => array("from-file", "to-file")),
     *      1 => array("delete" => array("file-to-delete")),
     *      ...
     *    )
     *
     * @var array
     */
    var $file_operations = array();

    // }}}

    // {{{ constructor

    /**
     * PEAR_Installer constructor.
     *
     * @param object $ui user interface object (instance of PEAR_Frontend_*)
     *
     * @access public
     */
    function PEAR_Installer(&$ui)
    {
        parent::PEAR_Common();
        $this->setFrontendObject($ui);
        $this->debug = $this->config->get('verbose');
    }

    function setOptions($options)
    {
        $this->_options = $options;
    }

    function setConfig(&$config)
    {
        $this->config = &$config;
        $this->_registry = &$config->getRegistry();
    }

    // }}}

    function _removeBackups($files)
    {
        foreach ($files as $path) {
            $this->addFileOperation('removebackup', array($path));
        }
    }

    // {{{ _deletePackageFiles()

    /**
     * Delete a package's installed files, does not remove empty directories.
     *
     * @param string package name
     * @param string channel name
     * @param bool if true,