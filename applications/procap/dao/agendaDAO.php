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

class procap_dao_agendaDAO extends classes_dao_AbstractDAO
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

      //pr($_GET['dias']) ;

      $where = null ;
      if(!empty($_GET['dias'])){
         $dias = $_GET['dias'];
         $where = " and (  ";
         $where .= " ( a.termino_data >= '{$dias[0]}' and a.termino_data <= '{$dias[1]}' )  ";
         if( !isset($_GET['semana_da_agenda']) ||  ( isset($_GET['semana_da_agenda']) && $_GET['semana_da_agenda'] == 'stual'  )  ){
            $where .= " or ( a.termino_data < '{$dias[0]}' and conclusao_data is null ) ";
         }
         $where .= "   )   ";
      }
      else{
         $where = " and ( a.termino_data =  '{$_GET['dia']}' )  ";
      }

      $user = classes_Singleton::getInstance('classes_controller_user');

      $tipo = $this->getPessoaTipo($user->id);
      $user = classes_Singleton::getInstance('classes_controller_user');

      if($user->inGroup('Administrador')){
         $w = $where ;
      }
      else{
         $w = "  and pes.user_id = '{$user->id}' $where " ;
      }

      $sql =   array(
      'agendaList' => "
               SELECT
                  a.id
                  ,a.id as andamento_id
                  ,t.descricao  as tipo
                  ,a.processo_id as processo
		            ,p.numero as numero
                  ,f.descricao as fase
                  ,date_format(a.termino_data , '%Y-%m-%d' )as termino
                  , CURDATE() as hoje
                  ,concat(date_format(a.inicio_data,'%d/%m/%Y'),' ', case weekday(a.inicio_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as inicio_data
                  ,concat(date_format(a.termino_data,'%d/%m/%Y'),' ', case weekday(a.termino_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as termino_data
                  ,concat(date_format(a.conclusao_data,'%d/%m/%Y'),' ', case weekday(a.conclusao_data) when 6 then 'Dom' when 0 then 'Seg' when 1 then 'Ter'when 2 then 'Qua' when 3 then 'Qui' when 4 then 'Sex' when 5 then 'Sab' End ) as conclusao_data
                  ,a.descricao
                  ,case a.agenda when 1 then 'Sim' when 0 then 'Não' End as agenda
                  ,p.numero as processo_nr
                  ,pes.nome as nome
                  , concat( ifnull( ( select concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as nome from procap_pessoa where procap_pessoa.id = cliente1_id ) ,'') , ifnull( ( select concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) from procap_pessoa where procap_pessoa.id = cliente2_id ) ,'') ) as cliente
                  , concat( ifnull( ( select concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as nome from procap_pessoa where procap_pessoa.id = contraparte1_id ) ,'') , ifnull( ( select concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) from procap_pessoa where procap_pessoa.id = contraparte2_id ) ,'') ) as contraparte
               from procap_andamento as a
                  inner join procap_tipoandamento as t on  t.id = a.tipo_id
                  inner join procap_fase as f on f.id = a.fase_id
                  inner join procap_processo as p on p.id = a.processo_id
                  inner join procap_pessoa as pes on pes.id = a.advogado_id
               where a.agenda = 1 $w
               order by a.termino_data asc , a.id asc
               "
               );
      return $sql;

   }


   function getNextIdVal($pk){
      return $this->conn->genId($this->table.$pk) ;
   }




   function getagendas(){
      $sql = "select distinct id as codigo  , descricao from procap_agenda order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }




   function getPessoaTipo($pessoaId){
      $sql = " select tipo from procap_pessoa where user_id = ? ";
      $res = $this->execute($sql,array($pessoaId));
      if($res->numRows() < 1 ){
         return null;
      }
      elseif($res->numRows() > 1){
         throw new Exception('Há mais de um advogado com o mesmo Nome de Login');
      }
      else {
         return $res->fields('tipo') ;
      }
   }







}

?>