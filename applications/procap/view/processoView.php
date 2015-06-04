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


class procap_view_processoView extends classes_smarty_abstractSystemSmarty  {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->assign('header',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/header.tpl' );
      $this->assign('menu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/menu.tpl' );
      $this->assign('leftmenu',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/leftmenu.tpl' );
      $this->assign('footer',APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/footer.tpl' );

      $this->assign('processoNumero', $this->controller->env->processoNumero  );
      $this->assign('processoCodigo', $this->controller->env->processoCodigo  );
      $this->assign('defaultTheme', DEFAULT_THEME );


      $this->assign( 'permiteCustas' , $this->controller->user->actionIsAllowedToUser('procap','custas') );
      $this->assign( 'permiteListiconsortes' , $this->controller->user->actionIsAllowedToUser('procap','listiconsorte') );
      $this->assign( 'permiteAdvogados' , $this->controller->user->actionIsAllowedToUser('procap','processoadvogado') );
      $this->assign( 'permiteAndamentos' , $this->controller->user->actionIsAllowedToUser('procap','andamento') );
      $this->assign( 'permitePecas' , $this->controller->user->actionIsAllowedToUser('procap','peca') );
      
      $this->assign( 'find_txt' , $this->controller->env->find_txt  ) ;

      $this->assign('_list',APP_ROOT.'/procap/templates/processoList.tpl' );
      $this->assign('_form', $this->controller->env->formTemplate );

      $this->display(APP_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultBody.tpl');

   }



}



?>