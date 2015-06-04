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

class admin_dao_ApplicationDAOFacade extends classes_dao_AbstractDAOFacade
{

   function __construct( classes_controller_SystemController $controller){
      parent::__construct($controller);
   }

   function getPaises(){
      return $this->getDao('admin_dao_adminDAO')->getPaises();
   }



   function getEstados($country_id){
      return $this->getDao('admin_dao_adminDAO')->getEstados($country_id);
   }




   function getCidades($estadoCodigo){
      return $this->getDao('admin_dao_adminDAO')->getCidades($estadoCodigo);
   }


   function getApplications(){
      return $this->getDao('admin_dao_appDAO')->getApps();
   }


   function getAllGroups(){
      return $this->getDao('admin_dao_groupsDAO')->getGroups();
   }


   function getActions(){
      return $this->getDao('admin_dao_actionDAO')->getActions();
   }



}



?>