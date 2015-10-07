<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *  Sets up Action object for entire application
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_ActionController{

   protected $name;
   protected $crudaction;
   protected $controller;


   function __construct(classes_controller_SystemController $controller ){
      $this->controller = $controller;
   }


   function run(){
      $this->defineAction();
      $this->verifyActionIsAllowed($this->getName());
      $this->setCrudAction();
   }


   function defineAction() {
      switch (URL_VALIDATION_METHOD) {
         case 'url':
            $url = str_replace('?'.$_SERVER["QUERY_STRING"], '',$_SERVER['REQUEST_URI']);
            $sid = '';
            break;

         case 'redirect':
            $url = $_SERVER['REQUEST_URI'];
            $sid = '/sid/';
            break;

         case 'url_target':
            $url = $_GET["target"];
            $sid = '/';
            break;
         default:
            throw new Exception('URL_VALIDATION_METHOD not defined or invalid in globalConstants.inc.php');
      }

      if($this->controller->getModule()){
         $module = $this->controller->getModule()->getName();
      }
      if(!empty($module)){
         $module = '/'.$this->controller->getModule()->getName();
      }
      else{
         $module=''   ;
      }

      if($this->controller->getApplication()){
         $application = $this->controller->getApplication()->getName();
      }
      else{
         $application = '';
      }

      $action = str_replace(SITE_ROOT.'/'.$application.'/'.$module,'',$url);

      if(substr($action,0,1)=='/'){
         $action = substr($action,1);
      }
      if(substr($action,strlen($action)-1)=='/'){
         $action=substr($action,0,strlen($action)-1);
      }

      if(strstr(DS.$action,SITE_ROOT)){
         $action= str_replace(str_replace(DS,'',SITE_ROOT),'',$action);
      }

      $this->name = $action;
   }




   function getName(){
      return $this->name;
   }






   function actionIsAllowed($act){
      if($this->controller->getModule()){
         $module = $this->controller->getModule()->getName();
         if(!empty($module)){
            if(!empty($act)){
               $act = $module.'/'.$act;
            }
            else{
               $act = $module;
            }
         }
         else{
            $act='';
         }
      }

      $actions = $this->getConfig()->getActions();

      $allowed=false;
      foreach ($actions as $action=>$name) {
         if($action == $act){
            $allowed=true;
         }
      }
      return $allowed;
   }




   function verifyActionIsAllowed($actionName){
      if(!$this->actionIsAllowed($actionName)){
         if($this->controller->applicationMustBeVerified($this->controller->getApplication()->getName())){
            classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
         }
      }
   }










   function setAppTemplateDir(){
      $this->appTemplateDir = APPLICATIONS_ROOT.'/'.$this->application->getName().'/view/templates';
   }


   function getAppName(){
      return $this->application;
   }


   function getAppRoot(){
      return APPLICATIONS_ROOT.DIRECTORY_SEPARATOR.$this->getAppName();
   }


   function getAppTemplatesDir(){
      return $this->getAppRoot().'/view/templates';
   }


   function isLsUpdate(){
      if(isset($_POST['action']) && $_POST['action']=='lsUpdate'){
         return true;
      }
      else{
         return false;
      }
   }


   function isUpdate(){
      if(isset($_POST['action']) && $_POST['action']=='MM_update'){
         return true;
      }
      else{
         return false;
      }
   }


   function isDelete(){
      if(isset($_POST['action']) && $_POST['action']=='MM_delete'){
         return true;
      }
      else{
         return false;
      }
   }


   function isInsert(){
      if(isset($_POST['action']) && $_POST['action']=='MM_insert'){
         return true;
      }
      else{
         return false;
      }
   }


   function isNew(){
      if(isset($_POST['action']) && $_POST['action']=='MM_new'){
         return true;
      }
      else{
         return false;
      }
   }


   function isNewRecord(){
      if( $this->isInsert() || $this->isNew() ){
         return true;
      }
      else{
         return false;
      }
   }



   function getCrudAction(){
      if(!isset($this->crudaction)){
         $this->setCrudAction();
      }
      return $this->crudaction;
   }


   function setCrudAction($action=null){
      if(!is_null($action)){
         $this->crudaction=$action;
         $_POST['action']="MM_".$action;
      }
      else{
         if($this->isDelete()) $this->crudaction = 'delete';
         elseif($this->isInsert()) $this->crudaction =  'insert';
         elseif($this->isUpdate()) $this->crudaction =  'update';
         elseif($this->isLsUpdate()) $this->crudaction =  'lsUpdate';
         elseif($this->isNew()) $this->crudaction =  'new';
         else  $this->crudaction =  'list';
         $_POST['action']="MM_".$this->crudaction;
      }

   }


   function getConfig(){
      if(empty($this->config)){
         $this->setConfig();
      }
      return $this->config; 
   }





   function setConfig(){
      $confName = $this->controller->getApplication()->getName().'_'.'config_ApplicationConfig';
      require_once( APP_ROOT.DS.str_replace('_',DS,$confName).'.php');
      $this->config = new $confName();
   }


}


?>