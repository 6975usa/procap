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

class procap_dao_listiconsorteDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_processolisticonsorte';

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
      'listiconsorteList' => "
            SELECT
               concat( ifnull(p.nome,'') , ifnull(p.nome_fantasia,'') ) as nome
               ,l.processo_id
               ,l.pessoa_id
            from procap_processolisticonsorte as l
               inner join procap_pessoa as p  on p.id = l.pessoa_id
            where l.processo_id = '".$_GET['pc']."'
            "
            );
   }


   function getNextIdVal($pk){
      switch ($pk) {
         case 'id':
            return $this->conn->genId($this->table.$pk) ;
            break;

         default:
            throw new Exception("$pk undefined.");
            break;
      }

   }




}

?>