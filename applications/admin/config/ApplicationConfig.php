<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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


class admin_config_ApplicationConfig{

   /**
    * array with the allowed url parameters
    *
    * @var actions array
    */
   public $actions=null;


   /**
    * This function determines weather a url parameter can access a class.
    * Depending on url parameter sent by either action or request_uri a class is called
    *
    * @return array
    *
    */
   public function getActions(){
      if(is_null($this->actions)){
         $this->setActions();
      }
      return $this->actions;
   }


   /**
    * This function determines weather a url parameter can access a class.
    * Depending on url parameter sent by either action or request_uri a class is called
    *
    * @return array
    *
    */
   public function setActions(){
      $this->actions = array(
         'default' => 'admin_controller_adminController',
         'groups' => 'admin_controller_groupsController',
         'office' => 'admin_controller_officeController',
         'user' => 'admin_controller_userController',
         'app' => 'admin_controller_appController',
         'action' => 'admin_controller_actionController',
      );
   }

}

?>