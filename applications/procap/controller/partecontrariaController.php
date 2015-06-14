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


class procap_controller_partecontrariaController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){



      $model = new procap_model_partecontrariaModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_partecontrariaFormStructure() ,'client' );
      if($form){
         $form->getElement('office_id')->setValue($this->controller->getUser()->getProperty('office_id'));
      }

      $action = $this->controller->getAction()->getCrudAction();

      $mostrar_pessoa_fisica = 'none';
      $mostrar_pessoa_juridica = 'none';
      $mostrar_endereco = 'none';
      $mostrar_escolha = 'block';



      /*
      Definindo o template a ser usado conforme pessoa fisica ou juridica
      */
      $template = APP_ROOT.'/procap/templates/partecontrariaForm.tpl';
      if( $action == 'insert'  ||  $action == 'new'  ){
         if( isset($_POST['partecontraria'])  && $_POST['partecontraria'] == 'pessoa_fisica'  ){
            $template = APP_ROOT.'/procap/templates/partecontrariaPFForm.tpl';
            $form->addElement('hidden', 'partecontraria', null , array('value' => 'pessoa_fisica'));
         }
         if( isset($_POST['partecontraria'])  && $_POST['partecontraria'] == 'pessoa_juridica'  ){
            $template = APP_ROOT.'/procap/templates/partecontrariaPJForm.tpl';
            $form->addElement('hidden', 'partecontraria', null , array('value' => 'pessoa_juridica'));
         }
      }
      else{
         if( isset($_POST['id'])){
            $tipoPessoa = $model->getTipoPessoaDopartecontraria($_POST['id']) ;
            switch ($tipoPessoa) {
               case 'partecontraria pessoa_fisica':
                  $template = APP_ROOT.'/procap/templates/partecontrariaPFForm.tpl';
                  $form->addElement('hidden', 'partecontraria', null , array('value' => 'pessoa_fisica'));
                  $form->getElement('partecontraria')->setValue('pessoa_fisica');
                  break;

               case 'partecontraria pessoa_juridica':
                  $template = APP_ROOT.'/procap/templates/partecontrariaPJForm.tpl';
                  $form->addElement('hidden', 'partecontraria', null , array('value' => 'pessoa_juridica'));
                  $form->getElement('partecontraria')->setValue('pessoa_juridica');
                  break;

               default:
                  throw new Exception('Tipo de pessoa desconhecido: '.$tipoPessoa);
                  break;
            }
         }
      }
      $this->controller->getEnv()->request['template'] = $template;




      $this->controller->getEnv()->request['mostrar_pessoa_fisica'] = $mostrar_pessoa_fisica;
      $this->controller->getEnv()->request['mostrar_pessoa_juridica'] = $mostrar_pessoa_juridica;
      $this->controller->getEnv()->request['mostrar_endereco'] = $mostrar_endereco;
      $this->controller->getEnv()->request['mostrar_escolha'] = $mostrar_escolha;

      $this->controller->getEnv()->forms['partecontrariaForm'] =  $form;


      $partecontrariaList =  $model->getList( new procap_model_structure_partecontrariaListStructure() );
      $this->controller->getEnv()->lists['partecontrariaList'] =  $partecontrariaList;

      $view = new procap_view_partecontrariaView($this->controller,$this->getEnv());

   }

}
?>
