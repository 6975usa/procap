<?php

/**
 * Este arquivo é parte do programa LiteFrame - lightWeight FrameWork
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

class admin_dao_userDAO extends classes_dao_AbstractDAO
{

   public $table = 'user';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return admin_config_DatabaseConfiguration::getConn('user');
   }

   public function setMdb2Conn(){
      return admin_config_DatabaseConfiguration::getConn('user');
   }

   public function getConnInfo(){
      return admin_config_DatabaseConfiguration::getConnInfo('user');
   }


   public function getListNames(){
      $user = classes_Singleton::getInstance('classes_controller_user');
      $officeId = $user->getProperty('office_id');
      $w = ($officeId=='1')?null:" where office.id = $officeId ";
      return  array(
      'userList' => "
            SELECT
               user.id
               ,office.fullname as office
               ,user.office_id as office_id
               ,user.loginname
               ,user.fullname
               ,if(user.active=1,'sim','n�o') as active
               ,date_format(user.creation_date,'%d/%m/%Y') as creation_date
               ,user.description
               ,user.email
               ,user.image
            from user left join office on office.id = user.office_id
            $w
            order by fullname
            "
            );
   }


   function getNextIdVal($pk){
      switch ($pk) {
         case 'id':
            $sql = " select max($pk+1) as nextval  from `user` ";
            $rs = $this->execute($sql);
            if(empty($rs->fields['nextval'])){
               return '1';
            }
            return $rs->fields['nextval'];
            break;

         case 'office_id':
            return $_POST['office_id'];
            break;

         default:
            break;
      }
   }



   function getUserGroups($user_id,$office_id){
      $sql  = "
                  SELECT g.id AS id,  g.name  AS name
                  from groups g inner join usergroups ug on ug.groups_id = g.id
                     inner join user u on u.id = ug.user_id and u.office_id = ug.office_id
                  where u.id = ? and u.office_id = ?
                  ";
      $res2 = $this->execute($sql,array($user_id,$office_id));

      return $res2->getRows();
   }



   function afterUpdate($formStructure,$formValues,$messages){

      $ad = $this->afterDelete($formStructure,$formValues,$messages);

      if ( isset($_POST['id']) && isset($_POST['office_id'] )  && isset($_POST['groups'] )  ){
         $admin = $this->controller->getUser()->getProperty('id');
         foreach ( $_POST['groups'] as $groupId=> $groupName ){
            $this->execute(" insert into usergroups (user_id,office_id,groups_id,admin_id) values (?,?,?,? ) " ,array($_POST['id'],$_POST['office_id'],$groupId,$admin) );
         }
      }

      if(!empty($_POST['password_first']) && !empty($_POST['password_confirm'])){
         $passwd = classes_utils_cripto::createHash($_POST['password_first']);
         $sql = " update user set password = ? where id = ? and office_id = ?  " ;
         $this->execute($sql,array($passwd,$_POST['id'],$_POST['office_id']));
      }

      return true && $ad ;

   }



   function afterDelete($formStructure,$formValues,$messages){
      $userId = $_POST['id'];
      $officeId = $_POST['office_id'];
      $this->execute(" delete from usergroups where user_id = ? and office_id = ?  " ,array($userId,$officeId) );
      return true;
   }



   function afterInsert($formStructure,$formValues,$messages){


      //corrigindo office_id e creation_date do usu�rio recem criado.
      $values = array($_POST['office_id'],date('Y-m-d'),$formValues['id'],$formValues['office_id']) ;

      $this->execute(" update user set
               user.office_id = ? , creation_date = ?
               where user.id = ?  and user.office_id = ?  " ,$values);



      //corrigindo senha
      $passwd = classes_utils_cripto::createHash($_POST['password_first']);
      $sql = " update user set password = ? where id = ? and office_id = ?  " ;
      //pr(array($passwd,$formValues,$_POST));
      $this->execute($sql,array($passwd,$formValues['id'],$_POST['office_id']));



      return true ;

   }




}

?>