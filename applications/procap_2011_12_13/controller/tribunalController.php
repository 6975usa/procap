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


class procap_controller_tribunalController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_tribunalModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_tribunalFormStructure() ,'client' );
      $this->controller->env->forms['tribunalForm'] =  $form;

      // pr($form);


      if(isset($_POST['id'])) {
         $this->controller->env->request['turmas'] = $model->getTurmasDeTribunal($_POST['id']);
      }
      else{
         $this->controller->env->request['turmas'] = null;
      }

      $tribunalList =  $model->getList( new procap_model_structure_tribunalListStructure() );
      $this->controller->env->lists['tribunalList'] =  $tribunalList;

      $view = new procap_view_tribunalView($this->controller,$this->env);

   }

}
?>
