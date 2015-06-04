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

class login_dao_loginDAO extends classes_dao_AbstractDAO
{

   public $table = 'login';

   function __construct( ){
      require_once(APP_ROOT.'/'.str_replace('_',DS,'login_config_DatabaseConfiguration').'.php');
      parent::__construct();
   }


   public function setConnString(){
      return login_config_DatabaseConfiguration::getConn('login');
   }

   public function setMdb2Conn(){
      return login_config_DatabaseConfiguration::getConn('login');
   }

   public function getConnInfo(){
      return login_config_DatabaseConfiguration::getConnInfo('login');
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from login ";
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