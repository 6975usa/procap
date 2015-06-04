<?php
/**
 * Este arquivo é parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_SystemController{

   public $splitedUrl=null;
   public $access=null;
   public $env ;
   public $application;
   public $module;
   public $action;
   public $appConf;
   public $appTemplateDir;
   public $messages;

   function run(){

      $this->messages = new classes_controller_Messages();
      $this->access = new classes_Access();
      $this->access->verificaAcesso(classes_AccessParams::getParams());

      //require_once('Date.php');
      //$this->date = new Date();

      $this->env = new classes_controller_Environment($this);
      $this->env->sanitize();

      $this->application = new classes_controller_ApplicationController($this);
      $this->application->run();

      $this->module = new classes_controller_ModuleController($this);
      $this->module->run();

      $this->action = new classes_controller_ActionController($this);
      $this->action->run();

   }





   function runAction($action){
      $action = $this->module->getName().'/'.$action;
      $actions = $this->application->getConfig()->getActions();
      if( array_key_exists($action,$actions)){
         $actionName = $actions[$action];
         $action = new $actionName($this);
         $action->execute();
      }
      else{
         $this->access->setAcessoNegado('Action Not Found: '.$action);
      }
   }




}


?>