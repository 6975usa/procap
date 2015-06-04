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


class procap_controller_clienteController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){



      $model = new procap_model_clienteModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_clienteFormStructure() ,'client' );
      if($form){
         $form->getElement('office_id')->setValue($this->controller->user->getProperty('office_id'));
      }


      $action = $this->controller->getAction()->getCrudAction();

      $mostrar_pessoa_fisica = 'none';
      $mostrar_pessoa_juridica = 'none';
      $mostrar_endereco = 'none';
      $mostrar_escolha = 'block';



      /*
      Definindo o template a ser usado conforme pessoa fisica ou juridica
      */
      $template = APP_ROOT.'/procap/templates/clienteForm.tpl';
      if( $action == 'insert'  ||  $action == 'new'  ){
         if( isset($_POST['cliente'])  && $_POST['cliente'] == 'pessoa_fisica'  ){
            $template = APP_ROOT.'/procap/templates/clientePFForm.tpl';
            $form->addElement('hidden', 'cliente', null , array('value' => 'pessoa_fisica'));
         }
         if( isset($_POST['cliente'])  && $_POST['cliente'] == 'pessoa_juridica'  ){
            $template = APP_ROOT.'/procap/templates/clientePJForm.tpl';
            $form->addElement('hidden', 'cliente', null , array('value' => 'pessoa_juridica'));
         }
      }
      else{
         if( isset($_POST['id'])){
            $tipoPessoa = $model->getTipoPessoaDoCliente($_POST['id']) ;
            switch ($tipoPessoa) {
               case 'pessoa_fisica':
                  $template = APP_ROOT.'/procap/templates/clientePFForm.tpl';
                  $form->addElement('hidden', 'cliente', null , array('value' => 'pessoa_fisica'));
                  $form->getElement('cliente')->setValue('pessoa_fisica');
                  break;

               case 'pessoa_juridica':
                  $template = APP_ROOT.'/procap/templates/clientePJForm.tpl';
                  $form->addElement('hidden', 'cliente', null , array('value' => 'pessoa_juridica'));
                  $form->getElement('cliente')->setValue('pessoa_juridica');
                  break;

               default:
                  throw new Exception('Tipo de pessoa desconhecido: '.$tipoPessoa);
                  break;
            }
         }
      }
      $this->controller->env->request['template'] = $template;




      $this->controller->env->request['mostrar_pessoa_fisica'] = $mostrar_pessoa_fisica;
      $this->controller->env->request['mostrar_pessoa_juridica'] = $mostrar_pessoa_juridica;
      $this->controller->env->request['mostrar_endereco'] = $mostrar_endereco;
      $this->controller->env->request['mostrar_escolha'] = $mostrar_escolha;

      $this->controller->env->forms['clienteForm'] =  $form;


      $clienteList =  $model->getList( new procap_model_structure_clienteListStructure() );
      $this->controller->env->lists['clienteList'] =  $clienteList;

      $view = new procap_view_clienteView($this->controller,$this->env);

   }

}
?>
