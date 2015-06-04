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


class procap_model_structure_custasFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'custasForm' ;

      $this->table = 'procap_custas';

      $this->dao = 'procap_dao_custasDAO';

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
      'qf_label'=>'Processo',
      'qf_type'  => 'hidden',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 10 caracteres',10),
         ),
      ),



      'descricao' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Descriчуo',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 100 caracteres',100),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '100',
         ),
      ),




      'data' => array(
      'type' => 'text',
      'form'=>true,
      'jscalendar' => true,
      'size' => 10,
      'qf_label' => 'Data',
      'qf_rules' =>
         array(
         'maxlength' => array('mсximo de 10 caracteres',10),
         ),
      ),





      'tipo' => array(
      'type' => 'varchar',
      'size' => 7,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Tipo',
      'qf_type'  => 'select',
      'qf_vals' => array('credito'=>'Crщdito','debito'=>'Dщbito'),
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 7 caracteres',7),
         'lettersonly' => 'somente letras',
         ),
      ),





      'valor' => array(
      'type'  => 'varchar',
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Valor',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nуo pode ser vazio',
         'maxlength' => array('mсximo de 13 caracteres',13),
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