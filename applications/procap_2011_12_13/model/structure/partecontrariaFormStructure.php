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


class procap_model_structure_partecontrariaFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'partecontrariaForm' ;

      $this->table = 'procap_pessoa';

      $this->dao = 'procap_dao_partecontrariaDAO';

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
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 100 caracteres',100),         
	    'required' => ' não pode ser vazio',
         ),
      'qf_attrs' =>
         array(
         'size' => '50',
         'maxlength' => '100',
         ),
      ),



      'sexo' => array(
      'type' => 'varchar',
      'size' => 1,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>' Sexo ',
      'qf_type'  => 'radio',
      'qf_vals' =>
         array(
         'M' => 'Masculino',
         'F' => 'Feminino',
         ),
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 1 caracteres',1),
         ),
      ),



      'nacionalidade' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nacionalidade',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '30',
         ),
      ),



      'identidade' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Identidade',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 30 caracteres',30),
         'numeric' => 'só permite números',
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '30',
         ),
      ),



      'profissao' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Profissão',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '30',
         ),
      ),



      'oab' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'OAB',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      'qf_attrs' =>
         array(
         'size' => '10',
         'maxlength' => '10',
         ),
      ),




      'nome_fantasia' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome Fantasia',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 200 caracteres',200),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '200',
         ),
      ),



      'inscricao_estadual' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Inscrição Estadual',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '30',
         ),
      ),



      'inscricao_municipal' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Inscrição Municipal',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '30',
         ),
      ),




      'endereco' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Endereço',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mánimo de 100 caracteres',100),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '100',
         ),
      ),




      'complemento' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Complemento',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 100 caracteres',100),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '100',
         ),
      ),




      'bairro' => array(
      'type' => 'varchar',
      'size' => 50,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Bairro',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 50 caracteres',50),
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '50',
         ),
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




      'cep' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'CEP',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      'qf_attrs' =>
         array(
         'size' => '10',
         'maxlength' => '10',
         ),
      ),




      'email' => array(
      'type' => 'varchar',
      'size' => 100,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Email',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 100 caracteres',100),
         'email' => ' email inválido',
         ),
      'qf_attrs' =>
         array(
         'size' => '20',
         'maxlength' => '100',
         ),
      ),




      'telefone_1' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Telefone 1',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 20 caracteres',20),
         ),
      'qf_attrs' =>
         array(
         'size' => '15',
         'maxlength' => 20,
         ),
      ),




      'telefone_2' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Telefone 2',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 20 caracteres',20),
         ),
      'qf_attrs' =>
         array(
         'size' => '15',
         'maxlength' => '20',
         ),
      ),




      'telefone_3' => array(
      'type' => 'varchar',
      'size' => 20,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Telefone 3',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 20 caracteres',20),
         ),
      'qf_attrs' =>
         array(
         'size' => '15',
         'maxlength' => '20',
         ),
      ),




      'obs' => array(
      'type' => 'clob',
      'size' => null,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Observação',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'cols' => '40',
         'rows' => '4',
         ),
      ),



/*

      'tratamento_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Tratamento',
      'qf_type'  => 'select',
      'qf_vals' => array('dao'=>'procap_dao_partecontrariaDAO','functionName'=>'getTratamentos'),
      ),
*/



      'estadocivil_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Estado Civil',
      'qf_type'  => 'select',
      'qf_vals' => array('dao'=>'procap_dao_partecontrariaDAO','functionName'=>'getEstadosCivis'),
      ),




      'nascimento' => array(
      'type' => 'text',
      'form'=>true,
      'jscalendar' => true,
      'size' => 10,
      'qf_label' => 'Nascimento',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      ),



      'cnpj' => array(
      'type' => 'varchar',
      'size' => 18,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'CNPJ',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 18 caracteres',18),
         ),
      'qf_attrs' =>
         array(
         'size' => '18',
         'maxlength' => '18',
         ),
      ),



      'cpf' => array(
      'type' => 'varchar',
      'size' => 14,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'CPF',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('máximo de 14 caracteres',14),
         ),
      'qf_attrs' =>
         array(
         'size' => '14',
         'maxlength' => '14',
         ),
      ),

      'office_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Escritório',
      'qf_type'  => 'hidden',
      'qf_rules' =>
         array(
         'required' => 'não pode ser vazio',
         'numeric' => 'só número',
         'maxlength' => array('máximo de 10 caracteres',10),
         ),
      'qf_attrs' =>
         array(
         'size' => '10',
         'maxlength' => '10',
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