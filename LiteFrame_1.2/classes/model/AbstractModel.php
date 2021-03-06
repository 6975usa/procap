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

abstract class classes_model_AbstractModel extends classes_model_Model {

   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   //abstract function formStructureConfiguration($formName);

   abstract function formConfiguration();
   //abstract function listConfiguration();


}



?>