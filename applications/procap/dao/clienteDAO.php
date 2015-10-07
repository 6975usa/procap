<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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
class procap_dao_clienteDAO extends classes_dao_AbstractDAO {

    public $table = 'procap_pessoa';

    function __construct() {
        parent::__construct();
    }

    public function setConnString() {
        return procap_config_DatabaseConfiguration::getConn('procap');
    }

    public function setMdb2Conn() {
        return procap_config_DatabaseConfiguration::getConn('procap');
    }

    public function getConnInfo() {
        return procap_config_DatabaseConfiguration::getConnInfo('procap');
    }

    public function getListNames() {
        return array(
            'clienteList' => "
            SELECT
               id
               ,tratamento_id
               ,concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as nome
               ,estadocivil_id
               ,nascimento
               ,nacionalidade
               ,identidade
               ,profissao
               ,cpf
               ,concat ( ifnull(cnpj,'') , ifnull(cpf,'') ) as cnpj
               ,nome_fantasia
            from procap_pessoa
            where tipo = 'pessoa_fisica' or tipo = 'pessoa_juridica'
            order by nome
            "
        );
    }

    function getNextIdVal($pk) {
        return $this->conn->genId($this->table . $pk);
    }

    function getTratamentos() {
        $sql = "select distinct id as codigo  , descricao from procap_tratamento order by descricao  ";
        $res = $this->execute($sql);
        return $res->getAssoc();
    }

    function getTodasPessoas() {
        $sql = "select distinct id as codigo  , concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as descricao from procap_pessoa order by descricao  ";
        $res = $this->execute($sql);
        return $res->getAssoc();
    }

    function getClientes($officeId = null) {
        if (is_null($officeId)) {
            $user = classes_Singleton::getInstance('classes_controller_user');
            $officeId = $user->getProperty('office_id');
        }
        $sql = "select distinct id as codigo  , concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as descricao
      from procap_pessoa " .
                "where (tipo = 'pessoa_fisica'  or tipo = 'pessoa_juridica') and office_id = ? " .
                "order by descricao  ";

        $res = $this->execute($sql, array($officeId));


        return $res->getAssoc();
    }

    function getEstadosCivis() {
        $sql = "select distinct id as codigo  , descricao from procap_estadocivil order by descricao  ";
        $res = $this->execute($sql);
        return $res->getAssoc();
    }

    function getTipoPessoaDoCliente($clienteId) {
        $sql = "select tipo from procap_pessoa where id = ?  ";
        $res = $this->execute($sql, array($clienteId));
        return $res->fields('tipo');
    }

    function afterInsert($formStructure, $formValues, $messages) {

        if (isset($_POST['cliente'])) {

            switch ($_POST['cliente']) {
                case 'pessoa_fisica':
                    $this->execute(" update procap_pessoa set tipo = 'pessoa_fisica' where procap_pessoa.id = ?  ", array($formValues['id']));
                    break;

                case 'pessoa_juridica':
                    $this->execute(" update procap_pessoa set tipo = 'pessoa_juridica' where procap_pessoa.id = ? ", array($formValues['id']));
                    break;

                default:
                    throw new Exception('Tipo de cliente n�o definido');
                    break;
            }
        } else {
            throw new Exception('Cliente n�o definido');
        }

        return true;
    }

    function getClienteNome($clienteId) {
        $sql = " select concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as nome from procap_pessoa where id = ? ";
        $res = $this->execute($sql, array($clienteId));
        return $res->fields('nome');
    }

}

?>