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


class procap_controller_advogadoController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){



      $model = new procap_model_advogadoModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_advogadoFormStructure() ,'client' );
      if($form){
         $form->getElement('office_id')->setValue($this->controller->getUser()->getProperty('office_id'));
      }
      $this->controller->getEnv()->forms['advogadoForm'] =  $form;


      $advogadoList =  $model->getList( new procap_model_structure_advogadoListStructure() );
      $this->controller->getEnv()->lists['advogadoList'] =  $advogadoList;


      $view = new procap_view_advogadoView($this->controller,$this->getEnv());

   }

}
?>
