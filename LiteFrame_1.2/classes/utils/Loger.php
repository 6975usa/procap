<?php
/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Implements database access
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */

require_once PEAR_ROOT.'/Event/Dispatcher.php';

class classes_utils_Loger{

   protected $dispatcher ;
   private $dao ;

   function __construct(){
      $this->dao = classes_Singleton::getInstance('classes_dao_logerDAO');
   }



   function Log($event , $query = null){
      switch ($event) {

         case LOGIN_FAILURE:
            $this->dao->log('---',LOGIN_FAILURE,null);
            break;

         case LOGIN_SUCCESS:
            $user = classes_Singleton::getInstance('classes_controller_user');
            $this->dao->log($user->getProperty('id'),LOGIN_SUCCESS,null);
            break;

         case LOGOUT_SUCCESS:
            $user = classes_Singleton::getInstance('classes_controller_user');
            $this->dao->log($user->getProperty('id'),LOGOUT_SUCCESS,null);
            break;

         case ACCESS_NOT_ALLOWED:
            $user = classes_Singleton::getInstance('classes_controller_user');
            if ( $user->isLoged() ){
               $id = $user->getProterty('id');
            }
            else{
               $id = 0;
            }
            $this->dao->log($id,ACCESS_NOT_ALLOWED,null);
            break;

         case DB_ACCESS:
            if(is_null($query)){
               throw new classes_SystemException('"query" Cannot be null');
            }
            $userId = classes_Singleton::getInstance('classes_controller_user')->getProperty('id');
            $this->dao->log($userId,DB_ACCESS,$query);
            break;


         default:
            throw new classes_SystemException('Event not implemented yet: '.$event);
            break;
      }
   }




}

?>