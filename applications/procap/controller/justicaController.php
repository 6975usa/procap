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


class procap_controller_justicaController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_justicaModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_justicaFormStructure() ,'client' );
      $this->controller->getEnv()->forms['justicaForm'] =  $form;


      $justicaList =  $model->getList( new procap_model_structure_justicaListStructure() );
      $this->controller->getEnv()->lists['justicaList'] =  $justicaList;

      $view = new procap_view_justicaView($this->controller,$this->getEnv());

   }

}
?>
