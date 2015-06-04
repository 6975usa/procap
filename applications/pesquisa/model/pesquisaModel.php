<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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


class pesquisa_model_pesquisaModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidate') ;

      $this->setInsertSuccessMsg('Inserido com Sucesso!!');
      $this->setUpdateSuccessMsg('Alterado com Sucesso!!');
      $this->setDeleteSuccessMsg('Excluído com Sucesso!!');
      $this->setNewRegistryMsg('');
      $this->setLsUpdateMsg('');



      $action  = $this->controller->getAction()->getCrudAction();
      switch ($action) {
         case 'insert':
         case 'update':
            if( !$this->crudValidate() ){
               foreach($this->form->_errors as $elementName=>$errorMsg){
                  $this->form->getElement($elementName)->setAttribute('class','error');
                  $this->form->_errors[$elementName]='<div class="error">'.$errorMsg.'</div>';
               }
            }
            break;

         default:
            break;
      }



   }




   function formValidate($fields) {

      $ret = 1 ;

      //Validacao dos campos de item 14
      $validator = new pesquisa_classes_formValidator();
      $elementos = array('ouvir','aprender','tocar','compor','ensinar','produzir','elaborar','pesquisar','divulgar','construir','vender','colecionar','gerir','louvar');
      $ret = $validator->validateOptions($this->controller->env , $this->form , $elementos , $fields , 'outras_atividades' , 'Marque pelo menos uma atividade.' );



      //Se usuario nao eh filiado a OMB entao tem que preencher campo de outras entidades
      if(empty($fields['omb']) && empty($fields['registro_entidade']) ) {
         $this->controller->env->formErrorMessages['registro_entidade'] = '<div class="error">Marque "Sou filiado Ã  OMB "<br> Ou diga por que não é filiado e cite outras entidades.</div>' ;
         $this->form->getElement('registro_entidade')->setAttribute('class','error') ;
         $ret = 0;
      }

      //Naturalidade
      if(empty($fields['naturalidade'][2] ) ){
         $this->controller->env->formErrorMessages['naturalidade'] = '<div class="error">Escolha Cidade</div>' ;
         $ret = 0;
      }
      if(empty($fields['naturalidade'][1] ) ){
         $this->controller->env->formErrorMessages['naturalidade'] = '<div class="error">Escolha Estado</div>' ;
         $ret = 0;
      }
      if(empty($fields['naturalidade'][0] ) ){
         $this->controller->env->formErrorMessages['naturalidade'] = '<div class="error">Escolha País</div>' ;
         $ret = 0;
      }

      return $ret ;

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





}


?>