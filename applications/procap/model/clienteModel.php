<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */


class procap_model_clienteModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidate') ;


   }



   function formValidate($fields) {

      $ret = true;

      $action = $this->controller->getAction()->getCrudAction() ;

      if($action == 'insert' || $action == 'update' ){
         switch ( $_POST['cliente'] ) {
            case  'pessoa_fisica' :
               if(empty($fields['nome']) ) {
                  $this->controller->env->formErrorMessages['nome'] = ' não pode ser vazio ' ;
                  $this->form->getElement('nome')->setAttribute('class','error') ;
                  $ret =  false;
               }
               if(empty($fields['sexo']) ) {
                  $this->controller->env->formErrorMessages['sexo'] = ' não pode ser vazio ' ;
                  $this->form->getElement('sexo')->setAttribute('class','error') ;
                  $ret = false;
               }
               break;

            case  'pessoa_juridica':
               if(empty($fields['nome_fantasia']) ) {
                  $this->controller->env->formErrorMessages['nome_fantasia'] = ' não pode ser vazio ' ;
                  $this->form->getElement('nome_fantasia')->setAttribute('class','error') ;
                  $ret =  false;
               }
               break;

            default:
               $this->controller->messages->addErrorMessage('Escolha Pessoa Física ou Pessoa Jurídica.');
               $ret =  false;
               break;
         }
         return $ret  ;
      }


   }





   function getPaises(){
      return $this->facade->getPaises();
   }



   function getEstados($country_id){
      return $this->facade->getEstados($country_id);
   }


   function getCidades($estadoCodigo){
      return $this->facade->getCidades($estadoCodigo);
   }


   function getTipoPessoaDoCliente($clienteId){
      return $this->facade->getDao('procap_dao_clienteDAO')->getTipoPessoaDoCliente($clienteId);
   }


}


?>