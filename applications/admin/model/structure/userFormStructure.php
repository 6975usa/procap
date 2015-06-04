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


class admin_model_structure_userFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'userForm' ;

      $this->table = 'user';

      $this->dao = 'admin_dao_userDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'office_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Escritуrio',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      'qf_vals' => array('dao'=>'admin_dao_officeDAO','functionName'=>'getOffices'),
      ),




      'loginname' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Login',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
      ),




      'password_first' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'crud'=>false,
      'qf_label'=>'Senha',
      'qf_type'  => 'password',
      ),




      'password_confirm' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'crud'=>false,
      'qf_label'=>'Confirmar Senha',
      'qf_type'  => 'password',
      ),



      'fullname' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 100 caracteres',100),
         ),
      ),





      'active' => array(
      'type' => 'integer',
      'size' => 1,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Ativo',
      'qf_type'  => 'checkbox',
      ),




      'description' => array(
      'type' => 'clob',
      'size' => null,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Descriзгo',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'rows' => 4,
         'cols' => 40
         ),
      ),




      'email' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Email',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'email' => 'email invбlido',
         'maxlength' => array('mбximo de 100 caracteres',100),
         ),
      ),


      'image' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Imagem',
      'qf_type'  => 'file',
      ),




      );



      $this->idx = array(
      'id' => 'primary',
      'office_id' => 'primary',
      );

      $this->auto_inc_col = 'id';


   }




}



?>