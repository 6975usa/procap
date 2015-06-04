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


class login_model_loginModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidator') ;

      $this->setMakeCRUD(false);

   }


   function formValidator($fields){
      $return = true;

      $user = $this->controller->user;
      if(  !$user->validateLogin( $fields['name'] ,$fields['password'], $fields['office'] )) {
         $this->controller->messages->addErrorMessage(INVALID_LOGIN);
         $return  = false;
      }

      return $return;

   }





}


?>