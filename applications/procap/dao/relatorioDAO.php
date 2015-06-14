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
class procap_dao_relatorioDAO extends classes_dao_AbstractDAO {

    public $table = 'procap_andamento';

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
        
    }

    public function getUltimosAndamentos($clienteId) {

        $user = classes_Singleton::getInstance('classes_controller_user');

        switch ($user->inGroup('Super Administrador')) {
            case true:
                $sql = "
                  SELECT distinct
                     a.id as andamento_id
                     , proc.id as processo_id
                     ,t.descricao  as tipo
                     ,proc.numero as processo
                     ,a.processo_id as processo_nr
                     ,f.descricao as fase
                     ,concat(date_format(a.inicio_data,'%d/%m/%Y'),' ', case weekday(a.inicio_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as inicio_data
                     ,concat(date_format(a.termino_data,'%d/%m/%Y'),' ', case weekday(a.termino_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as termino_data
                     ,concat(date_format(a.conclusao_data,'%d/%m/%Y'),' ', case weekday(a.conclusao_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as conclusao_data
                     ,a.descricao
                     ,case a.agenda when 1 then 'Sim' when 0 then 'N�o' End as agenda
                     , proc.valorcausa as valorcausa
                     , vara.descricao as vara
                     , comarca.descricao as comarca
                     , objeto.descricao as objeto
                  from procap_andamento as a
                     inner join procap_tipoandamento as t on  t.id = a.tipo_id
                     inner join procap_fase as f on f.id = a.fase_id
                     inner join procap_processo as proc on proc.id = a.processo_id
                     left join procap_pessoa as p on p.id = proc.cliente1_id or p.id = proc.cliente2_id
                     left join procap_vara as vara on vara.id = proc.vara_id
                     left join procap_comarca as comarca on comarca.id = proc.comarca_id
                     left join procap_objeto as objeto on objeto.id = proc.objeto_id
                  where proc.cliente1_id = ? or proc.cliente2_id = ?
                  order by termino_data desc
                  limit  20
                  ";
                $res = $this->execute($sql, array($clienteId, $clienteId));
                return $res->getRows();
                break;

            default:
                $office_id = $user->getProperty('office_id');
                $sql = "
                  SELECT distinct
                     a.id as andamento_id
                     , proc.id as processo_id
                     ,t.descricao  as tipo
                     ,proc.numero as processo
                     ,a.processo_id as processo_nr
                     ,f.descricao as fase
                     ,concat(date_format(a.inicio_data,'%d/%m/%Y'),' ', case weekday(a.inicio_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as inicio_data
                     ,concat(date_format(a.termino_data,'%d/%m/%Y'),' ', case weekday(a.termino_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as termino_data
                     ,concat(date_format(a.conclusao_data,'%d/%m/%Y'),' ', case weekday(a.conclusao_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as conclusao_data
                     ,a.descricao
                     ,case a.agenda when 1 then 'Sim' when 0 then 'N�o' End as agenda
                     , proc.valorcausa as valorcausa
                     , vara.descricao as vara
                     , comarca.descricao as comarca
                     , objeto.descricao as objeto
                     , justica.descricao as justica
                  from procap_andamento as a
                     inner join procap_tipoandamento as t on  t.id = a.tipo_id
                     inner join procap_fase as f on f.id = a.fase_id
                     inner join procap_processo as proc on proc.id = a.processo_id
                     left join procap_pessoa as p on p.id = proc.cliente1_id or p.id = proc.cliente2_id
                     left join procap_vara as vara on vara.id = proc.vara_id
                     left join procap_comarca as comarca on comarca.id = proc.comarca_id
                     left join procap_objeto as objeto on objeto.id = proc.objeto_id
                     left join procap_justica as justica on justica.id = proc.justica_id
                  where (proc.cliente1_id = ? or proc.cliente2_id = ?) and proc.office_id = ?
                  order by termino_data desc
                  limit 20
                  ";
                $res = $this->execute($sql, array($clienteId, $clienteId, $office_id));
                return $res->getRows();
                break;
        }
    }

    function getNextIdVal($pk) {
        
    }

    function getPecasDeAndamento($andamentoId) {
        $sql = " select descricao from procap_peca where andamento_id = ?";
        $res = $this->execute($sql, array($andamentoId));
        return $res->getRows();
    }

    public function getProcessosAtivos($clientId) {

        $sql = "SELECT p.`numero`, 
                    IF(pes1.nome != null, pes1.nome,pes1.nome_fantasia) as cliente1 ,
                    (select if(pes.nome!=null,pes.nome,pes.nome_fantasia)  from procap_pessoa pes where pes.id = p.cliente2_id) as cliente2, 
                    pes2.nome as contraparte1, 
                    (select if(pes.nome != null,pes.nome,pes.nome_fantasia) from procap_pessoa pes where pes.id = p.contraparte2_id) as contraparte2, 
                    (select vara.descricao from procap_vara vara where vara.id = p.vara_id) as vara, 
                    (select t.nomeabreviado from procap_tribunal t where t.id = p.`tribunal_id` ) as tribunal , 
                    (select c.descricao from procap_comarca c where c.id = p.`comarca_id`) as comarca , 
                    p.`valorcausa`
                    from procap_processo p 
                            inner join procap_pessoa pes1 on p.`cliente1_id` = pes1.`id` 
                        inner join procap_pessoa pes2 on p.contraparte1_id = pes2.id
                    where p.`cliente1_id` = ? and p.status_id = 2 ";
        $res = $this->execute($sql, array($clientId));
        return $res->getRows();
    }


    public function getProcessosBaixados($clientId) {

        $sql = "SELECT p.`numero`, 
                    IF(pes1.nome != null, pes1.nome,pes1.nome_fantasia) as cliente1 ,
                    (select if(pes.nome!=null,pes.nome,pes.nome_fantasia)  from procap_pessoa pes where pes.id = p.cliente2_id) as cliente2, 
                    pes2.nome as contraparte1, 
                    (select if(pes.nome != null,pes.nome,pes.nome_fantasia) from procap_pessoa pes where pes.id = p.contraparte2_id) as contraparte2, 
                    (select vara.descricao from procap_vara vara where vara.id = p.vara_id) as vara, 
                    (select t.nome from procap_tribunal t where t.id = p.`tribunal_id` ) as tribunal , 
                    (select c.descricao from procap_comarca c where c.id = p.`comarca_id`) as comarca , 
                    p.`valorcausa`
                    from procap_processo p 
                            inner join procap_pessoa pes1 on p.`cliente1_id` = pes1.`id` 
                        inner join procap_pessoa pes2 on p.contraparte1_id = pes2.id
                    where p.`cliente1_id` = ? and p.status_id = 3 ";
        $res = $this->execute($sql, array($clientId));
        return $res->getRows();
    }

}

?>