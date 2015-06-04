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


class procap_controller_orgaojudicialController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_orgaojudicialModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_orgaojudicialFormStructure() ,'client' );
      $this->controller->env->forms['orgaojudicialForm'] =  $form;

      // pr($form);


      if(isset($_POST['id'])) {
         $this->controller->env->request['turmas'] = $model->getTurmasDeOrgaoJudicial($_POST['id']);
      }
      else{
         $this->controller->env->request['turmas'] = null;
      }

      $orgaojudicialList =  $model->getList( new procap_model_structure_orgaojudicialListStructure() );
      $this->controller->env->lists['orgaojudicialList'] =  $orgaojudicialList;

      $view = new procap_view_orgaojudicialView($this->controller,$this->env);

   }

}
?>
