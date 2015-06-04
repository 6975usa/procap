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
abstract class  classes_dao_AbstractDAO extends classes_dao_SystemDAO
{

   function __construct(){
      parent::__construct();
   }

   abstract function getListNames();

   abstract function getNextIdVal($pk);

   abstract function  setMdb2Conn();

}





?>