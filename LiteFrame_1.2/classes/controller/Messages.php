<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Messages setings object for entire application
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_Messages{

   private $messages=array();

   public function addErrorMessage($message) {
      $this->messages['error'][]=$message;
   }


   public function addSuccessMessage($message) {
      $this->messages['success'][]=$message;
   }


   public function getErrorMessages(){
      return (!empty($this->messages['error']))?$this->messages['error']:'';
   }

   public function getSuccessMessages(){
      return (!empty($this->messages['success']))?$this->messages['success']:'';
   }

   public function getMessages(){
      return $this->messages;
   }


}


?>