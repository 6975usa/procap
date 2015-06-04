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


require_once(SHARE_ROOT.'/'.str_replace('_',DS,'classes_smarty_abstractSystemSmarty').'.php');
class pesquisa_view_ouvirView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      //$this->assign('header',BASE_ROOT.'/pesquisa/templates/header.tpl' );
      //$this->display(BASE_ROOT.'/pesquisa/templates/ouvir.tpl');

      $this->assign('header',APP_ROOT.'/pesquisa/templates/header.tpl' );
      $this->display(APP_ROOT.'/pesquisa/templates/ouvir.tpl');

   }



}



?>