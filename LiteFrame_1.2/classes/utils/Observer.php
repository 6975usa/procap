<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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

class classes_utils_Observer{

   protected $dispatcher ;
   private $dao ;

   function __construct(){
      $this->dao = classes_Singleton::getInstance('classes_dao_observerDAO');
      $this->dispatcher = &Event_Dispatcher::getInstance();
      $this->AddObservers();
   }





   function loginFailure()   {
      $this->dao->logError('---',LOGIN_FAILURE,null);
   }


   function loginSuccess($userId)   {
      $this->dao->logError($userId,LOGIN_SUCCESS,null);
   }


   function logoutSuccess($userId)   {
      $this->dao->logError($userId,LOGOUT_SUCCESS,null);
   }




   function dbAccess($userId,$query)   {
      $this->dao->logError($userId,DB_ACCESS,$query);
   }




   function AddObservers(){
      $this->dispatcher->addObserver('logAuth', 'onLogin');
   }



}

?>