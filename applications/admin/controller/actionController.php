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


class admin_controller_actionController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){


      $model = new admin_model_actionModel($this->controller);

      $form =  $model->getForm( new admin_model_structure_actionFormStructure() ,'client' );
      $this->controller->env->forms['actionForm'] =  $form;

      $actionList =  $model->getList( new admin_model_structure_actionListStructure() );
      $this->controller->env->lists['actionList'] =  $actionList;

      $view = new admin_view_actionView($this->controller,$this->env);

   }

}
?>