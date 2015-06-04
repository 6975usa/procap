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


require_once(SHARE_ROOT.'/'.str_replace('_',DS,'classes_dao_DAOFacade').'.php');
abstract class classes_dao_AbstractDAOFacade extends classes_dao_DAOFacade
{

   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }

}



?>