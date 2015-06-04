<?php

/**
 * Este arquivo Ã© parte do programa LiteFrame - lightWeight FrameWork
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

class login_dao_officeDAO extends classes_dao_AbstractDAO
{

   public $table = 'office';

   function __construct( ){
      require_once(APP_ROOT.'/'.str_replace('_',DS,'login_config_DatabaseConfiguration').'.php');
      parent::__construct();
   }


   public function setConnString(){
      return login_config_DatabaseConfiguration::getConn('office');
   }

   public function setMdb2Conn(){
      return login_config_DatabaseConfiguration::getConn('office');
   }

   public function getConnInfo(){
      return login_config_DatabaseConfiguration::getConnInfo('office');
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from office ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }

   public function getListNames(){
   }






   public function afterInsert($formStructure,$formValues,$messages) {
      $res = $this->execute('select max(id) as codigo from office');
      $officeCodigo = $res->fields('codigo');

      $res = $this->execute('select max(id) as codigo from user ');
      $userCodigo = $res->fields('codigo') + 1 ;

      foreach ($_POST as $key=>$var ){
         if(strstr($key,'user_')){
            $key = str_replace('user_','',$key);
            $vals[$key]=$var;
            unset($_POST[$key]);
         }
      }

      $vals['office_id']=$officeCodigo;
      $vals['id']= $userCodigo;

      $values['id']=$userCodigo;
      $values['office_id'] = $officeCodigo;
      $values['loginname'] = $vals['loginname'];
      $values['password'] = $vals['password'];
      $values['fullname'] = $vals['fullname'];
      $values['active'] = '1';
      $values['creation_date'] = date('Y-m-d');
      $values['description'] = (isset($vals['desc'])) ? $vals['desc'] : null ;
      $values['email'] = (isset($vals['email']))?$vals['email']:null;
      $values['image'] = (isset($vals['image']))?$vals['image']:null;


      //Inserindo novo usuário
      //$values['password'] = $this->controller->env->sanitize($vals['password'],'html');
      $values['password'] = classes_utils_cripto::createHash($vals['password']);

      $sql =" insert into user (id,office_id,loginname,password,fullname,active,creation_date,description,email,image) values (?,?,?,?,?,?,?,?,?,?) ";
      $this->execute($sql,$values);


      //atualizando creator_id na tabela office
      $sql =" update office set creator_id = ? where office.id = ? ";
      $this->execute($sql,array($userCodigo,$officeCodigo));


      //cadastrando aplicações padrao
      //$sql =" inset into applications ()  ";
      //$this->execute($sql,array($userCodigo,$officeCodigo));


      //cadastrando actions padrao
      //$sql =" update office set creator_id = ? where office.id = ? ";
      //$this->execute($sql,array($userCodigo,$officeCodigo));


      return true;
   }



   function officeLoginNameExists($officeName){
      $sql = ' select id from office where name = ? ';
      $res = $this->execute($sql,array($officeName));

      if($res->numRows() > 0 ){
         return true;
      }
      else{
         return false;
      }

   }



   function userLoginNameExists($userName,$officeId){
      $sql = ' select id from user where loginname = ? and office_id = ? ';
      $res = $this->execute($sql,array($userName,$officeId));

      if($res->numRows() > 0 ){
         return true;
      }
      else{
         return false;
      }

   }



   function emailExists($email){
      $sql = ' select * from user where email = ? ';
      $res = $this->execute($sql,array($email));

      if($res->numRows() > 0 ){
         return true;
      }
      else{
         return false;
      }

   }




}



?>