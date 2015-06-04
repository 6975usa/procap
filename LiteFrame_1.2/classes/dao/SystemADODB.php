<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Implements database access
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */

class classes_dao_SystemADODB
{

   public $conn;
   public $mdb2Conn;
   protected $controller;

   function __construct(){
      $this->controller = classes_Singleton::getInstance('classes_controller_SystemController');
      $this->mdb2Conn = $this->setMdb2Conn();
      $this->setConn($this->getConnInfo());
      $this->setListNames();

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
      try{
         $this->conn->Pconnect($connInfo['hostspec'], $connInfo['username'], $connInfo['password'], $connInfo['database']);
      }
      catch (Exception $e){
         throw new Exception('Problem connecting batabase: '.$e->getMessage() );
      }
   }


   public function execute($sql ,$arguments=null){
      $res = $this->conn->execute($sql,$arguments);
      if(!$res){
         pr($sql,false);
         pr($arguments,false);
         throw new Exception($this->conn->ErrorMsg());
      }
      else{
         return $res;
      }
   }


}



?>