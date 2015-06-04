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


class admin_controller_officeController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){


      $model = new admin_model_officeModel($this->controller);


      $form =  $model->getForm( new admin_model_structure_officeFormStructure() ,'client' );
      $this->controller->env->forms['officeForm'] =  $form;


      $officeList =  $model->getList( new admin_model_structure_officeListStructure() );
      $this->controller->env->lists['officeList'] =  $officeList;


      if(isset($_POST['id'])){
         $this->controller->env->request['apps'] =  $model->getApps($_POST['id']);
      }
      else{
         $this->controller->env->request['apps'] =  $model->getApplications() ;
      }


      $view = new admin_view_officeView($this->controller,$this->env);

   }

}
?>