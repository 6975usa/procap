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


class admin_model_userModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidator') ;

   }





   function formValidator($fields){


      //Novo usuário
      if (  $this->controller->getAction()->isNewRecord() ){
         if(empty($fields['password_first'])){
            $this->form->getElement('password_first')->setAttribute('class','error');
            $this->form->_errors['password_first']='Não pode ser vazio';
            return false;
         }
         if(empty($fields['password_confirm'])){
            $this->form->getElement('password_confirm')->setAttribute('class','error');
            $this->form->_errors['password_confirm']='Não pode ser vazio';
            return false;
         }

      }


      //Mudança de senha
      if(!empty($fields['password_first'])){
         if(empty($fields['password_confirm'])){
            $this->form->getElement('password_confirm')->setAttribute('class','error');
            $this->form->_errors['password_confirm']='Não pode ser vazio';
            return false;
         }
         if( $fields['password_first'] <> $fields['password_confirm'] ){
            $this->form->getElement('password_confirm')->setAttribute('class','error');
            $this->form->_errors['password_confirm']='Senhas diferentes';
            return false;
         }
      }

      if(!empty($fields['password_confirm'])){
         if(empty($fields['password_first'])){
            $this->form->getElement('password_first')->setAttribute('class','error');
            $this->form->_errors['password_first']='Não pode ser vazio';
            return false;
         }

      }

      //Tamanho da senha
      if( (!empty($fields['password_confirm']) || !empty($fields['password_first']) ) && strlen($fields['password_first']) < 6 ) {
         $this->form->getElement('password_first')->setAttribute('class','error');
         $this->form->_errors['password_first']='Mínimo de 6 dígitos';
         return false;
      }

      return true;

   }






   function getGroups(){
      $groups = $this->getAllGroups();

      if(isset($_POST['id'])){
         $userGroups =  $this->facade->getDAO('admin_dao_userDAO')->getUserGroups($_POST['id'],$_POST['office_id']);
      }


      $apps = array();
      foreach ($groups as $key1=>$group ){
         if(!in_array($group['app'],$apps)){
            $apps[] = $group['app'];
         }
         if(!empty($userGroups)){
            foreach ($userGroups as $userGroup ){
               if( in_array($group['id'] , $userGroup )){
                  $groups[$key1]['user_in'] = true;
               }
            }
         }
      }

      foreach ($apps as $app ){
         foreach ($groups as $key=>$group){
            if($app == $group['app'] ) {
               $op[$app][] = $group ;
            }
         }
      }
      $groups = $op ;

      return $groups;
   }



   function getAllGroups (){
      return $this->facade->getAllGroups();
   }



}


?>