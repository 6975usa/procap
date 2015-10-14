<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since 1.0
 * @author Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright 2010 Anselmo S Ribeiro
 *            @licence LGPL
 */
class procap_controller_pecaController extends classes_controller_AbstractSystemController {

   private $desc_html = null;

   function __construct ($controller) {
      $this->controller = $controller;
   }

   function execute () {
      ini_set('upload_max_filesize', 5 * 1024 * 1024);
      
      $model = new procap_model_pecaModel($this->controller);
      
      $form = $model->getForm(new procap_model_structure_pecaFormStructure(), 'client');
      
      if ($form) {
         
         $form->addRule('arquivo', 'não', 'maxfilesize', 5);
         
         $form->getElement('processo_id')->setValue($_GET['pc']);
         if ($form->elementExists(INSERT_BUTTON_NAME)) {
            $form->getElement(INSERT_BUTTON_NAME)->setValue('Salvar Peça');
         }
         if ($form->elementExists(UPDATE_BUTTON_NAME)) {
            $form->getElement(UPDATE_BUTTON_NAME)->setValue('Salvar Peça');
         }
         if ($form->elementExists(NEW_BUTTON_NAME)) {
            $form->getElement(NEW_BUTTON_NAME)->setValue('Novo Peça');
         }
         if ($form->elementExists(DELETE_BUTTON_NAME)) {
            $form->getElement(DELETE_BUTTON_NAME)->setValue('Excluir Peça');
         }
         if ($form->elementExists(LIST_BUTTON_NAME)) {
            $form->getElement(LIST_BUTTON_NAME)->setValue('Ver Peças');
         }
         $this->acertaTextarea($form);
      }
      
      $this->controller->getEnv()->forms['pecaForm'] = $form;
      
      $_GET['setPerPage'] = 10000;
      $pecaList = $model->getList(new procap_model_structure_pecaListStructure());
      
      if ($pecaList) {
         foreach ($pecaList->data as $key => $lista) {
            if (! (strstr($lista['arquivo'], 'doc') || strstr($lista['arquivo'], 'pdf'))) {
               $pecaList->data[$key]['arquivo'] = null;
            }
         }
      }
      
      $this->controller->getEnv()->desc_html = $this->desc_html;
      
      $this->controller->getEnv()->lists['pecaList'] = $pecaList;
      
      $view = new procap_view_pecaView($this->controller, $this->getEnv());
   }

   function acertaTextarea ($form) {
      $html = $form->toArray()['elements'][2]['html'];
      $value = $form->toArray()['elements'][2]['value'];
      if (strstr($html, "></textarea>")) {
         $this->desc_html = str_replace("></textarea>", ">" . $value . "</textarea>", $html);
      } else {
         $this->desc_html = $html;
      }
   }

}

?>
