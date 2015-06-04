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


class pesquisa_view_pesquisaView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/pesquisa/templates/header.tpl' );
      $this->assign('menu',APP_ROOT.'/pesquisa/templates/menu.tpl' );
      $this->assign('leftmenu',APP_ROOT.'/pesquisa/templates/leftmenu.tpl' );
      $this->assign('pesquisaList',APP_ROOT.'/pesquisa/templates/pesquisaList.tpl' );
      $this->assign('pesquisaForm',APP_ROOT.'/pesquisa/templates/pesquisaForm.tpl' );
      $this->assign('footer',APP_ROOT.'/pesquisa/templates/footer.tpl' );

      $this->display(APP_ROOT.'/pesquisa/templates/pesquisa.tpl');

   }



}



?>