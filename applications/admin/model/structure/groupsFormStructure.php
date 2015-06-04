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


class admin_model_structure_groupsFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'groupsForm' ;

      $this->table = 'groups';

      $this->dao = 'admin_dao_groupsDAO';

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


      'application_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Sistema',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      'qf_vals' => array('dao'=>'admin_dao_appDAO','functionName'=>'getApplications'),
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
         'required' => 'nгo pode ser vazio',
         ),
      ),


      'description' => array(
      'type' => 'varchar',
      'size' => 200,
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