<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Applications setings object for entire application
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_ApplicationController{

   protected  $name;
   protected  $config;
   protected $controller;



   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
   }



   function run(){
      $this->setApplication();
      $this->verifyApplicationIsAllowed($this->name);
      $this->setConfig();
   }




   function setApplication(){
      switch (URL_VALIDATION_METHOD) {

         case 'url':
   		   $url = $_SERVER['REQUEST_URI'];
            $url = str_replace(SITE_ROOT.'/','',$url);
      		break;

      	case 'redirect':
   		   $url = $_SERVER['REQUEST_URI'];
            //$url = str_replace('/sid/','',$url);
      		break;

   		case 'url_target':
   		   if(!isset($_GET['target'])){
   		      $this->controller->getAccess()->denny('Target not defined.');
   		   }
   		   $url = $_GET["target"];
   		   if(substr($url,0,1)=='/'){
   		      $url = substr($url,1);
   		   }
      		break;
      	default:
      	     throw new Exception('URL_VALIDATION_METHOD not defined or invalid in globalConstants.inc.php');
      		break;
      }
      if(strpos($url,'/')){
         $pos = strpos($url,'/',1);
         $app = substr($url,0,$pos);
      }
      else{
         $app = $url;
      }
      //pr('aplication: '.$app,false);
      $this->name = $app;
   }




   function isAllowed($appName){
      require_once(SYSTEM_ROOT.'/applications/AllowedApplications.php');
      $apps = applications_AllowedAplications::getAllowedApplications();
      $allowed=false;
      foreach ($apps as $app=>$appOptions){
         if( $app == $appName ){
            $allowed=true;
         }
      }
      return $allowed;
   }




   function verifyApplicationIsAllowed( $appName ){
      if(!$this->isAllowed($appName)){
         classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
      }
   }





   function getName(){
      return $this->name;
   }



   function getConfig(){
      return $this->config;
   }





   function setConfig(){
      $confName = $this->getName().'_config_ApplicationConfig';
      require_once(APPLICATIONS_ROOT.'/'.str_replace('_',DS,$confName).'.php');
      $this->config = new $confName();
   }






   function getRoot(){
      return APPLICATIONS_ROOT.DIRECTORY_SEPARATOR.$this->getName();
   }



   function getTemplatesDir(){
       //return $this->getRoot().'/'.$this->controller->getModule()->getName().'/'.'view/templates';
       return $this->getRoot().'/'.'view/templates';
   }




}


?>