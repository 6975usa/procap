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

class procap_dao_orgaojudicialDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_orgaojudicial';

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
      'orgaojudicialList' => "
            SELECT  *
            from procap_orgaojudicial
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }



   function getTurmasDeOrgaoJudicial($oj_id){

      $sql = ' select  t.id as codigo  , t.descricao as descricao
      			from procap_turma as t inner join procap_orgaojudicial as oj on oj.id = t.orgaojudicial_id
      			order by t.id
               ' ;
      $res = $this->execute($sql);
      return $res->getRows();
   }





   function afterUpdate($formStructure,$formValues,$messages){

      if ( isset($_POST['id'])   &&  isset($_POST['turmas'] )  ){

         $this->execute(" delete from procap_turma  where orgaojudicial_id = ?  " ,array($_POST['id']) );

         foreach ( $_POST['turmas'] as  $indice => $turma ){
            if( !empty($turma)) {
               $this->execute(" insert into procap_turma (id,orgaojudicial_id,descricao) values (?,?,?) " ,array($this->getTurmaNextId(),$_POST['id'],$turma) );
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


}

?>