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

class procap_dao_varaDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_vara';

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
      'varaList' => "
            SELECT  *
            from procap_vara
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }




   function getVaras(){
      $sql = "select distinct id as codigo  , descricao from procap_vara order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }



}

?>