<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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

class admin_dao_adminDAO extends classes_dao_AbstractDAO
{

   public $table = 'admin';

   function __construct( ){
      require_once(APP_ROOT.'/'.str_replace('_',DS,'admin_config_DatabaseConfiguration').'.php');
      parent::__construct();
   }


   public function setConnString(){
      return admin_config_DatabaseConfiguration::getConn('admin');
   }

   public function setMdb2Conn(){
      return admin_config_DatabaseConfiguration::getConn('admin');
   }

   public function getConnInfo(){
      return admin_config_DatabaseConfiguration::getConnInfo('admin');
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from admin ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }

   public function getListNames(){

   }




}



?>