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

class procap_dao_custasDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_custas';

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
      'custasList' => "
            SELECT
               c.id
               ,p.numero as processo
               ,c.descricao
               ,date_format(c.data,'%d/%m/%Y') as data
               ,c.tipo
               ,c.valor
            from procap_custas as c
               inner join procap_processo as p on p.id = c.processo_id
            where processo_id = '".$_GET['pc']."'
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }




   function getcustass(){
      $sql = "select distinct id as codigo  , descricao from procap_custas order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }



}

?>