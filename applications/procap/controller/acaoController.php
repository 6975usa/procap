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


class procap_controller_acaoController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_acaoModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_acaoFormStructure() ,'client' );
      $this->controller->getEnv()->forms['acaoForm'] =  $form;


      $acaoList =  $model->getList( new procap_model_structure_acaoListStructure() );
      $this->controller->getEnv()->lists['acaoList'] =  $acaoList;

      $view = new procap_view_acaoView($this->controller,$this->getEnv());

   }

}
?>
