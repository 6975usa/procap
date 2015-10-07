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


class admin_view_groupsView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/admin/templates/header.tpl' );
      $this->assign('menu',APP_ROOT.'/admin/templates/menu.tpl' );
      $this->assign('leftmenu',APP_ROOT.'/admin/templates/leftmenu.tpl' );
      $this->assign('footer',APP_ROOT.'/admin/templates/footer.tpl' );

      $this->assign('groupsList',APP_ROOT.'/admin/templates/groupsList.tpl' );
      $this->assign('groupsForm',APP_ROOT.'/admin/templates/groupsForm.tpl' );


      $this->assign('actions', $this->controller->getEnv()->request['actions']  );



      $this->display(APP_ROOT.'/admin/templates/groups.tpl');

   }



}



?>