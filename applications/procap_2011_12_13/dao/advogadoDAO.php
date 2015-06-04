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

class procap_dao_advogadoDAO extends classes_dao_AbstractDAO
{

   public $table = 'procap_pessoa';

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
      'advogadoList' => "
            SELECT
               p.id
               ,p.tratamento_id
               ,p.nome
               ,p.estadocivil_id
               ,p.nascimento
               ,p.nacionalidade
               ,p.identidade
               ,p.profissao
               ,p.cpf
               ,p.oab
               ,p.nome_fantasia
               ,p.user_id
               ,user.loginname
            from procap_pessoa as p
               left join user on user.id = p.user_id
            where tipo = 'advogado'
            order by nome
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }





   function afterInsert($formStructure,$formValues,$messages){

      // Definindo o tipo de pessoa
      $this->execute(" update procap_pessoa set tipo = 'advogado' where procap_pessoa.id = ?  " ,array($formValues['id']) );

      return true  ;
   }




   function getTodosAdvogados(){
      $sql = "select distinct
               id as codigo
               , concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as descricao
            from procap_pessoa
            where tipo = 'advogado'
            order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }




   function getLoginNames() {
      $user = classes_Singleton::getInstance('classes_controller_user');
      $sql = " select u.id as codigo , u.loginname as descricao
               from user as u
                  inner join office as o on o.id = u.office_id
               where u.office_id = ?
               order by loginname ";
      $res = $this->execute($sql,array($user->office_id));
      return $res->getAssoc() ;
   }




   function nomeLoginJaAtribuido($user_id , $pessoa_id) {

      $sql = " select * from procap_pessoa where user_id = ? and id <> ? ";
      $res = $this->execute($sql,array($user_id,$pessoa_id) );

      if($res->numRows() > 0 ){
         return true;
      }
      else{
         return false;
      }
   }





}





?>