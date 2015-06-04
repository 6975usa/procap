<?php

/**
 * Este arquivo УЉ parte do programa LiteFrame - lightWeight FrameWork
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


class admin_model_structure_officeFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'officeForm' ;

      $this->table = 'office';

      $this->dao = 'admin_dao_officeDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),




      'name' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Login',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 20 caracteres',20),
         ),
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
         'required' => 'nуo pode ser vazio',
         ),
      ),


      'description' => array(
      'type' => 'clob',
      'size' => null,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Descriчуo',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'rows' => 4,
         'cols' => 40
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




      );



      $this->idx = array(
      'id' => 'primary',
      );

      $this->auto_inc_col = 'id';


   }




}



?>