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


class procap_controller_pecaController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      
      ini_set('upload_max_filesize', 5*1024*1024 ) ;

      $model = new procap_model_pecaModel($this->controller);

      $form =  $model->getForm( new procap_model_structure_pecaFormStructure() ,'client' );

      if($form){

         $form->addRule( 'arquivo', 'n�o', 'maxfilesize', 5);

         $form->getElement('processo_id')->setValue($_GET['pc']);
         if( $form->elementExists(INSERT_BUTTON_NAME)  ){
            $form->getElement(INSERT_BUTTON_NAME)->setValue('Salvar Pe�a');
         }
         if( $form->elementExists(UPDATE_BUTTON_NAME)  ){
            $form->getElement(UPDATE_BUTTON_NAME)->setValue('Salvar Pe�a');
         }
         if( $form->elementExists(NEW_BUTTON_NAME)  ){
            $form->getElement(NEW_BUTTON_NAME)->setValue('Novo Pe�a');
         }
         if( $form->elementExists(DELETE_BUTTON_NAME)  ){
            $form->getElement(DELETE_BUTTON_NAME)->setValue('Excluir Pe�a');
         }
         if( $form->elementExists(LIST_BUTTON_NAME)  ){
            $form->getElement(LIST_BUTTON_NAME)->setValue('Ver Pe�a');
         }
      }

      $this->controller->env->forms['pecaForm'] =  $form;

      $pecaList =  $model->getList( new procap_model_structure_pecaListStructure() );

      if($pecaList){
         foreach ($pecaList->data as $key => $lista ){
            if( !(strstr( $lista['arquivo'],'doc' ) || strstr($lista['arquivo'],'pdf' ) ) ){
               $pecaList->data[$key]['arquivo'] = null ;
            }
         }
      }
      $this->controller->env->lists['pecaList'] =  $pecaList;

      $view = new procap_view_pecaView($this->controller,$this->env);

   }

}
?>
