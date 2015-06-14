<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Implements database access
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_SystemController {

    private $access = null;
    private $application;
    private $module;
    private $action;
    private $session;
    private $env;
    private $observer;
    private $loger;
    private $messages;
    private $user;

    function run() {

        classes_utils_session::start();

        $this->setLoger(classes_Singleton::getInstance('classes_utils_Loger'));

        $this->setMessages(classes_Singleton::getInstance('classes_controller_Messages'));

        $this->setAccess(classes_Singleton::getInstance('classes_controller_Access', $this));

        $this->setEnv(classes_Singleton::getInstance('classes_controller_Environment', $this));
        $this->getEnv()->sanitize();

        $this->setApplication(classes_Singleton::getInstance('classes_controller_ApplicationController', $this));
        $this->getApplication()->run();

        $this->setAction(classes_Singleton::getInstance('classes_controller_ActionController', $this));
        $this->getAction()->run();

        $this->setUser(classes_Singleton::getInstance('classes_controller_user'));

        $this->controlUserAccess();
    }

    function controlUserAccess() {
        $appName = $this->application->getName();
        $actionName = $this->action->getName();

        if (($appName == 'login')) {
            //echo '0';
            switch ($actionName) {
                case 'logout':
                    //echo '1';
                    $isLoged = $this->user->isLoged();
                    break;
                default:
                    //echo '2';
                    //do nothing to any login app but logout
                    break;
            }
        } else {
            //echo '3';
            $isLoged = $this->user->isLoged();
            $appIsAllowedToUser = $this->user->appIsAllowedToUser($appName);
            $actionIsAllowedToUser = $this->user->actionIsAllowedToUser($appName, $actionName);
            $userIsActive = $this->user->isActive();

            if ($isLoged) {
                if (!$isLoged || !$appIsAllowedToUser || !$actionIsAllowedToUser || !$userIsActive) {
                    
                }
            } else {
                classes_utils_jsFunctions::redirect(SITE_ROOT . '/login/default/');
            }

            if (!$isLoged || !$appIsAllowedToUser || !$actionIsAllowedToUser || !$userIsActive) {
                //if($isLoged){
                @$this->user->logout();
                //}
                classes_utils_jsFunctions::redirect(SITE_ROOT . '/login/default/');
            } else {
                //some log routines if wished
            }
        }
    }

    function runAction($act) {
        $action = $act;
        $actions = $this->action->getConfig()->getActions();
        if (array_key_exists($action, $actions)) {
            $actionName = $actions[$action];
            $file = APP_ROOT . '/' . str_replace('_', DS, $actionName) . '.php';
            if (!file_exists($file)) {
                throw new Exception('File does not exist: ' . $file);
            }
            require_once($file);
            $action = new $actionName($this);
            $action->execute();
        } else {
            classes_utils_jsFunctions::redirect(SITE_ROOT . '/login/default/');
        }
    }

    function applicationMustBeVerified($appName) {
        $allowedApps = applications_AllowedAplications::getAllowedApplications();
        $authMethod = $allowedApps[$appName]['authMethod'];
        return !($authMethod == 'none' || $appName == 'login' );
    }

    public function getAccess() {
        return $this->access;
    }

    /**
     * 
     * @return classes_controller_ApplicationController
     */
    public function getApplication() {
        return $this->application;
    }

    public function getModule() {
        return $this->module;
    }

    /**
     * 
     * @return classes_controller_ActionController
     */
    public function getAction() {
        return $this->action;
    }

    public function getSession() {
        return $this->session;
    }

    /**
     * 
     * @return classes_controller_Environment
     */
    public function getEnv() {
        return $this->env;
    }

    public function getObserver() {
        return $this->observer;
    }

    public function setAccess($access) {
        $this->access = $access;
    }

    public function setApplication(classes_controller_ApplicationController $application) {
        $this->application = $application;
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setSession($session) {
        $this->session = $session;
    }

    public function setEnv(classes_controller_Environment $env) {
        $this->env = $env;
    }

    public function setObserver($observer) {
        $this->observer = $observer;
    }

    /**
     * 
     * @return classes_utils_Loger
     */
    public function getLoger() {
        return $this->loger;
    }

    /**
     * 
     * @return classes_controller_Messages
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * 
     * @return classes_controller_user
     */
    public function getUser() {
        return $this->user;
    }

    public function setLoger(classes_utils_Loger $loger) {
        $this->loger = $loger;
    }

    public function setMessages(classes_controller_Messages $messages) {
        $this->messages = $messages;
    }

    public function setUser(classes_controller_user $user) {
        $this->user = $user;
    }

}

?>