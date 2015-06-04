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


class pesquisa_controller_pesquisaController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){

      try {

         $model = new pesquisa_model_pesquisaModel($this->controller);

         $form =  $model->getForm( new pesquisa_model_structure_pesquisaFormStructure() ,'client' );
         $this->controller->env->forms['pesquisaForm'] =  $form;


         $pesquisaList =  $model->getList( new pesquisa_model_structure_pesquisaListStructure() );
         $this->controller->env->lists['pesquisaList'] =  $pesquisaList;





         //$this->controller->env->validado = false;


         $view = new pesquisa_view_pesquisaView($this->controller,$this->env);

      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }
   }

}
?>
