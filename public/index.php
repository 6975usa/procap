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

//echo '<h2>Em Manute&ccedil;&atilde;o</h2>'; die('Por favor aguarde.');

define('LITEFRAME_VERSION'   ,'LiteFrame_1.2');

require_once(dirname(__FILE__).'/../'.LITEFRAME_VERSION.'/config/auto_prepend.inc.php');
try{
   require_once(dirname(__FILE__).'/../'.LITEFRAME_VERSION.'/classes/Singleton.php');
   $controller = classes_Singleton::getInstance('classes_controller_SystemController');

   $controller->run();

   $controller->runAction($controller->getAction()->getName());

}
catch (Exception $e){
   require_once(dirname(__FILE__).'/../'.LITEFRAME_VERSION.'/classes/SystemException.php');
   throw new classes_SystemException($e);
}

require_once(dirname(__FILE__).'/../'.LITEFRAME_VERSION.'/config/auto_append.inc.php');

?>