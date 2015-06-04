<?php

/**
 * Este arquivo e parte do programa LiteFrame - lightWeight FrameWork
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

abstract class classes_smarty_abstractSystemSmarty extends classes_smarty_systemSmarty
{

   public function __construct($controller)
   {
      parent::__construct($controller);
      $this->execute();
   }

   abstract function  execute();

}


?>