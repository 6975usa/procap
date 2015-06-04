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

class classes_dao_userDAO extends classes_dao_AbstractLiteFrameDAO
{

   public $table = 'user';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return classes_dao_DBConfig::getConn('user');
   }

   public function setMdb2Conn(){
      return classes_dao_DBConfig::getConn('user');
   }

   public function getConnInfo(){
      return classes_dao_DBConfig::getConnInfo('user');
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from user ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }

   public function getListNames(){

   }


   function userExists($username,$office){

      $sql = "
         select user.id
         from user  inner join office on user.office_id = office.id
         where loginname = ?
            and office.name = ?
         ";

      $res = $this->execute($sql,array($username,$office));
      if ( $res->numRows() == 1 ){
         return true;
      }
      else{
         return false;
      }

   }


   function userIsActive($username,$office){

      $sql = "
         select user.active as active
         from user  inner join office on user.office_id = office.id
         where loginname = ?
            and office.name = ?
         ";

      $res = $this->execute($sql,array($username,$office));
      return $res->fields('active');

   }


   function passwodIsCorrect($username,$password){

      $critoPass = classes_utils_cripto::createHash($password);

      $res = $this->execute( " select password from user where loginname = ? ",array($username) );
      $dbPass = $res->Fields('password');

      if($critoPass == $dbPass ){
         return true;
      }
      else{
         return false;
      }
   }



   function getUserProperties($user_id){
      $sql = ' select user.* , session.id as session_id from user inner join session on user.id = session.user_id where user.id = ?   ';
      $res1 = $this->execute($sql,array($user_id));

      $sql  = "
            SELECT g.id AS id, g.name AS name
            FROM groups AS g
               INNER JOIN usergroups AS ug ON g.id = ug.groups_id
               INNER JOIN user AS u ON u.id = ug.user_id and u.office_id = ug.office_id
            WHERE u.office_id = g.office_id
               AND u.id =?
            ";
      $res2 = $this->execute($sql,array($user_id ));

      return array_merge($res1->getRowAssoc(),array('groups'=>$res2->getRows())) ;

   }



   function getSystemAdminProperties(){
      $sql = ' select u.*
	            FROM groups AS g
	               INNER JOIN usergroups AS ug ON g.id = ug.groups_id
	               INNER JOIN user AS u ON u.id = ug.user_id
	             where u.fullname = ?
	      				and g.name =  ? ';
      $res1 = $this->execute($sql,array('Administrado do sistema','Administrador'));

      return $res1->getRowAssoc() ;

   }





   function getAllowedAppsToUser($username){
      $sql = "
               select distinct app.id , app.name
               from application app inner join officeapplication oa on oa.application_id = app.id
                  inner join user u on u.office_id = oa.office_id
               where u.id = ?
         ";
      $res = $this->execute($sql,array($username));
      return $res->getRows() ;
   }





   function getAllowedActionsToUser($userId){
      $sql = "
         select * from (
                  select distinct a.id , app.name as application , a.name as action , a.menulevel1, a.menuname  , a.menulevel2 , a.accesslevel , a.inmenu
                  from user as u
                     inner join office as o on u.office_id = o.id
                     inner join officeapplication as oapp on oapp.office_id = o.id
                     inner join application as app on app.id = oapp.application_id
                     inner join groups as g on g.office_id = o.id
                     inner join groupsaction as ga on ga.group_id = g.id
                     inner join action as a on a.application_id = app.id and a.id = ga.action_id
                     inner join usergroups as ug on u.id = ug.user_id and u.office_id = ug.office_id and ug.groups_id = g.id
                  where u.id = ? and app.id <> '2'
               union
                  select distinct a.id , app.name as application , a.name as action , a.menulevel1, a.menuname  , a.menulevel2 , a.accesslevel , a.inmenu
                  from application as app inner join action as a on a.application_id = app.id
                  where accesslevel = 'free'
         )q
         order by menulevel1 , menuname
         ";
      $res = $this->execute($sql,array($userId));
      return $res->getRows() ;
   }







   function getUserIdByName($userName,$officeName){
      $sql = '
         select user.id as id
         from user inner join office on office.id = user.office_id
         where user.loginname = ? and office.name = ? ';
      $res = $this->execute($sql,array($userName,$officeName));

      return $res->fields('id');
   }







   function getOfficeIdByName($userName,$officeName){
      $sql = '
         select office.id as id
         from user inner join office on office.id = user.office_id
         where user.loginname = ? and office.name = ? ';
      $res = $this->execute($sql,array($userName,$officeName));

      return $res->fields('id');
   }






   function isActive($userId){
      $sql = 'SELECT active FROM `user` WHERE id =  ? ';
      $res = $this->execute($sql,array($userId));

      return $res->fields('active');
   }



}



?>