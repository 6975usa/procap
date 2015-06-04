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


class pesquisa_controller_ouvirController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){

      try {

         $model = new pesquisa_model_ouvirModel($this->controller);


         if(!$this->controller->action->getCrudAction()){
            $this->controller->action->setCrudAction('new');
         }


         $form =  $model->getForm( new pesquisa_model_structure_ouvirFormStructure() );
         $this->controller->env->forms['pesquisaForm'] =  $form;


         $this->controller->env->validado = false;
         if(!$this->controller->action->isNew()){
            if($model->formRulesValidate()  && $form->validate() ){
               $this->controller->env->validado = true;
               $form->freeze();
            }
         }


         $view = new pesquisa_view_ouvirView($this->controller,$this->env);

      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }
   }

}
?>
