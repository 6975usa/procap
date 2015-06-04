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


class procap_model_structure_statusFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'statusForm' ;

      $this->table = 'procap_status';

      $this->dao = 'procap_dao_statusDAO';

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
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Status',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         'maxlength' => array('máximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '30',
         'maxlength' => '30',
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