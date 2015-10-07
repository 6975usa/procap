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


class procap_controller_comarcaController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_comarcaModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_comarcaFormStructure() ,'client' );
      $this->controller->getEnv()->forms['comarcaForm'] =  $form;

      $comarcaList =  $model->getList( new procap_model_structure_comarcaListStructure() );
      $this->controller->getEnv()->lists['comarcaList'] =  $comarcaList;

      $view = new procap_view_comarcaView($this->controller,$this->getEnv());

   }

}
?>
