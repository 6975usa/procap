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

class classes_dao_LogerDAO
{

   public $table = 'log';
   private $conn ;


   function __construct(){
      $this->controller = classes_Singleton::getInstance('classes_controller_SystemController');
      $this->setConn($this->getConnInfo());
   }



   /**
    * Sets up connection to database
    *
    * @param array $connInfo
    */
   function setConn($connInfo){
      require_once(SHARE_ROOT.'/classes/adodb/adodb.inc.php');
      $this->conn = NewADOConnection($connInfo['phptype']);
      $this->connect($connInfo);
   }



   /**
    * Connects to database
    *
    * @param array $connInfo
    */
   function connect($connInfo){
//   pr($connInfo);
      try{
         $this->conn->Pconnect($connInfo['hostspec'], $connInfo['username'], $connInfo['password'], $connInfo['database']);
      }
      catch (Exception $e){
         throw new Exception('Problem connecting batabase: '.$e->getMessage() );
      }
   }





   public function setConnString(){
      return classes_dao_DBConfig::getConn('observer');
   }

   public function setMdb2Conn(){
      return classes_dao_DBConfig::getConn('observer');
   }

   public function getConnInfo(){
      return classes_dao_DBConfig::getConnInfo('observer');
   }




   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from log ";
      $rs = $this->conn->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }




   public function getListNames(){}



   function log($user_id,$log_id,$query){

      $id = $this->getNextIdVal('id');
      $date = date('Y-m-d H:m:s');
      $url = '';

      $app = classes_Singleton::getInstance('classes_controller_ApplicationController');
      $appName = $app->getName();

      $action = classes_Singleton::getInstance('classes_controller_ActionController');
      $actionName = $action->getName();

      $ip = $_SERVER['REMOTE_ADDR'];


      $sql = "
         insert into log (id,date,user_id,error_id,query,url,application,action,ip)
         values (?,?,?,?,?,?,?,?,?)
         ";

      $res = $this->execute($sql,array($id,$date,$user_id,$log_id,$query,$url,$appName,$actionName,$ip));

   }


   function execute($sql,$options = array() ){
      $rs = $this->conn->execute($sql,$options);
      if($this->conn->errorMsg()){
         throw new Exception($this->conn->errorMsg());
      }

      return $rs;
   }


}



?>