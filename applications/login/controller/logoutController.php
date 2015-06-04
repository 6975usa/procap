<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since   1.0
 * @author  Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright  2010 Anselmo S Ribeiro
 * @licence LGPL
 */


class login_controller_logoutController extends  classes_controller_AbstractSystemController {

	function  __construct($controller){
		$this->controller = $controller;
	}

	function execute(){

		$this->controller->loger->log(LOGOUT_SUCCESS);

		$this->controller->user->logout();

	}

}
?>
