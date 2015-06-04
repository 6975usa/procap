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


define('DEFAULT_THEME','tema03');

class procap_config_ApplicationConfig{



   /**
    * array with the allowed url parameters
    *
    * @var actions array
    */
   public $actions=null;


   /**
    * This function determines weather a url parameter can access a class.
    * Depending on url parameter sent by either action or request_uri a class is called
    *
    * @return array
    *
    */
   public function getActions(){
      if(is_null($this->actions)){
         $this->setActions();
      }
      return $this->actions;
   }


   /**
    * This function determines weather a url parameter can access a class.
    * Depending on url parameter sent by either action or request_uri a class is called
    *
    * @return array
    *
    */
   public function setActions(){
      $this->actions = array(
      'default' => 'procap_controller_defaultController',
      'cliente' => 'procap_controller_clienteController',
      'estadocivil' => 'procap_controller_estadoCivilController',
      'tribunal' => 'procap_controller_tribunalController',
      'tratamento' => 'procap_controller_tratamentoController',
      'acao' => 'procap_controller_acaoController',
      'justica' => 'procap_controller_justicaController',
      'advogado' => 'procap_controller_advogadoController',
      'partecontraria' => 'procap_controller_partecontrariaController',
      'status' => 'procap_controller_statusController',
      'comarca' => 'procap_controller_comarcaController',
      'fase' => 'procap_controller_faseController',
      'rito' => 'procap_controller_ritoController',
      'objeto' => 'procap_controller_objetoController',
      'vara' => 'procap_controller_varaController',
      'turma' => 'procap_controller_turmaController',
      'processo' => 'procap_controller_processoController',
      'custas' => 'procap_controller_custasController',
      'listiconsorte' => 'procap_controller_listiconsorteController',
      'processoadvogado' => 'procap_controller_processoadvogadoController',
      'andamento' => 'procap_controller_andamentoController',
      'tipoandamento' => 'procap_controller_tipoandamentoController',
      'peca' => 'procap_controller_pecaController',
      'relatorios' => 'procap_controller_relatoriosController',
      'relatorio/ultimosAndamentos' => 'procap_controller_ultimosAndamentosController',
      );
   }

}

?>