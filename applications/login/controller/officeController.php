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


class login_controller_officeController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){

      if($this->controller->getAction()->isInsert()  ||  $this->controller->getAction()->isNew() ){
         $_POST['creation_date'] = date('Y-m-d');
      }


      $model = new login_model_officeModel($this->controller);

      $form =  $model->getForm( new login_model_structure_officeFormStructure() ,'client' );

      if( $this->controller->getAction()->getCrudAction() <>   'new' ){
         if( $model->crudValidate() ){
            classes_utils_jsFunctions::alert('Cadastro realizado com sucesso!');
            classes_utils_jsFunctions::redirect(SITE_ROOT.'/login/default/');
         }
      }

      $form->getElement('MM_insert')->setValue('Cadastrar');
      $this->controller->getEnv()->forms['officeForm'] =  $form;
      $view = new login_view_officeView($this->controller,$this->getEnv());




   }

}

?>
