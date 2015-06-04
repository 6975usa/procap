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

class admin_dao_groupsDAO extends classes_dao_AbstractDAO
{

   public $table = 'groups';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return admin_config_DatabaseConfiguration::getConn('groups');
   }

   public function setMdb2Conn(){
      return admin_config_DatabaseConfiguration::getConn('groups');
   }

   public function getConnInfo(){
      return admin_config_DatabaseConfiguration::getConnInfo('groups');
   }


   public function getListNames(){
      $user = classes_Singleton::getInstance('classes_controller_user');
      $w = ( $user->inGroup('Super Administrador') )?'': " where u.id = '{$user->getProperty('id')}' and g.id <> 1 ";
      return  array(
      'groupsList' => "
            SELECT distinct
               g.id
               ,o.fullname as office
               ,g.office_id
               ,app.name as application
               ,g.application_id
               ,g.name
               ,g.description
               ,if(g.active=1,'sim','não') as active
            FROM `groups` g inner join application app on app.id = g.application_id
               inner join office o on o.id = g.office_id
               inner join user as u on u.office_id = o.id
            $w
            order by o.name , app.name
               "
               );
   }




   function getNextIdVal($pk){
      $sql = " select max($pk)+1 nextval  from `groups` ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }




   function getGroups(){
      $user = classes_Singleton::getInstance('classes_controller_user');

      switch ($user->inGroup('Super Administrador')) {
         case true:
            $sql = ' select  g.id , g.name  as name ,  a.name as app
      			from groups as g inner join application as a on a.id = g.application_id ';
            break;

         default:
            $sql = ' select  g.id , g.name  as name ,  a.name as app
      			from groups as g inner join application as a on a.id = g.application_id
      			where g.office_id <> 1 ';
            break;
      }
      $res = $this->execute($sql);
      return $res->getRows();
   }




   function getGroupActions(){
      $sql = ' select  g.id ,concat(a.name , " -> " , g.name ) as name  from
               groups as g inner join application as a on a.id = g.application_id
               ';
      $res = $this->execute($sql);
      return $res->getRows();
   }






   function afterUpdate($formStructure,$formValues,$messages){

      $this->afterDelete($formStructure,$formStructure,$messages);

      if ( isset($_POST['id'])   && isset($_POST['actions'] )  ){

         foreach ( $_POST['actions'] as $actionId=> $actionName ){
            $this->execute(" insert into groupsaction (group_id,action_id) values (?,?) " ,array($_POST['id'],$actionId) );
         }

      }
      return true  ;
   }



   function afterInsert($formStructure,$formValues,$messages){

      $this->afterDelete($formStructure,$formStructure,$messages);

      if ( isset($_POST['actions'] )  ){

         foreach ( $_POST['actions'] as $actionId=> $actionName ){
            $this->execute(" insert into groupsaction (group_id,action_id)
				values (?,?) " ,array($formValues['id'],$actionId) );
         }

      }
      return true  ;
   }



   function afterDelete($formStructure,$formValues,$messages){
      $groupId = $_POST['id'];
      $this->execute(" delete from groupsaction where group_id = ?  " ,array($groupId) );
      return true;
   }



}



?>