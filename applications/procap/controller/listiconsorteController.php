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


class procap_controller_listiconsorteController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_listiconsorteModel($this->controller);

      $form =  $model->getForm( new procap_model_structure_listiconsorteFormStructure() ,'client' );

      if($form){

         $form->getElement('processo_id')->setValue($_GET['pc']);
         if( $form->elementExists(INSERT_BUTTON_NAME)  ){
            $form->getElement(INSERT_BUTTON_NAME)->setValue('Salvar Listiconsorte');
         }
         if( $form->elementExists(UPDATE_BUTTON_NAME)  ){
            $form->getElement(UPDATE_BUTTON_NAME)->setValue('Salvar Listiconsorte');
         }
         if( $form->elementExists(NEW_BUTTON_NAME)  ){
            $form->getElement(NEW_BUTTON_NAME)->setValue('Novas Listiconsorte');
         }
         if( $form->elementExists(DELETE_BUTTON_NAME)  ){
            $form->getElement(DELETE_BUTTON_NAME)->setValue('Excluir Listiconsorte');
         }
         if( $form->elementExists(LIST_BUTTON_NAME)  ){
            $form->getElement(LIST_BUTTON_NAME)->setValue('Ver Listiconsortes');
         }
      }

      $this->controller->getEnv()->forms['listiconsorteForm'] =  $form;

      $listiconsorteList =  $model->getList( new procap_model_structure_listiconsorteListStructure() );
      $this->controller->getEnv()->lists['listiconsorteList'] =  $listiconsorteList;

      $view = new procap_view_listiconsorteView($this->controller,$this->getEnv());

   }

}
?>
