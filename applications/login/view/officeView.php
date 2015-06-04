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


class login_view_officeView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/login/templates/header.tpl' );
      $this->assign('officeForm',APP_ROOT.'/login/templates/officeForm.tpl' );
      $this->assign('footer',APP_ROOT.'/login/templates/footer.tpl' );

      $this->assign('username',$this->controller->user->getProperty('loginname') );

      $this->display(APP_ROOT.'/login/templates/office.tpl');

   }



}



?>