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


class pesquisa_model_structure_pesquisaFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
      $this->setActivitiesArray();
   }


   function setUpStructure(){


      $this->formName = 'pesquisaForm' ;

      $this->table = 'pesquisa';

      $this->dao = 'pesquisa_dao_pesquisaDAO';

      $this->col = array(

      'codigo' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'codigo',
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
      ),




      'naturalidade' => array(
      'type' => 'integer',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Naturalidade',
      'qf_type'  => 'hierselect',
      'qf_separator'  => '<br>',
      'qf_rules' =>
         array(
         'nonzero' => 'não pode ser vazio',
         ),
      'qf_vals'=>array(
            array(
               'first'=>'Escolha País ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getPaises',
            ),
            array(
               'first'=>'Escolha Estado ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getEstados',
            ),
            array(
               'first'=>'Escolha Cidade ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getCidades',
            ),
         ),
      ),


      'avos_naturalidade' => array(
      'type' => 'integer',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Naturalidade',
      'qf_type'  => 'hierselect',
      'qf_separator'  => '<br>',
      'qf_rules' =>
         array(
         'nonzero' => 'não pode ser vazio',
         ),
      'qf_vals'=>array(
            array(
               'first'=>'Escolha País ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getPaisesAn',
            ),
            array(
               'first'=>'Escolha Estado ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getEstadosAn',
            ),
            array(
               'first'=>'Escolha Cidade ...',
               'dao'=>'pesquisa_dao_pesquisaDao',
               'function'=>'getCidadesAn',
            ),
         ),
      ),





      'apelido' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Apelido ou Nome Artístico',
      'qf_type'  => 'text',
      ),



      'avos_instrumentos' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Instrumentos',
      'qf_type'  => 'text',
      ),


      'nascimento' => array(
      'type' => 'text',
      'form'=>true,
      'jscalendar' => true,
      'size' => 10,
      'qf_label' => 'Nascimento',
      'qf_rules' =>
      array(
      'required' => 'não pode ser vazio',
      ),
      ),

/*      'nascimento2' => array(
      'type' => 'text',
      'jscalendar' => false,
      'size' => 10,
      'form'=>true,
      'qf_type' => 'date',
      'qf_label' => 'Data',
      'qf_rules' => array(
      'required' => 'DATA não pode ser vazia',
      ),
      'qf_opts'=>
      array(
      'format' => 'd/m/Y',
      'maxYear'=> 2010 ,
      'minYear'=> 1900 ,
      'addEmptyOption' => true ,
      'emptyOptionValue' => '' ,
      'emptyOptionText' => '',
      ),
      ),
*/

      'identidade' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Identidade',
      'qf_type'  => 'text',
      'qf_rules' =>
      array(
      'numeric' => 'Preencha somente números',
      ),
      ),

      'omb' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Sou filiado Ã  OMB',
      'qf_type'  => 'checkbox',
      ),


      'registro_entidade' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Outras Entidades:',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
      array(
      'rows' => 4,
      'cols' => 40
      ),
      ),


      'endereco1' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Primeiro Endereço:',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
      array(
      'rows' => 4,
      'cols' => 40
      ),
      'qf_rules' => array(
      'required' => 'Por favor preencha pelo menos o primeiro endereço',
      'minlength' => array('Endere&ccedil;o muito pequeno', 10),
      ),
      ),



      'endereco2' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Segundo endere&ccedil;o',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
      array(
      'rows' => 4,
      'cols' => 40
      ),
      ),



      'ddd_residencial' => array(
      'type' => 'varchar',
      'size' => 2,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>2),
      'qf_rules' => array(
      'numeric' => 'Somente números',
      ),
      ),


      'telefone_residencial' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>8),
      ),



      'ddd_comercial' => array(
      'type' => 'varchar',
      'size' => 2,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>2),
      'qf_rules' => array(
      'numeric' => 'Somente números',
      ),
      ),


      'telefone_comercial' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>8),
      ),




      'ddd_celular' => array(
      'type' => 'varchar',
      'size' => 2,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>2),
      'qf_rules' => array(
      'numeric' => 'Somente números',
      ),
      ),


      'telefone_celular' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>8),
      ),



      'ddd_recado' => array(
      'type' => 'varchar',
      'size' => 2,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>2),
      'qf_rules' => array(
      'numeric' => 'Somente números',
      ),
      ),


      'telefone_recado' => array(
      'type' => 'varchar',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_attrs'=>array('size'=>8),
      ),



      'email1' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_rules' =>
      array(
      'email' => 'email inválido',
      ),
      ),

      'email2' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'text',
      'qf_rules' =>
      array(
      'email' => 'email inválido',
      ),
      ),


         'paginas_internet' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
      array(
      'rows' => 4,
      'cols' => 40
      ),
      ),

      'ser_violeiro' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
      array(
      'rows' => 4,
      'cols' => 40
      ),
      'qf_rules' => array(
      'required' => 'Por favor preencha sua opinião',
      ),
      ),


      'outras_atividades' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Outras: ',
      'qf_type'  => 'text',
      ),


      );



      $this->idx = array(
      'codigo' => 'primary',
      );

      $this->auto_inc_col = 'codigo';


   }


   function setActivitiesArray() {
      $arr = array('ouvir','aprender','tocar','compor','ensinar','produzir','elaborar','pesquisar','divulgar','construir','vender','colecionar','gerir','louvar');
      $label = array(
      'produzir'=>'Produzir/ Empresariar/<br>Agenciar artistas e eventos',
      'elaborar'=>'Elaborar produtos afisn <br>(CDs, livros, etc)',
      'gerir'   =>'Gerir grupos ou entidades afins',
      );

      $optionsMaker = new pesquisa_classes_optionsMaker();

      $col = $optionsMaker->makeOptions($arr,$label);

      $this->col = array_merge($col,$this->col);

   }
}



?>