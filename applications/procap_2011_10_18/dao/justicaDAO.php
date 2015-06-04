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

class procap_dao_justicaDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_justica';

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
      'justicaList' => "
            SELECT  *
            from procap_justica
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }




   function getJusticas(){
      $sql = "select distinct id as codigo  , descricao from procap_justica order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }




}

?>