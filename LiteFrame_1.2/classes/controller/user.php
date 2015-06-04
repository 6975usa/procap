<?php
/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Class for user interface
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_user  {

   private $dao;
   private $loged;

   function __construct( ){
      $this->dao = classes_Singleton::getInstance('classes_dao_userDAO');
   }


   function getGroups(){

      return $this->getProperty('groups');

   }



   function setUserProperties($user_id ){
      $properties = $this->dao->getUserProperties($user_id  );
      foreach ( $properties as $propName=>$propValue ){
         $prop = strtolower($propName);
         $this->$prop = $propValue;
      }
   }




   function getProperty($propName){
      if(isset($this->$propName)){
         return $this->$propName;
      }
      else{
         return false;
      }
   }


   function setProperty($propName,$propValue){
      $ths->$propName = $propValue;
   }



   function validateLogin($username,$password,$office){

      $userExists =  $this->dao->userExists($username,$office) ;
      $passIsCorrect = $this->dao->passwodIsCorrect($username,$password) ;
      $userIsActive = $this->dao->userIsActive($username,$office);

      if( $userExists && $passIsCorrect && $userIsActive ){
         return true;
      }
      else {
         return false;
      }

   }


   function logout(){

      if(!isset($this->sessionId)){
         throw new classes_SystemException('Session Id not set.');
      }

      if(!isset($this->id)){
         throw new classes_SystemException('User id not set.');
      }

      classes_utils_session::deleteSessionId($this->sessionId);
      classes_utils_cookies::deleteSessionCookie($this->sessionId);
      classes_utils_session::deleteOldSessionId($this->id,$this->sessionId , $_COOKIE['PHPSESSID'] );
      classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
   }






   function login($sessionId , $userId  ){
      $this->sessionId = $sessionId;
      //classes_utils_cookies::writeSessionCookie($sessionId);
      $_SESSION['LITEFRAMESESSIONID'] = $sessionId ;
      $this->setUserProperties($userId);
      //pr(array(      'post'=>$_POST,      'session'=>$_SESSION , 'cookies'=>$_COOKIE ,      'sessionid'=>$sessionId,      'userid'=>$userId,      ),false);
   }







   function do_Login(){

      //first access to application
      //Log based on POST parameters
      if(
      !empty($_POST['LITEFRAMESESSIONID'])
      && classes_utils_session::getSessionId($_POST['LITEFRAMESESSIONID'] , $_COOKIE['PHPSESSID'] )
      && $_COOKIE['PHPSESSID'] == classes_utils_session::getPhpSessionId($_POST['LITEFRAMESESSIONID'])
      ){
         $sessionId = $_POST['LITEFRAMESESSIONID'];
         $userId = classes_utils_session::getUserIdBySessionId($sessionId);
         //$officeId = classes_utils_session::getOfficeIdBySessionId($sessionId);
         classes_utils_session::deleteOldSessionId($userId,$sessionId , $_COOKIE['PHPSESSID'] );
         $this->login($sessionId,$userId);
         $this->loged = true;
         return true;

      }

      //not the first access to application
      //based on session parameters
      elseif(
      !empty($_SESSION['LITEFRAMESESSIONID'])
      && classes_utils_session::getSessionId($_SESSION['LITEFRAMESESSIONID'] , $_COOKIE['PHPSESSID'] )
      && $_COOKIE['PHPSESSID'] == classes_utils_session::getPhpSessionId($_SESSION['LITEFRAMESESSIONID'])
      ){
         $sessionId = $_SESSION['LITEFRAMESESSIONID'];
         $userId = classes_utils_session::getUserIdBySessionId($sessionId);
         classes_utils_session::deleteOldSessionId($userId,$sessionId , $_COOKIE['PHPSESSID'] );
         $this->login($sessionId,$userId);
         $this->sessionId = $sessionId;
         $this->loged = true;
         return true;
      }
      else{
         $this->loged = false;
         return false;
      }

   }





   function isLoged(){
      if(!isset($this->loged)){
         $this->do_Login();
      }
      return $this->loged;
   }



   function debug($kill=null){
      pr(array(
      'post'=>$_POST,
      'coockie'=>$_COOKIE,
      'sessionIdPost'=> classes_utils_session::getUserIdBySessionId($_POST['LITEFRAMESESSIONID']),
      'sessionIdCoockie'=> classes_utils_session::getUserIdBySessionId($_COOKIE['LITEFRAMESESSIONID']),
      ),$kill);
   }





   function getUserIdByName($userName,$officeName){

      return $this->dao->getUserIdByName($userName,$officeName);
   }




   function getOfficeIdByName($userName,$officeName){

      return $this->dao->getOfficeIdByName($userName,$officeName);
   }






   function appIsAllowedToUser($appName){
      $allowedApps = $this->getAllowedAppsToUser($this->getProperty('id'));
      $return = false;

      foreach ($allowedApps as $allowedApp ){
         if ( in_array($appName,$allowedApp)){
            $return = true ;
         }
      }
      return $return ;
   }



   function actionIsAllowedToUser($appName,$actionName){
      $allowedApps = $this->getAllowedActionsToUser($this->getProperty('id'));
      $return = false;

      foreach ($allowedApps as $allowedApp ){
         if ( in_array($appName,$allowedApp)  && in_array($actionName,$allowedApp )  ){
            $return = true ;
         }
      }
      return $return ;
   }



   function getAllowedAppsToUser($userId){
      return $this->dao->getAllowedAppsToUser($userId);
   }


   function getAllowedActionsToUser($userId){
      return $this->dao->getAllowedActionsToUser($userId);
   }


   function getUsermenu(){

      $app = classes_Singleton::getInstance('classes_controller_ApplicationController');

      $action = classes_Singleton::getInstance('classes_controller_ActionController');


      $allowedActions = $this->dao->getAllowedActionsToUser($this->id);


      foreach ($allowedActions as $action ){
         if(!empty($action['menuname'])  &&  $action['inmenu'] ){
            if( empty($action['menulevel2'])) {
               $menu[$action['menulevel1']]['items'][]= array('target'=>SITE_ROOT.'/'.$action['application'].'/'.$action['action'].'/','name'=>$action['menuname']);
            }
            else{
               $menu[$action['menulevel1']]['submenus'][$action['menulevel2']][]= array('target'=>SITE_ROOT.'/'.$action['application'].'/'.$action['action'].'/','name'=>$action['menuname']);
            }
         }
      }
      return $menu;
   }






   function inGroup($groupName){

      $return = false;

      foreach ($this->getGroups() as $group) {

         if( in_array($groupName,$group)){
            $return = true;
         }

      }

      return $return ;

   }




   function isActive(){

      return $this->dao->isActive($this->id);

   }



}

?>