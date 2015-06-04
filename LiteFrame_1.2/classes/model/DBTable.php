<?php
/**
 * Este arquivo é parte do programa LiteFrame - lightWeight FrameWork
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
 */require_once('DB/Table.php');

class classes_model_DBTable extends DB_Table
{

   private $frm;

   function getForm($columns = null, $array_name = null, $args = array(), $clientValidate = null, $formFilters = null) {
      include_once 'DB/Table/QuickForm.php';
      $coldefs = $this->_getFormColDefs($columns);
      $this->frm = DB_Table_QuickForm::getForm($coldefs, $array_name, $args, $clientValidate, $formFilters);
      return $this->frm ;
   }





}



?>