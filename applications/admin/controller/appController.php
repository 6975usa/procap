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


class admin_controller_appController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){

      $model = new admin_model_appModel($this->controller);

      $form =  $model->getForm( new admin_model_structure_appFormStructure() ,'client' );
      $this->controller->env->forms['appForm'] =  $form;

      $appList =  $model->getList( new admin_model_structure_appListStructure() );
      $this->controller->env->lists['appList'] =  $appList;


      if(isset($_POST['id'])){
         $this->controller->env->request['appGroups'] =  $model->getAppGroups($_POST['id']);
      }
      else{
         $this->controller->env->request['appGroups'] =  null ;
      }


      $view = new admin_view_appView($this->controller,$this->env);

   }

}
?>