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


class procap_model_structure_tribunalFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'tribunalForm' ;

      $this->table = 'procap_tribunal';

      $this->dao = 'procap_dao_tribunalDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'nome' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         ),
      'qf_attrs' =>
         array(
         'size' => '40',
         'maxlength' => '200',
         ),
      ),



      'nomeabreviado' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Abreviatura',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         ),
      ),



      'endereco' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Endereço',
      'qf_type'  => 'text',
      ),



      'complemento' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Complemento',
      'qf_type'  => 'text',
      ),



      'bairro' => array(
      'type' => 'varchar',
      'size' => 50,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Bairro',
      'qf_type'  => 'text',
      ),




      'cidade_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Cidade',
      'qf_type'  => 'hierselect',
      'qf_separator'  => '<br>',
      'qf_rules' =>
         array(
         'nonzero' => 'não permite zero',
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      'qf_vals'=>array(
            array(
               'first'=>'Escolha País ...',
               'dao'=>'lib_dao_libDAO',
               'function'=>'getPaises',
            ),
            array(
               'first'=>'Escolha Estado ...',
               'dao'=>'lib_dao_libDAO',
               'function'=>'getEstados',
            ),
            array(
               'first'=>'Escolha Cidade ...',
               'dao'=>'lib_dao_libDAO',
               'function'=>'getCidades',
            ),
         ),
      ),


/*
      'estado' => array(
      'type' => 'varchar',
      'size' => 2,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'UF',
      'qf_type'  => 'select',
      'qf_vals' => array('dao'=>'lib_dao_libDAO','functionName'=>'getEstadosDoBrasil'),
      ),
*/


      'cep' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'CEP',
      'qf_type'  => 'text',
      ),



      'telefone1' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Telefone 1',
      'qf_type'  => 'text',
      ),



      'telefone2' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Telefone 2',
      'qf_type'  => 'text',
      ),



      'obs' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Observação',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
            'rows' => 4,
            'cols' => 60
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