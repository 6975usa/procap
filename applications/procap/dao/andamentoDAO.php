<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
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

class procap_dao_andamentoDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_andamento';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return procap_config_DatabaseConfiguration::getConn('procap');
   }

   public function setMdb2Conn(){
      return procap_config_DatabaseConfiguration::getConn('procap');
   }

   public function getConnInfo(){
      return procap_config_DatabaseConfiguration::getConnInfo('procap');
   }


   public function getListNames(){
      return  array(
      'andamentoList' => "
            SELECT
               a.id
               ,t.descricao  as tipo
               ,a.processo_id as processo
               ,a.processo_id as processo_nr
               ,f.descricao as fase
               ,concat(date_format(a.inicio_data,'%d/%m/%Y'),' ', case weekday(a.inicio_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as inicio_data
               ,concat(date_format(a.termino_data,'%d/%m/%Y'),' ', case weekday(a.termino_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as termino_data
               ,concat(date_format(a.conclusao_data,'%d/%m/%Y'),'-', case weekday(a.conclusao_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as conclusao_data
               ,p.nome as advogado
               ,a.descricao
               ,case a.agenda when 1 then 'Sim' when 0 then 'Não' End as agenda
               ,a.id as andamento_id
            from procap_andamento as a
               inner join procap_tipoandamento as t on  t.id = a.tipo_id
               inner join procap_fase as f on f.id = a.fase_id
               left join procap_pessoa as p on p.id = a.advogado_id
            where a.processo_id = '".$_GET['pc']."'
            order by a.termino_data desc
            "
            );
   }


   function getNextIdVal($pk){
      return $this->conn->genId($this->table.$pk) ;
   }




   function getandamentos(){
      $sql = "select distinct id as codigo  , descricao from procap_andamento order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;
   }


   function getandamentosDePeca(){
      $sql = "
         select distinct id as codigo  , LEFT(descricao, 50) as descricao
         from procap_andamento
         where processo_id = ?
         order by procap_andamento.termino_data desc  ";
      $res = $this->execute($sql,array($_GET['pc']));
      return $res->getAssoc() ;
   }



   function marcarConclusaoAndamento($andamentoId){
      $data = date('Y-m-d');
      $sql = " update procap_andamento set conclusao_data  = ? where procap_andamento.id = ? ";
      $res = $this->execute($sql,array($data,$andamentoId));
   }


   function setPecas($andamento_id , $processo_id ){

      $sql = "
         select *
         from procap_peca
         where andamento_id  = ? and processo_id = ?
           ";
      $res = $this->execute($sql,array($andamento_id,$processo_id));
      return $res->getAssoc() ;
   }

}


?>