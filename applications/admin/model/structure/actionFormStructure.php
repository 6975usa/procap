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


class admin_model_structure_actionFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'actionForm' ;

      $this->table = 'action';

      $this->dao = 'admin_dao_actionDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'application_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Aplicaзгo',
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
         'maxlength' => array('mбximo de 100 caracteres',100),
         ),
      ),




      'menuname' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome no menu',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
      ),




      'inmenu' => array(
      'type' => 'integer',
      'size' => 1,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Aparece no Menu',
      'qf_type'  => 'radio',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      'qf_vals' =>
         array(
         '0' => 'Nгo',
         '1' => 'Sim',
         ),
      ),




      'accesslevel' => array(
      'type' => 'varchar',
      'size' => 4,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Tipo de Acesso',
      'qf_type'  => 'radio',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         ),
      'qf_vals' =>
         array(
         'auth' => 'Autenticado',
         'free' => 'Livre',
         ),
      ),




      'menulevel1' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Menu de nнvel 1',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
      ),




      'menulevel2' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Menu de nнvel 2',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
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



      );



      $this->idx = array(
      'id' => 'primary',
      );

      $this->auto_inc_col = 'id';


   }




}



?>