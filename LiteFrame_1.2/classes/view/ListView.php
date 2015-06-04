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
class classes_view_ListView extends classes_AbstractTemplateIt {


   function __construct($controller, $env){
      parent::__construct($controller, $env);
   }


   function execute(){
      $this->loadTplFile('list.tpl');


      $this->assign('list',$this->env->list);
      $this->display();

   }

}



?>