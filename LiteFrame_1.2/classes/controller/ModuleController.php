<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Module setings object for entire application
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_ModuleController{

   protected $name;
   protected $controller;



   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
   }



   function run(){
      $this->setModule();
   }




   function setModule(){

      switch (URL_VALIDATION_METHOD) {
         case 'redirect':
            $url = str_replace('/sid/'.$this->controller->getApplication()->getName(),'',$_SERVER['REQUEST_URI']);
            break;

         case 'url_target':
            $url = $_GET["target"];
            $url = str_replace('/'.$this->controller->getApplication()->getName().'/','',$url);
            break;
         default:
      }

      if(substr($url,0,1)=='/'){
         $url = substr($url,1);
      }
      if(strpos($url,'/')){
         $pos1 = strpos($url,'/',1);
         $module = substr($url,0,$pos1);
      }
      else{
         $module = $url;
      }
      $this->name = $module;
   }



   function getName(){
      return $this->name;
   }




}


?>