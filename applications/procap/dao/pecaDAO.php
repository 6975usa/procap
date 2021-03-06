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
class procap_dao_pecaDAO extends classes_dao_AbstractDAO {

    public $table = 'procap_peca';

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
        if (isset($_GET['pc'])) {
            return array(
                'pecaList' => "
            SELECT
               p.id
               ,substring(p.descricao,1,20) as descricao
               ,a.descricao as andamento
               ,p.arquivo
               ,p.processo_id as processo
               ,date_format(a.inicio_data,'%d/%m/%Y') as inicio
               ,date_format(a.termino_data,'%d/%m/%Y') as termino
            from procap_peca as p
               inner join procap_andamento as a on a.id = p.andamento_id
            where p.processo_id = '" . $_GET['pc'] . "'
            order by a.termino_data desc
            "
            );
        } else {
            return array(
                'pecaList' => "
            SELECT
               p.id
               ,substring(p.descricao,1,20) as descricao
               ,a.descricao as andamento
               ,p.arquivo
               ,p.processo_id as processo
               ,date_format(a.inicio_data,'%d/%m/%Y') as inicio
               ,date_format(a.termino_data,'%d/%m/%Y') as termino
            from procap_peca as p
               inner join procap_andamento as a on a.id = p.andamento_id
            order by a.termino_data desc 
            "
            );
        }
    }

    function getNextIdVal($pk) {
        return $this->conn->genId($this->table . $pk);
    }

    function afterInsert($formStructure, $formValues, $messages) {

        if (!empty($_FILES['arquivo']) && !empty($formValues['processo_id'])) {

            $sql = " update procap_peca set arquivo = ? where id = ?  ";

            $arq = STATIC_URL . '/procap/arquivos/' . $formValues['processo_id'] . DS . $_FILES['arquivo']['name'];

            $this->execute($sql, array($arq, $formValues['id']));
        }
    }

    public function savePeca($processo_id, $descricao, $andamento_id, $arq) {
        $sql = " INSERT INTO procap_peca (processo_id, descricao, andamento_id, arquivo) VALUES(?,?,?,?) ";
        $dao->execute($sql, array($processo_id, $descricao, $andamento_id, $arq));
    }

    function afterUpdate($formStructure, $formValues, $messages) {
        $this->afterInsert($formStructure, $formValues, $messages);
    }

}

?>