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


class procap_model_agendaModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidate') ;

   }





   function formValidate($fields) {

      $ret = true;


      if( !empty($fields['agenda']) && $fields['agenda']==1 ) {

         if( empty($fields['termino_data'])  ) {

            $this->controller->getEnv()->formErrorMessages['termino_data'] = ' não pode ser vazio' ;
            $this->form->getElement('termino_data')->setAttribute('class','error') ;

            $alert = classes_utils_jsFunctions::alert('Quando o compromisso aparece na agenda \n\r Datas de Início e Término não podem ser vazias');
            $this->form->setRequiredNote(REQUIRED_NOTE . $alert );

            $ret =  false;

         }
         if( empty($fields['inicio_data'])  ) {

            $this->controller->getEnv()->formErrorMessages['inicio_data'] = ' não pode ser vazio' ;
            $this->form->getElement('inicio_data')->setAttribute('class','error') ;

            $alert = classes_utils_jsFunctions::alert('Quando o compromisso aparece na agenda \n\r Datas de Início e Término não podem ser vazias');
            $this->form->setRequiredNote(REQUIRED_NOTE . $alert );

            $ret =  false;

         }
      }

      return $ret  ;
   }


   function marcarConclusaoAndamento($andamentoId){
      $this->facade->marcarConclusaoAndamento($andamentoId);
   }

}


?>