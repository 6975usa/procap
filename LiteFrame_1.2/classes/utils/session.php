<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Class for user interface
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */


final class classes_utils_session {



   function generateSessionId(){
      return  md5( rand() . time() ) ;
   }


   public function writeSessionId($sessionId,$userId,$phpSessId){
      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $sql = ' insert into session (id,user_id,phpsessid,ip) values (?,?,?,?) ';
      $res = $dao->execute($sql,array($sessionId,$userId,$phpSessId,$_SERVER['REMOTE_ADDR']));

      return true;
   }




   static function start(){
      session_start();
   }


   public function getPhpSessionId($value){

      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $sql = ' select phpsessid  from session where id = ? ';
      $res = $dao->execute($sql,array($value));

      if($res->NumRows()==0){
         return false;
      }

      return $res->fields('phpsessid');

   }


   public function getSessionId($value,$phpSessId){

      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $sql = ' select id  from session where id = ? and phpsessid =  ? ';
      $res = $dao->execute($sql,array($value,$phpSessId));

      if($res->NumRows()==0){
         return false;
      }

      return $res->fields('id');

   }



   public function deleteSessionId($session_id){
      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $res = $dao->execute(' delete from session where id = ? ',array($session_id));
      return true;
   }


   public function getUserIdBySessionId($sessionId){
      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $sql = ' select user_id from session  where session.id = ? ';
      $res = $dao->execute($sql,array($sessionId));
      if($res->numRows()==0){
         return false;
      }
      else{
         return $res->fields('user_id');
      }
   }


   public function getOfficeIdBySessionId($sessionId){
      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $sql = ' select office_id from session  where session.id = ? ';
      $res = $dao->execute($sql,array($sessionId));
      if($res->numRows()==0){
         return false;
      }
      else{
         return $res->fields('office_id');
      }
   }



   public function deleteOldSessionId($userId,$sessionId,$phpSessId ){
      $dao = classes_Singleton::getInstance('classes_dao_sessionDAO');
      $res = $dao->execute(' delete from session where user_id = ?  and id <> ? and phpsessid = ?  ',array($userId,$sessionId,$phpSessId ));
      return true;
   }



}

?>