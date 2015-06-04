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

class login_dao_ApplicationDAOFacade extends classes_dao_AbstractDAOFacade
{

   function __construct( classes_controller_SystemController $controller){
      parent::__construct($controller);
   }

   function getPaises(){
      return $this->getDao('login_dao_loginDAO')->getPaises();
   }



   function getEstados($country_id){
      return $this->getDao('login_dao_loginDAO')->getEstados($country_id);
   }




   function getCidades($estadoCodigo){
      return $this->getDao('login_dao_loginDAO')->getCidades($estadoCodigo);
   }



}



?>