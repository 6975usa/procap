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


class procap_model_structure_listiconsorteFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'listiconsorteForm' ;

      $this->table = 'procap_processolisticonsorte';

      $this->dao = 'procap_dao_listiconsorteDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      ),


      'pessoa_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Pessoa',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      'qf_vals' => array('dao'=>'procap_dao_clienteDAO','functionName'=>'getTodasPessoas'),
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
         'required' => 'não pode ser vazio',
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      ),






      );



      $this->idx = array(
      'id' => 'primary',
      );



      $this->auto_inc_col = '';


   }




}



?>