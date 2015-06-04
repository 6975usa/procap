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
class classes_view_FormView extends classes_AbstractTemplateIt {


   function __construct($controller, $env,$template){
      $this->tpl = $template;
      parent::__construct($controller, $env);
   }


   function execute(){

      $this->loadTplFile($this->tpl);

      //$this->assign('list',$this->controller->env->list);

      //$this->display();

   }



}



?>