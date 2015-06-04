<?php

/**
 * Este arquivo й  parte do programa LiteFrame - lightWeight FrameWork
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


class login_model_structure_officeFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'officeForm' ;

      $this->table = 'office';

      $this->dao = 'login_dao_officeDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'Id',
      'qf_type'  => 'hidden',
      ),


      'fullname' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome do Escritуrio',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),


      'name' => array(
      'type' => 'varchar',
      'size' => 5,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome para Login',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),


      'active' => array(
      'type' => 'integet',
      'size' => 1,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Ativo',
      'qf_type'  => 'checkbox',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),

/*
      'logo' => array(
      'type' => 'integet',
      'size' => 1,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Logo',
      'qf_type'  => 'file',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),
*/

      'description' => array(
      'type' => 'varchar',
      'size' => null ,
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


      'creation_date' => array(
      'type' => 'date',
      'size' => 10 ,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Data',
      'qf_type'  => 'hidden',
      ),


      /*usuarios*/

      'user_loginname' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'crud'=>false,
      'validate'=>false,
      'qf_label'=>'Login',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),


      'user_fullname' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'crud'=>false,
      'validate'=>false,
      'qf_label'=>'Nome',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      ),


      'user_password' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'crud'=>false,
      'validate'=>false,
      'qf_label'=>'Senha',
      'qf_type'  => 'password',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'minlength' => array('mнnimo de 4 e mбximo de 10 caracteres.',4),
         'maxlength' => array('mнnimo de 4 e mбximo de 10 caracteres.',10),
         ),
      ),


      'user_confirmpassword' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'crud'=>false,
      'validate'=>true,
      'qf_label'=>'Confirmar Senha',
      'qf_type'  => 'password',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'minlength' => array('mнnimo de 4 e mбximo de 10 caracteres.',4),
         'maxlength' => array('mнnimo de 4 e mбximo de 10 caracteres.',10),
         ),
      ),


      'user_email' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'crud'=>false,
      'validate'=>true,
      'qf_label'=>'Email',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'email' => 'email invбlido.',
         ),
      ),

/*
      'user_image' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'crud'=>false,
      'validate'=>true,
      'crud'=>false,
      'qf_label'=>'Imagem',
      'qf_type'  => 'file',
      ),

*/
      'user_desc' => array(
      'type' => 'varchar',
      'size' => 400 ,
      'form'=>true,
      'crud'=>false,
      'validate'=>true,
      'qf_label'=>'Descriзгo',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'rows' => 4,
         'cols' => 40
         ),
      ),



      );



      $this->idx = array(
      'id' => 'primary',
      );

      $this->auto_inc_col = null ;


   }


}



?>