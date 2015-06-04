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


class procap_model_structure_pecaFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'pecaForm' ;

      $this->table = 'procap_peca';

      $this->dao = 'procap_dao_pecaDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'processo_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nr do Processo',
      'qf_type'  => 'hidden',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 10 caracteres',10),
         ),
      ),


      'descricao' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Descriчуo',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'rows' => '4',
         'cols' => '40',
         ),
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 200 caracteres',200),
         ),
      ),



      'andamento_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Andamento',
      'qf_type'  => 'select',
      'qf_vals' => array('dao'=>'procap_dao_andamentoDAO','functionName'=>'getandamentosDePeca'),
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 10 caracteres',10),
         ),
      ),



      'arquivo' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'crud'=>false,
      'qf_label'=>'Arquivo',
      'qf_type'  => 'file',
      'qf_attrs' =>
         array(
         'disabled' => 'disabled',
         ),
      'qf_rules' =>
         array(
         //'required' => 'nуo pode ser vazio',
         //'maxfilesize' => array('mсximo de 5 MB',5),
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