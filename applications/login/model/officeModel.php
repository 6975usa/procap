<?php

/**
 * Este arquivo Ã© parte do programa LiteFrame - lightWeight FrameWork
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


class login_model_officeModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidate') ;

      $this->setMakeCRUD(true);
      /*
      $this->form->addRule('logo_path', 'Máximo 400K', 'maxfilesize', 400*1024, 'server');
      $this->form->addRule('logo_path', 'Tipo não permitido', 'mimetype', array('png','tif','jpg','jpeg','bmp'), 'server');

      $this->form->addRule('user_image_path', 'Máximo 400K', 'maxfilesize', 400*1024, 'server');
      $this->form->addRule('user_image_path', 'Tipo não permitido', 'mimetype', array('png','tif','jpg','jpeg','bmp'), 'server');
      */

      if($this->controller->getAction()->isInsert()){
         //$logo = $this->form->getElement('logo');
         //$logo->moveUploadedFile(SHARE_ROOT.'/tmp/'   );
      }


   }





   function formValidate($fields) {

      $return = true;

      if($fields['user_password']<>$fields['user_confirmpassword']){
         $this->controller->messages->addErrorMessage('Senhas não conferem.');
         $this->controller->env->formErrorMessages['user_confirmpassword'] = 'Senhas diferentes' ;
         $return = false;
      }


      if( $this->facade->getDao('login_dao_officeDAO')->officeLoginNameExists($fields['name']) ) {
         $this->form->getElement('name')->setAttribute('class','error');
         $this->controller->env->formErrorMessages['name'] = 'Nome de login ja existe' ;
         $return  = false;
      }


      if( $this->facade->getDao('login_dao_officeDAO')->userLoginNameExists($_POST['user_loginname'],$_POST['name'])){
         $this->form->getElement('user_loginname')->setAttribute('class','error');
         $this->controller->env->formErrorMessages['user_loginname'] = 'Nome de login ja existe' ;
         $return  = false;
      }


      if( $this->facade->getDao('login_dao_officeDAO')->emailExists($_POST['user_email'])){
         $this->form->getElement('user_email')->setAttribute('class','error');
         $this->controller->env->formErrorMessages['user_email'] = 'email ja existe' ;
         $return = false;
      }


      return $return ;

   }





}


?>