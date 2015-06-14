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


class admin_controller_groupsController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){

      $model = new admin_model_groupsModel($this->controller);

      $form =  $model->getForm( new admin_model_structure_groupsFormStructure() ,'client' );


      if(isset($_POST['id'])){
         $form->getElement('office_id')->freeze();
         $form->getElement('application_id')->freeze();
      }

      $this->controller->getEnv()->forms['groupsForm'] =  $form;

      $groupsList =  $model->getList( new admin_model_structure_groupsListStructure() );
      $this->controller->getEnv()->lists['groupsList'] =  $groupsList;

      if(isset($_POST['id'])){
         $this->controller->getEnv()->request['actions'] =  $model->getAllActions() ;
      }
      else{
         $this->controller->getEnv()->request['actions'] =  $model->getAllActions() ;
      }


      $view = new admin_view_groupsView($this->controller,$this->getEnv());

   }

}
?>