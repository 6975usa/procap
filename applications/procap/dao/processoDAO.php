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
class procap_dao_processoDAO extends classes_dao_AbstractDAO {

    public $table = 'procap_processo';

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
            'processoList' => "
            SELECT distinct
               p.id
               ,p.numero
               ,p.pasta
               ,p.processopai
               ,status.descricao as status
               ,p.comarca_id
               ,fase.descricao as fase
               ,justica.descricao as justica
               ,acao.descricao as acao
               ,rito.descricao as rito
               ,objeto.descricao as objeto
               ,tribunal.nomeabreviado  as tribunal
               ,vara.descricao as vara
               ,p.turma_id
               ,p.condicao
               ,p.distribuicao_data
               ,p.valorcausa
               ,p.valorrepercussaoeconomica
               ,concat (concat( ifnull(pes1.nome,'') , ifnull(pes1.nome_fantasia,'') ) ,'<br>' ,concat( ifnull(pes2.nome,'') , ifnull(pes2.nome_fantasia,'') ) )  as cliente
               ,concat (concat( ifnull(pes3.nome,'') , ifnull(pes3.nome_fantasia,'') ) ,'<br>' ,concat( ifnull(pes4.nome,'') , ifnull(pes4.nome_fantasia,'') ) )  as partecontraria
            from procap_processo as p
               inner join procap_status  as status on p.status_id = status.id
               inner join procap_fase as fase on fase.id = p.fase_id
               inner join procap_pessoa as pes1 on pes1.id = p.cliente1_id
               inner join procap_pessoa as pes3 on pes3.id = p.contraparte1_id
               left  join procap_pessoa as pes4 on pes4.id = p.contraparte2_id
               left join procap_pessoa as  pes2 on pes2.id = p.cliente2_id
               left join procap_justica as justica on justica.id = p.justica_id
               left join procap_acao as acao on acao.id = p.acao_id
               left join procap_rito as rito on rito.id = p.rito_id
               left join procap_objeto as objeto on objeto.id = p.objeto_id
               left join procap_tribunal as tribunal on tribunal.id = p.tribunal_id
               left join procap_vara as vara on vara.id = p.vara_id
            "
        );
    }

    function getNextIdVal($pk) {
        return $this->conn->genId($this->table . $pk);
    }

    function getProcessosPai() {
        $sql = "
               select distinct id as codigo  , numero as descricao
               from procap_processo
               where processopai = 0 or processopai is null
               order by descricao
               ";
        $res = $this->execute($sql);
        return $res->getAssoc();
    }

    function getProcessos() {
        $sql = "
               select distinct id as codigo  , numero as descricao
               from procap_processo
               order by descricao
               ";
        $res = $this->execute($sql);
        return $res->getAssoc();
    }

    function beforeInsert($formStructure, $formValues, $messages) {
        return !$this->nrProcessoJaExiste($formValues['numero']);
    }

    function nrProcessoJaExiste($processoNr) {

        $sql = " select * from procap_processo where numero = ? ";

        $res = $this->execute($sql, array($processoNr));

        if ($res->numRows() > 0) {
            $msg = classes_Singleton::getInstance('classes_controller_Messages');
            $msg->addErrorMessage('N�mero de Processo j� existe.');
            return true;
        } else {
            return false;
        }
    }

    function getPastaDeProcesso($procId) {
        $sql = "
               select  pasta
               from procap_processo as processo
               where processo.id = ?
               ";
        $res = $this->execute($sql, array($procId));
        return $res->fields('pasta');
    }

}

?>