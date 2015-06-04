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


class admin_model_structure_appFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'appForm' ;

      $this->table = 'application';

      $this->dao = 'admin_dao_appDAO';

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
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 100 caracteres',100),
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




      );



      $this->idx = array(
      'id' => 'primary',
      );

      $this->auto_inc_col = 'id';


   }




}



?>