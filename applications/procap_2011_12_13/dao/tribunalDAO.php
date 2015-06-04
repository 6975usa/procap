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

class procap_dao_tribunalDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_tribunal';

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
      'tribunalList' => "
            SELECT  *
            from procap_tribunal
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }


   function getTurmasDeTribunal($oj_id){

      $sql = ' select  t.id as codigo  , t.descricao as descricao
      			from procap_turma as t inner join procap_tribunal as oj on oj.id = t.tribunal_id
      			order by t.id
               ' ;
      $res = $this->execute($sql);
      return $res->getRows();
   }





   function afterUpdate($formStructure,$formValues,$messages){

      if ( isset($_POST['id'])   &&  isset($_POST['turmas'] )  ){

         $this->execute(" delete from procap_turma  where tribunal_id = ?  " ,array($_POST['id']) );

         foreach ( $_POST['turmas'] as  $indice => $turma ){
            if( !empty($turma)) {
               $this->execute(" insert into procap_turma (id,tribunal_id,descricao) values (?,?,?) " ,array($this->getTurmaNextId(),$_POST['id'],$turma) );
            }
         }

      }
      return true  ;
   }




   function    getTurmaNextId(){

      $sql = " select max(id)+1 as nextval  from procap_turma" ;
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return   '1';
      }
      else{
         return $rs->fields['nextval'];
      }

   }




   function getTribunais(){
      $sql = "select distinct id as codigo  , nomeabreviado as descricao from procap_tribunal order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }


}

?>