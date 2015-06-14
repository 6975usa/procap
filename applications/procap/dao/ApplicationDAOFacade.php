<?php

/**
 * Este arquivo �  parte do programa LiteFrame - lightWeight FrameWork
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
class procap_dao_ApplicationDAOFacade extends classes_dao_AbstractDAOFacade {

    function __construct(classes_controller_SystemController $controller) {
        parent::__construct($controller);
    }

    /*

      function getCidades($estadoCodigo){
      return $this->getDao('procap_dao_procapDAO')->getCidades($estadoCodigo);
      }
     */

    function getPaises() {
        return $this->getDao('lib_dao_libDAO')->getPaises();
    }

    function getEstados($country_id) {
        return $this->getDao('lib_dao_libDAO')->getEstados($country_id);
    }

    function getCidades($estadoCodigo) {
        return $this->getDao('lib_dao_libDAO')->getCidades($estadoCodigo);
    }

    function getClientes($officeId) {
        return $this->getDao('procap_dao_clienteDAO')->getClientes($officeId);
    }

    function getUltimosAndamentos($clienteId) {
        return $this->getDao('procap_dao_relatorioDAO')->getUltimosAndamentos($clienteId);
    }

    function getPecasDeAndamento($andamentoId) {
        return $this->getDao('procap_dao_relatorioDAO')->getPecasDeAndamento($andamentoId);
    }

    function setPecas($andamento_id, $processo_id) {
        return $this->getDao('procap_dao_andamentoDAO')->setPecas($andamento_id, $processo_id);
    }

    function marcarConclusaoAndamento($andamentoId) {
        return $this->getDao('procap_dao_andamentoDAO')->marcarConclusaoAndamento($andamentoId);
    }

    function getPastaDeProcesso($procId) {
        return $this->getDao('procap_dao_processoDAO')->getPastaDeProcesso($procId);
    }

    function getClienteNome($clienteId) {
        return $this->getDao('procap_dao_clienteDAO')->getClienteNome($clienteId);
    }

    function getProcessosAtivos($clientId) {
        return $this->getDao('procap_dao_relatorioDAO')->getProcessosAtivos($clientId);
    }
    function getProcessosBaixados($clientId) {
        return $this->getDao('procap_dao_relatorioDAO')->getProcessosBaixados($clientId);
    }

}

?>