<?php

/**
 * Este arquivo пїЅ parte do programa LiteFrame - lightWeight FrameWork
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


class procap_model_processoModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){


      $this->form->addFormRule($this,'formValidate') ;
   }





   function formValidate($fields) {

      $return = true;

      //controlando numeraзгo do processo
      if( $this->controller->getAction()->isNewRecord()   &&  $this->facade->getDao('procap_dao_processoDAO')->nrProcessoJaExiste($fields['numero']) ) {
         $this->controller->env->formErrorMessages['numero'] = ' jб existe ' ;
         $this->form->getElement('numero')->setAttribute('class','error') ;
         $return  =  false;
      }


      //o mesmo cliente sу participa uma vez de cada processo
      if($fields['cliente1_id'] == $fields['cliente2_id']){
         $this->controller->env->formErrorMessages['cliente2_id'] = 'nгo pode ser igual' ;
         $this->form->getElement('cliente2_id')->setAttribute('class','error') ;
         $return  =  false;
      }


      // a mesma contraparte sу participa uma vez de cada processo
      if($fields['contraparte1_id'] == $fields['contraparte2_id']){
         $this->controller->env->formErrorMessages['contraparte2_id'] = 'nгo pode ser igual' ;
         $this->form->getElement('contraparte2_id')->setAttribute('class','error') ;
         $return  =  false;
      }


      // valor da causa deve ser numero
      $valorcausa = str_replace(',','',$fields['valorcausa']);
      if(!empty($valorcausa) && !is_numeric($valorcausa) ){
         $this->controller->env->formErrorMessages['valorcausa'] = 'deve ser nъmero' ;
         $this->form->getElement('valorcausa')->setAttribute('class','error') ;
         $return  =  false;
      }


      // valor repercussao economica deve ser numero
      $valorrepercussaoeconomica = str_replace(',','',$fields['valorrepercussaoeconomica']);
      if(!empty($valorrepercussaoeconomica) && !is_numeric($valorrepercussaoeconomica) ){
         $this->controller->env->formErrorMessages['valorrepercussaoeconomica'] = 'deve ser nъmero' ;
         $this->form->getElement('valorrepercussaoeconomica')->setAttribute('class','error') ;
         $return  =  false;
      }


      return $return;

   }




}


?>