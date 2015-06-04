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


class procap_view_defaultView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/header.tpl' );
      $this->assign('menu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/menu.tpl' );
      $this->assign('leftmenu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/leftmenu.tpl' );
      $this->assign('footer',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/footer.tpl' );

      $this->assign('_list', APP_ROOT.'/procap/templates/agendaList.tpl' );

      $this->assign('_form', APP_ROOT.'/procap/templates/agendaForm.tpl' );

      //variaveis de formulario
      $this->assign('dia_da_agenda', $this->controller->env->dia_da_agenda );
      $this->assign('request_uri', $_SERVER['REQUEST_URI'] );


      $this->display(APP_ROOT.'/procap/templates/agendaBody.tpl');

   }



}



?>