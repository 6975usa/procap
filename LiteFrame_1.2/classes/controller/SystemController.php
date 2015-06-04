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


class classes_controller_SystemController{

   protected $access=null;
   public $application;
   protected $module;
   protected $action;
   protected $session;
   public $env ;
   private $observer;



   function run() {

      classes_utils_session::start();

      $this->loger = classes_Singleton::getInstance('classes_utils_Loger');

      $this->messages = classes_Singleton::getInstance('classes_controller_Messages');

      $this->access = classes_Singleton::getInstance('classes_controller_Access',$this);

      $this->env = classes_Singleton::getInstance('classes_controller_Environment',$this);
      $this->env->sanitize();

      $this->application = classes_Singleton::getInstance('classes_controller_ApplicationController',$this);
      $this->application->run();

      $this->action = classes_Singleton::getInstance('classes_controller_ActionController',$this);
      $this->action->run();

      $this->user = classes_Singleton::getInstance('classes_controller_user');

      $this->controlUserAccess();


   }



   function controlUserAccess(){
      $appName = $this->application->getName();
      $actionName = $this->action->getName();

      if( ($appName == 'login') ){
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
      }
      else{
         //echo '3';
         $isLoged = $this->user->isLoged();
         $appIsAllowedToUser = $this->user->appIsAllowedToUser($appName);
         $actionIsAllowedToUser = $this->user->actionIsAllowedToUser($appName,$actionName);
         $userIsActive = $this->user->isActive();

         if($isLoged){
            if ( !$isLoged ||  !$appIsAllowedToUser ||  ! $actionIsAllowedToUser || !$userIsActive ) {

            }
         }
         else{
            classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
         }

         if ( !$isLoged ||  !$appIsAllowedToUser ||  ! $actionIsAllowedToUser || !$userIsActive ) {
            //if($isLoged){
               @$this->user->logout();
            //}
            classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
         }
         else{
            //some log routines if wished
         }
      }




   }






   function runAction($act) {
      $action = $act;
      $actions = $this->action->getConfig()->getActions();
      if( array_key_exists($action,$actions)){
         $actionName = $actions[$action];
         $file = APP_ROOT.'/'.str_replace('_',DS,$actionName).'.php';
         if (! file_exists( $file )){
            throw new Exception('File does not exist: '.$file);
         }
         require_once($file);
         $action = new $actionName($this);
         $action->execute();
      }
      else{
         classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
      }

   }




   function getApplication(){
      return $this->application;
   }




   function getModule(){
      return $this->module;
   }


   function getAction(){
      return $this->action;
   }


   function getEnv(){
      return $this->env;
   }


   function getAccess(){
      return $this->access;
   }



   function applicationMustBeVerified($appName){
      $allowedApps = applications_AllowedAplications::getAllowedApplications();
      $authMethod = $allowedApps[$appName]['authMethod'];
      return  !($authMethod=='none' || $appName=='login' );
   }

}

?>