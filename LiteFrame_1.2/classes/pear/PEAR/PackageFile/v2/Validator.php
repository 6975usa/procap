<?php
/**
 * PEAR_PackageFile_v2, package.xml version 2.0, read/write version
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
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Validator.php,v 1.103 2008/01/03 20:26:37 cellog Exp $
 * @link       http://pear.php.net/package/PEAR
 * @since      File available since Release 1.4.0a8
 */
/**
 * Private validation class used by PEAR_PackageFile_v2 - do not use directly, its
 * sole purpose is to split up the PEAR/PackageFile/v2.php file to make it smaller
 * @category   pear
 * @package    PEAR
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: 1.7.1
 * @link       http://pear.php.net/package/PEAR
 * @since      Class available since Release 1.4.0a8
 * @access private
 */
class PEAR_PackageFile_v2_Validator
{
    /**
     * @var array
     */
    var $_packageInfo;
    /**
     * @var PEAR_PackageFile_v2
     */
    var $_pf;
    /**
     * @var PEAR_ErrorStack
     */
    var $_stack;
    /**
     * @var int
     */
    var $_isValid = 0;
    /**
     * @var int
     */
    var $_filesValid = 0;
    /**
     * @var int
     */
    var $_curState = 0;
    /**
     * @param PEAR_PackageFile_v2
     * @param int
     */
    function validate(&$pf, $state = PEAR_VALIDATE_NORMAL)
    {
        $this->_pf = &$pf;
        $this->_curState = $state;
        $this->_packageInfo = $this->_pf->getArray();
        $this->_isValid = $this->_pf->_isValid;
        $this->_filesValid = $this->_pf->_filesValid;
        $this->_stack = &$pf->_stack;
        $this->_stack->getErrors(true);
        if (($this->_isValid & $state) == $state) {
            return true;
        }
        if (!isset($this->_packageInfo) || !is_array($this->_packageInfo)) {
            return false;
        }
        if (!isset($this->_packageInfo['attribs']['version']) ||
              ($this->_packageInfo['attribs']['version'] != '2.0' &&
               $this->_packageInfo['attribs']['version'] != '2.1')) {
            $this->_noPackageVersion();
        }
        $structure =
        array(
            'name',
            'channel|uri',
            '*extends', // can't be multiple, but this works fine
            'summary',
            'description',
            '+lead', // these all need content checks
            '*developer',
            '*contributor',
            '*helper',
            'date',
            '*time',
            'version',
            'stability',
            'license->?uri->?filesource',
            'notes',
            'contents', //special validation needed
            '*compatible',
            'dependencies', //special validation needed
            '*usesrole',
            '*usestask', // reserve these for 1.4.0a1 to implement
                         // this will allow a package.xml to gracefully say it
                         // needs a certain package installed in order to implement a role or task
            '*providesextension',
            '*srcpackage|*srcuri',
            '+phprelease|+extsrcrelease|+extbinrelease|' .
                '+zendextsrcrelease|+zendextbinrelease|bundle', //special validation needed
            '*changelog',
        );
        $test = $this->_packageInfo;
        if (isset($test['dependencies']) &&
              isset($test['dependencies']['required']) &&
              isset($test['dependencies']['required']['pearinstaller']) &&
              isset($test['dependencies']['required']['pearinstaller']['min']) &&
              version_compare('1.7.1',
                $test['dependencies']['required']['pearinstaller']['min'], '<')) {
            $this->_pearVersionTooLow($test['dependencies']['required']['pearinstaller']['min']);
            return false;
        }
        // ignore post-installation array fields
        if (array_key_exists('filelist', $test)) {
            unset($test['filelist']);
        }
        if (array_key_exists('_lastmodified', $test)) {
            unset($test['_lastmodified']);
        }
        if (array_key_exists('#binarypackage', $test)) {
            unset($test['#binarypackage']);
        }
        if (array_key_exists('old', $test)) {
            unset($test['old']);
        }
        if (array_key_exists('_lastversion', $test)) {
            unset($test['_lastversion']);
        }
        if (!$this->_stupidSchemaValidate($structure,
                                          $test, '<package>')) {
            return false;
        }
        if (empty($this->_packageInfo['name'])) {
            $this->_tagCannotBeEmpty('name');
        }
        if (isset($this->_packageInfo['uri'])) {
            $test = 'uri';
        } else {
            $test = 'channel';
        }
        if (empty($this->_packageInfo[$test])) {
            $this->_tagCannotBeEmpty($test);
        }
        if (is_array($this->_packageInfo['license']) &&
              (!isset($this->_packageInfo['license']['_content']) ||
              empty($this->_packageInfo['license']['_content']))) {
            $this->_tagCannotBeEmpty('license');
        } elseif (empty($this->_packageInfo['license'])) {
            $this->_tagCannotBeEmpty('license');
        }
        if (empty($this->_packageInfo['summary'])) {
            $this->_tagCannotBeEmpty('summary');
        }
        if (empty($this->_packageInfo['description'])) {
            $this->_tagCannotBeEmpty('description');
        }
        if (empty($this->_packageInfo['date'])) {
            $this->_tagCannotBeEmpty('date');
        }
        if (empty($this->_packageInfo['notes'])) {
            $this->_tagCannotBeEmpty('notes');
        }
        if (isset($this->_packageInfo['time']) && empty($this->_packageInfo['time'])) {
            $this->_tagCannotBeEmpty('time');
        }
        if (isset($this->_packageInfo['dependencies'])) {
            $this->_validateDependencies();
        }
        if (isset($this->_packageInfo['compatible'])) {
            $this->_validateCompatible();
        }
        if (!isset($this->_packageInfo['bundle'])) {
            if (empty($this->_packageInfo['contents'])) {
                $this->_tagCannotBeEmpty('contents');
            }
            if (!isset($this->_packageInfo['contents']['dir'])) {
                $this->_filelistMustContainDir('contents');
                return false;
            }
            if (isset($this->_packageInfo['contents']['file'])) {
                $this->_filelistCannotContainFile('contents');
                return false;
            }
        }
        $this->_validateMaintainers();
        $this->_validateStabilityVersion();
        $fail = false;
        if (array_key_exists('usesrole', $this->_packageInfo)) {
            $roles = $this->_packageInfo['usesrole'];
            if (!is_array($roles) || !isset($roles[0])) {
                $roles = array($roles);
            }
            foreach ($roles as $role) {
                if (!isset($role['role'])) {
                    $this->_usesroletaskMustHaveRoleTask('usesrole', 'role');
                    $fail = true;
                } else {
                    if (!isset($role['channel'])) {
                        if (!isset($role['uri'])) {
                            $this->_usesroletaskMustHaveChannelOrUri($role['role'], 'usesrole');
                            $fail = true;
                        }
                    } elseif (!isset($role['package'])) {
                        $this->_usesroletaskMustHavePackage($role['role'], 'usesrole');
                        $fail = true;
                    }
                }
            }
        }
        if (array_key_exists('usestask', $this->_packageInfo)) {
            $roles = $this->_packageInfo['usestask'];
            if (!is_array($roles) || !isset($roles[0])) {
                $roles = array($roles);
            }
            foreach ($roles as $role) {
                if (!isset($role['task'])) {
                    $this->_usesroletaskMustHaveRoleTask('usestask', 'task');
                    $fail = true;
                } else {
                    if (!isset($role['channel'])) {
                        if (!isset($role['uri'])) {
                            $this->_usesroletaskMustHaveChannelOrUri($role['task'], 'usestask');
                            $fail = true;
                        }
                    } elseif (!isset($role['package'])) {
                        $this->_usesroletaskMustHavePackage($role['task'], 'usestask');
                        $fail = true;
                    }
                }
            }
        }
        if ($fail) {
            return false;
        }
        $list = $this->_packageInfo['contents'];
        if (isset($list['dir']) && is_array($list['dir']) && isset($list['dir'][0])) {
            $this->_multipleToplevelDirNotAllowed();
            return $this->_isValid = 0;
        }
        $this->_validateFilelist();
        $this->_validateRelease();
        if (!$this->_stack->hasErrors()) {
            $chan = $this->_pf->_registry->getChannel($this->_pf->getChannel(), true);
            if (PEAR::isError($chan)) {
                $this->_unknownChannel($this->_pf->getChannel());
            } else {
                $valpack = $chan->getValidationPackage();
                // for channel validator packages, always use the default PEAR validat