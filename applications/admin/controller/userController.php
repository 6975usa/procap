<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since   1.0
 * @author  Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright  2010 Anselmo S Ribeiro
 * @licence LGPL
 */


class admin_controller_userController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){


      $model = new admin_model_userModel($this->controller);

      if( $this->controller->getAction()->isNewRecord() ){
         $this->controller->env->request['groups'] =  array();
      }
      else{
         $this->controller->env->request['groups'] = $model->getGroups() ;
      }


      $form =  $model->getForm( new admin_model_structure_userFormStructure() ,'client' );
      $this->controller->env->forms['userForm'] =  $form;

      $userList =  $model->getList( new admin_model_structure_userListStructure() );
      $this->controller->env->lists['userList'] =  $userList;

      $view = new admin_view_userView($this->controller,$this->env);

   }

}
?>