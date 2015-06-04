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


class procap_model_structure_turmaFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'turmaForm' ;

      $this->table = 'procap_turma';

      $this->dao = 'procap_dao_turmaDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'descricao' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Turma',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         'maxlength' => array('máximo de 100 caracteres',100),
         ),
      'qf_attrs' =>
         array(
         'size' => '30',
         'maxlength' => '100',
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