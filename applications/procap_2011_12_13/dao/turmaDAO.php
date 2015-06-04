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

class procap_dao_turmaDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_turma';

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
      'turmaList' => "
            SELECT  *
            from procap_turma
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }




   function getTurmas(){
      $sql = "select distinct id as codigo  , descricao from procap_turma order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }



}

?>