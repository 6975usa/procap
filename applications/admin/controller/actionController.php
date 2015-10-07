<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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


class admin_controller_actionController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){


      $model = new admin_model_actionModel($this->controller);

      $form =  $model->getForm( new admin_model_structure_actionFormStructure() ,'client' );
      $this->controller->getEnv()->forms['actionForm'] =  $form;

      $actionList =  $model->getList( new admin_model_structure_actionListStructure() );
      $this->controller->getEnv()->lists['actionList'] =  $actionList;

      $view = new admin_view_actionView($this->controller,$this->getEnv());

   }

}
?>