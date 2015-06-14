<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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


class procap_view_pecaView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/header_2.tpl' );
      //$this->assign('menu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/menu.tpl' );
      //$this->assign('leftmenu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/leftmenu.tpl' );
      //$this->assign('footer',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/footer.tpl' );

      $this->assign('desc_html', $this->controller->getEnv()->desc_html );
      
      $this->assign('_list',APP_ROOT.'/procap/templates/pecaList.tpl' );
      $this->assign('_form',APP_ROOT.'/procap/templates/pecaForm.tpl' );


      $this->display(APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultBody_2.tpl');

   }



}



?>