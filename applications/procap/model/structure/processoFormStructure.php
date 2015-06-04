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


class procap_model_structure_processoFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){


      $this->formName = 'processoForm' ;

      $this->table = 'procap_processo';

      $this->dao = 'procap_dao_processoDAO';

      $this->col = array(

      'id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>false,
      'qf_label'=>'id',
      'qf_type'  => 'hidden',
      ),



      'numero' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nъmero',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '30',
         'maxlength' => '30',
         ),
      ),



      'pasta' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Pasta',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 30 caracteres',30),
         ),
      'qf_attrs' =>
         array(
         'size' => '10',
         'maxlength' => '30',
         ),
      ),





      'processopai' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Processo Principal',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_processoDAO','functionName'=>'getProcessosPai'),
      ),





      'status_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Status',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_statusDAO','functionName'=>'getStatus'),
      ),





      'comarca_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Comarca',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_comarcaDAO','functionName'=>'getComarcas'),
      ),





      'fase_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Fase',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_faseDAO','functionName'=>'getFases'),
      ),





      'justica_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Justiзa',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_justicaDAO','functionName'=>'getJusticas'),
      ),





      'acao_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Aзгo',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_acaoDAO','functionName'=>'getAcoes'),
      ),





      'rito_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Rito',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_ritoDAO','functionName'=>'getRitos'),
      ),





      'objeto_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Objeto',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_objetoDAO','functionName'=>'getObjetos'),
      ),





      'tribunal_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Tribunal',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_tribunalDAO','functionName'=>'getTribunais'),
      ),





      'vara_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Vara',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_varaDAO','functionName'=>'getVaras'),
      ),





      'turma_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Turma',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_turmaDAO','functionName'=>'getTurmas'),
      ),





      'valorcausa' => array(
      'type'  => 'varchar',
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Valor da Causa',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 13 caracteres',13),
         ),
      ),





      'valorrepercussaoeconomica' => array(
      'type'  => 'varchar',
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Valor da Repercussгo Econфnica',
      'qf_type'  => 'text',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 13 caracteres',13),
         ),
      ),





      'cliente1_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Cliente',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_clienteDAO','functionName'=>'getClientes'),
      ),





      'cliente2_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Cliente',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_clienteDAO','functionName'=>'getClientes'),
      ),





      'contraparte1_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Parte Contrбria',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_partecontrariaDAO','functionName'=>'getPartesContrarias'),
      ),





      'contraparte2_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Parte Contrбria',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
         ),
      'qf_vals' => array('dao'=>'procap_dao_partecontrariaDAO','functionName'=>'getPartesContrarias'),
      ),





      'condicao' => array(
      'type' => 'varchar',
      'size' => 30,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Condiзгo',
      'qf_type'  => 'select',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 30 caracteres',30),
         'lettersonly' => 'somente letras',
         ),
      'qf_vals' => array(
         'autor'=>'Autor',
         'reu'=>'Rйu',
         'terceiro'=>'Terceiro'
         ),
      ),




      'distribuicao_data' => array(
      'type' => 'text',
      'form'=>true,
      'jscalendar' => true,
      'size' => 10,
      'qf_label' => 'Distribuнdo Em',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         ),
      'qf_attrs' =>
         array(
         'id' => 'distribuicao_data',
         'title' => 'Data em que o processo deu entrada neste escritуrio',
         ),
      ),




      'office_id' => array(
      'type' => 'integer',
      'size' => 10,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Escritуrio',
      'qf_type'  => 'hidden',
      'qf_rules' =>
         array(
         'required' => 'nгo pode ser vazio',
         'maxlength' => array('mбximo de 10 caracteres',10),
         'numeric' => 'somente nъmeros',
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