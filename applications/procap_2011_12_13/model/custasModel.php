<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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


class procap_model_custasModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){


      $this->form->addFormRule($this,'formValidate') ;
   }





   function formValidate($fields) {

      $return = true;

      // valor repercussao economica deve ser numero
      $valor = str_replace('.','',$fields['valor']);
      $valor = str_replace(',','.',$valor);
      if(!empty($valor) && !is_numeric($valor) ){
         $this->controller->env->formErrorMessages['valor'] = 'deve ser n&uacurtemero' ;
         $this->form->getElement('valor')->setAttribute('class','error') ;
         $return  =  false;
      }


      return $return;

   }



}


?>