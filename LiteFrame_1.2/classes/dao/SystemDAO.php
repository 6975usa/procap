<?php
/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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
class classes_dao_SystemDAO
{

   public $table;
   protected $formStructure;
   protected  $conn;
   public $mdb2Conn;
   protected $controller;

   private $insertSuccessMsg = RESGISTRY_INSERTED_SUCCESSFULLY;
   private $updateSuccessMsg = RESGISTRY_UPDATED_SUCCESSFULLY;
   private $deleteSuccessMsg = RESGISTRY_DELETED_SUCCESSFULLY;




   function __construct(){
      require_once(SHARE_ROOT.'/'.str_replace('_',DS,'classes_controller_SystemController').'.php');
      $this->controller = classes_Singleton::getInstance('classes_controller_SystemController');
      $this->mdb2Conn = $this->setMdb2Conn();
      $this->setConn($this->getConnInfo());
      //$this->setListNames();
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
         $this->conn->connect($connInfo['hostspec'], $connInfo['username'], $connInfo['password'], $connInfo['database']);
      }
      catch (Exception $e){
         throw new Exception('Problem connecting batabase: '.$e->getMessage() );
      }
   }



   /**
    * Gets total rows of given list structure
    *
    * @param objec $listStructure
    * @return number
    */
   function getTotalRows($listStructure){
      $conn = classes_Singleton::getInstance($listStructure->dao)->mdb2Conn;
      $conn->disconnect();
      $conn->connect();
      $sql = " select count(*) as total from ( ".$this->getListSelect($listStructure).') getTotalRows ';
      if(DEBUG_SQL){
         pr($sql,false);
      }
      $rs = $conn->query($sql);
      if(PEAR::isError($rs)){
         throw new Exception($rs->getUserInfo());
      }
      $res = $rs->fetchOne();
      return $res;
   }



   function insert($formStructure,$values){
      try{
         $cols='';
         foreach ($values as $colName=>$value){
            $cols .= ",".$colName;
         }
         $cols = substr($cols,1);

         $valores = '';
         foreach ($values as $val){
            $valores.= ", ? ";
         }
         $valores = substr($valores,1);

         $sql =  "INSERT INTO ".$formStructure->table. ' ('. $cols . ") VALUES ( $valores )";
         try{
            if(empty($this->conn)){
               $this->setConn($this->getConnInfo());
            }
            if(DEBUG_SQL){pr(array($sql,$values),false);}
            $result = $this->executeAndLog($sql,$values);
            if(! $result ){
               throw new Exception($this->conn->ErrorMsg());
            }
         }
         catch (Exception $e){
            throw new Exception('Could not insert: '.$e->getMessage() );
         }

         return $this->insertSuccessMsg  ;
      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }
   }







   function update($formStructure,$values){
      //try{
      $valores = '';
      foreach ($values as $colName=>$value){
         $valores.= ','.$colName. " = ? ";
      }
      $valores = substr($valores,1);

      $where = $this->buildWhereClause($formStructure,$values);

      $sql =  " UPDATE ".$formStructure->table. " SET  $valores $where ";

      if(DEBUG_SQL){
         pr(array($sql,$values),false);
      }
      try{
         if(empty($this->conn)){
            $this->setConn($this->getConnInfo());
         }
         $result = $this->executeAndLog($sql,$values);
         if(! $result ){
            throw new Exception($this->conn->ErrorMsg());
         }
      }
      catch (Exception $e){
         throw new Exception('Could not update: '.$e->getMessage() );
      }

      return RESGISTRY_UPDATED_SUCCESSFULLY  ;
      //}
      //catch (Exception $e){
      //require_once(SHARE_ROOT.'/'.str_replace('_',DS,'classes_SystemException').'.php');
      //throw new classes_SystemException($e);
      //}
   }





   function delete($formStructure,$values){
      try{

         $where = $this->buildWhereClause($formStructure,$values);

         $sql =  " DELETE FROM ".$formStructure->table. " $where ";

         if(DEBUG_SQL){
            pr($sql,false);
         }
         try{
            if(empty($this->conn)){
               $this->setConn($this->getConnInfo());
            }
            $result = $this->executeAndLog($sql) ;
            if(! $result ){
               throw new Exception($this->conn->ErrorMsg());
            }
            else{
               return RESGISTRY_DELETED_SUCCESSFULLY;
            }
         }
         catch (Exception $e){
            throw new Exception('Could not delete: '.$e->getMessage() );
         }
      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }
   }




   public function buildWhereClause($formStructure,$values){
      $where = '';
      foreach ($formStructure->idx as $pkName=>$type){
         $where .= 'and ' . $pkName . ' = ' . $values[$pkName] . ' ' ;
      }
      $where = substr($where,3) ;
      $where = ' where ' . $where ;
      return $where;
   }


   function getSqlString(){
      $this->getListSelect();
   }






   function getListSelect($listStructure){
      $conn = classes_Singleton::getInstance($listStructure->dao)->mdb2Conn;
      $listNames = $this->getListNames();
      if(!key_exists($listStructure->listName,$listNames)){
         throw new Exception("List not found in DAO: ".$listStructure->listName);
      }
      $table = $listNames[$listStructure->listName];

      $w='';
      if(isset($_GET['find_txt']) && !empty($_GET['find_txt']) ){
         foreach ($listStructure->getSearchFields() as $field){
            $w .= ' or ' . $field . " like '%".$_GET['find_txt']."%' " ;
         }
         $w = substr($w,4);
         $w =  ' where '.$w;
      }
      if(!empty($_GET['order_field'])){
         $order = ' order by '.$_GET['order_field'].' asc ';
      }
      //////////////
      $sql = " select * from ($table) getListSelect $w  ";
      if(DEBUG_SQL)pr($sql,false);
      return $sql;
   }


   function setListNames(array $avoids=null) {
      $post = $_POST;
      unset($post['setPerPage']);
      unset($post['pageID']);
      unset($post['find_txt']);
      unset($post['action']);
      unset($post['listName']);
      unset($post['limit']);
      unset($post['layout']);
      unset($post['view']);

      $lists = $this->getListNames();
      if(!empty($lists)) {
         if( $this->controller->getAction()->getCrudAction()=='lsUpdate' ){
            if(key_exists($_POST['listName'],$lists)){
               if(!isset($this->table)){
                  throw new Exception('Table not set in DAO');
               }
               $sql = $lists[$_POST['listName']];
               $sql = ' select * from  '.$this->table;
               $w = '';
               if(!empty($post)){
                  foreach ($post as $name => $value){
                     $w .= " and $name='$value' ";
                  }
                  $w = ' where '.substr($w,4);
               }
               $sql .= $w ;

               $res = $this->mdb2Conn->query($sql);
               if(PEAR::isError($res)){
                  throw new Exception($res->getUserInfo());
               }
               $rs = $res->fetchAll(MDB2_FETCHMODE_ASSOC);
               if($res->numRows()>0){
                  foreach ($rs[0] as $name=>$value){
                     $skip=false;
                     if(!empty($avoid)){
                        foreach ($avoids as $avoid){
                           if($name==$avoid){
                              $skip=true;
                           }
                        }
                     }
                     if(!$skip){
                        $_POST[$name]=$value;
                        $_POST[$name]=$value;
                     }
                  }
               }
               $_POST['action']='lsUpdate';
            }
         }
      }
      $this->listNames=$this->getListNames();
   }



   function setInsertSuccessMsg($msg){
      $this->insertSuccessMsg = $msg;
   }


   function setUpdateSuccessMsg($msg){
      $this->updateSuccessMsg = $msg;
   }


   function setDeleteSuccessMsg($msg){
      $this->deleteSuccessMsg = $msg;
   }


   /**
    * 
    * @param type $sql
    * @param type $options
    * @return ADORecordSet_mysql
    * @throws Exception
    */
   function execute($sql,$options = array() ){
      $rs = $this->conn->execute($sql,$options);
      //var_dump(array($sql,$options));die;
      if($this->conn->errorMsg()){
         throw new Exception($this->conn->errorMsg());
      }
      return $rs;
   }




   function executeAndLog($sql,$options = array() ){
      $rs = $this->conn->execute($sql,$options);
      if($this->conn->errorMsg()){
         throw new Exception($this->conn->errorMsg());
      }

      $values = '('.implode(',',$options).')';
      $loger = classes_Singleton::getInstance('classes_utils_Loger');

      $loger->log(DB_ACCESS,$sql.$values);

      return $rs;
   }

}



?>