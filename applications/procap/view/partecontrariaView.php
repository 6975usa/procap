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


class procap_view_partecontrariaView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/header.tpl' );
      $this->assign('menu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/menu.tpl' );
      $this->assign('leftmenu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/leftmenu.tpl' );
      $this->assign('footer',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/footer.tpl' );


      $this->assign('mostrar_pessoa_fisica',$this->controller->env->request['mostrar_pessoa_fisica'] );
      $this->assign('mostrar_pessoa_juridica',$this->controller->env->request['mostrar_pessoa_juridica'] );
      $this->assign('mostrar_endereco',$this->controller->env->request['mostrar_endereco'] );
      $this->assign('mostrar_escolha',$this->controller->env->request['mostrar_escolha'] );

      $this->assign('_list',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' );

      $this->assign('_form', $this->controller->env->request['template'] );


      $this->display(APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultBody.tpl');

   }



}



?>