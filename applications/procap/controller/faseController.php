<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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


class procap_controller_faseController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_faseModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_faseFormStructure() ,'client' );
      $this->controller->getEnv()->forms['faseForm'] =  $form;

      $faseList =  $model->getList( new procap_model_structure_faseListStructure() );
      $this->controller->getEnv()->lists['faseList'] =  $faseList;

      $view = new procap_view_faseView($this->controller,$this->getEnv());

   }

}
?>
