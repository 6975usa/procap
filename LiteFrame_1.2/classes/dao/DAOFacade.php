<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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
class classes_dao_DAOFacade
{

   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
   }


   function getDao($daoName){
      return classes_Singleton::getInstance($daoName);
   }

}



?>