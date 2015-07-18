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


class procap_model_advogadoModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){
      $this->form->addFormRule($this,'formValidate') ;
   }



   function formValidate($fields) {

      $ret = true;

      if( $this->dao->nomeLoginJaAtribuido($fields['user_id'] , $fields['id']) ) {
         $this->controller->getEnv()->formErrorMessages['user_id'] = ' Já atribuído a outro advogado ' ;
         $this->form->getElement('user_id')->setAttribute('class','error') ;
         $ret =  false;
      }

      return $ret  ;

   }


}


?>