<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
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

class admin_dao_actionDAO extends classes_dao_AbstractDAO
{

   public $table = 'action';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return admin_config_DatabaseConfiguration::getConn('action');
   }

   public function setMdb2Conn(){
      return admin_config_DatabaseConfiguration::getConn('action');
   }

   public function getConnInfo(){
      return admin_config_DatabaseConfiguration::getConnInfo('action');
   }


   public function getListNames(){
      return  array(
      'actionList' => "
            SELECT
               action.id
               ,application.name as application_id
               ,action.name
               ,action.description
               ,action.menuname
               ,action.menulevel1
               ,action.menulevel2
               ,if(action.inmenu=1,'Sim','Não') as inmenu
               ,if(accesslevel = 'auth' , 'Autenticado','Livre') as accesslevel
            from action inner join application on application.id = action.application_id
            "
            );
   }


   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval  from `action` ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }






   function getActions(){
      $user = classes_Singleton::getInstance('classes_controller_user');
      $userId = $user->getProperty('id');
      $officeId = $user->getProperty('office_id');

      if( $userId  == '1' ){ // Systems administrator
         $sql  = "
            SELECT distinct a.id , concat(a.menulevel1 , ' -> ' , if(menulevel2='',a.menuname, concat(menulevel2,' -> ',a.menuname) ) ) as name , app.name as app
            from action as a
               inner join application as app on app.id = a.application_id
               inner join officeapplication oa on app.id = oa.application_id
               inner join office as o on o.id = oa.office_id
               inner join user as u on u.office_id = o.id
            where accesslevel = 'auth'
            order by a.menulevel1 ,  a.menuname
            ";
         $res2 = $this->execute($sql);

      }
      else{
      $sql  = "
            SELECT distinct a.id , concat(a.menulevel1 , ' -> ' , if(menulevel2='',a.menuname, concat(menulevel2,' -> ',a.menuname) ) ) as name , app.name as app
            from action as a
               inner join groupsaction as ga on ga.action_id = a.id
               inner join groups as g on g.id = ga.group_id
               inner join office as o on o.id = g.office_id
               inner join user as u on u.office_id = o.id
               inner join application as app on app.id = a.application_id
               inner join officeapplication oa on o.id = oa.office_id and oa.application_id = app.id and oa.office_id = g.office_id
            where u.id = ? and app.id <> '2' and accesslevel = 'auth'
            order by a.menulevel1 ,menulevel2 ,  a.menuname
            ";
      $res2 = $this->execute($sql,array($userId));

      }
      return $res2->getRows();
   }






   function getGroupActions($groupdId){
      $sql  = "
            select a.id , a.name
            from action a inner join groupsaction ga on ga.action_id = a.id
               inner join groups g on g.id = ga.group_id
            where g.id = ?
            ";
      $res2 = $this->execute($sql,array($groupdId));
      return $res2->getRows();
   }


}



?>