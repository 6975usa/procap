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

class procap_dao_partecontrariaDAO extends classes_dao_AbstractDAO
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
      'partecontrariaList' => "
            SELECT
               id
               ,tratamento_id
               ,concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as nome
               ,estadocivil_id
               ,nascimento
               ,nacionalidade
               ,identidade
               ,profissao
               ,cpf
               ,concat ( ifnull(cnpj,'') , ifnull(cpf,'') ) as cnpj
               ,nome_fantasia
            from procap_pessoa
            where tipo = 'partecontraria pessoa_fisica' or tipo = 'partecontraria pessoa_juridica'
            order by nome
            "
            );
   }


   function getNextIdVal($pk){
       return $this->conn->genId($this->table.$pk) ;
   }




   function getTratamentos(){
      $sql = "select distinct id as codigo  , descricao from procap_tratamento order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }




   function getPartesContrarias(){

      $user = classes_Singleton::getInstance('classes_controller_user');

      switch ($user->inGroup('Super Administrador')) {
         case true:
            $sql = "select distinct id as codigo  , concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as descricao
            from procap_pessoa
            where tipo = 'partecontraria pessoa_fisica'  or tipo = 'partecontraria pessoa_juridica'
            order by descricao  ";
            $res = $this->execute($sql);
            return $res->getAssoc() ;
            break;

         default:
            $officeId = $user->getProperty('office_id');
            $sql = "select distinct id as codigo  , concat( ifnull(nome,'') , ifnull(nome_fantasia,'') ) as descricao
            from procap_pessoa
            where (tipo = 'partecontraria pessoa_fisica'  or tipo = 'partecontraria pessoa_juridica') and office_id = ?
            order by descricao  ";
            $res = $this->execute($sql,array($officeId));
            return $res->getAssoc() ;
            break;
      }



   }




   function getEstadosCivis(){
      $sql = "select distinct id as codigo  , descricao from procap_estadocivil order by descricao  ";
      $res = $this->execute($sql);
      return $res->getAssoc() ;

   }




   function getTipoPessoaDopartecontraria($partecontrariaId){
      $sql = "select tipo from procap_pessoa where id = ?  ";
      $res = $this->execute($sql,array($partecontrariaId));
      return $res->fields('tipo') ;

   }





   function afterInsert($formStructure,$formValues,$messages){

      if( isset($_POST['partecontraria'])  ){

         switch ($_POST['partecontraria']) {
            case 'pessoa_fisica':
               $this->execute(" update procap_pessoa set tipo = 'partecontraria pessoa_fisica' where procap_pessoa.id = ?  " ,array($formValues['id']) );
               break;

            case 'pessoa_juridica':
               $this->execute(" update procap_pessoa set tipo = 'partecontraria pessoa_juridica' where procap_pessoa.id = ? " ,array($formValues['id']) );
               break;

            default:
               throw new Exception('Tipo de partecontraria nao definido');
               break;
         }

      }
      else{
         throw new Exception('Tipo pessoa nao definido');
      }

      return true  ;
   }




}

?>