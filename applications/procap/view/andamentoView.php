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


class procap_view_andamentoView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/header_2.tpl' );
      //$this->assign('menu',APP_ROOT.'/procap/templates/menu.tpl' );
      //$this->assign('leftmenu',APP_ROOT.'/procap/templates/leftmenu.tpl' );
      //$this->assign('footer',APP_ROOT.'/procap/templates/footer.tpl' );

      $this->assign('_list',APP_ROOT.'/procap/templates/andamentoList.tpl' );
      $this->assign('_form',APP_ROOT.'/procap/templates/andamentoForm.tpl' );

      $this->assign('pastaProcesso', $this->controller->env->pastaProcesso );
      $this->assign('desc_html', $this->controller->env->desc_html );

      $this->display(APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultBody_2.tpl');

   }



}



?>