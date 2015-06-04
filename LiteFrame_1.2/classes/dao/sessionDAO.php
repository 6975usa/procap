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

class classes_dao_sessionDAO
{

   public $table = 'session';
   public $connection ;


   function __construct(){
      //$this->controller = classes_Singleton::getInstance('classes_controller_SystemController');
      $this->setConn($this->getConnInfo());
   }



   /**
    * Sets up connection to database
    *
    * @param array $connInfo
    */
   function setConn($connInfo){
      require_once(SHARE_ROOT.'/classes/adodb/adodb.inc.php');
      $this->connection = NewADOConnection($connInfo['phptype']);
      $this->connect($connInfo);
   }



   /**
    * Connects to database
    *
    * @param array $connInfo
    */
   function connect($connInfo){
      try{
         $this->connection->connect($connInfo['hostspec'], $connInfo['username'], $connInfo['password'], $connInfo['database']);
      }
      catch (Exception $e){
         throw new Exception('Problem connecting batabase: '.$e->getMessage() );
      }
   }





   public function setConnString(){
      return classes_dao_DBConfig::getConn('session');
   }

   public function setMdb2Conn(){
      return classes_dao_DBConfig::getConn('session');
   }

   public function getConnInfo(){
      return classes_dao_DBConfig::getConnInfo('session');
   }




   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from log ";
      $rs = $this->connection->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }




   public function getListNames(){}


   function execute($sql,$options = array() ){
      $rs = $this->connection->execute($sql,$options);
      if($this->connection->errorMsg()){
         pr(array($sql,$options),false);
         throw new Exception($this->connection->errorMsg());
      }

      return $rs;
   }




}


?>