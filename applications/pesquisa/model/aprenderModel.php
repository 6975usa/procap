<?php

/**
 * Este arquivo Ã© parte do programa LiteFrame - lightWeight FrameWork
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


class pesquisa_model_aprenderModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidator') ;

      $this->setMakeCRUD(false) ;

      $this->form->addElement('submit', 'MM_insert', 'Próximo');


      if(!$this->isNewRecord()) {
         if(!$this->form->validate()){
            foreach($this->form->_errors as $elementName=>$errorMsg){
               $this->form->getElement($elementName)->setAttribute('class','error');
               $this->form->_errors[$elementName]='<div class="error">'.$errorMsg.'</div>';
            }
         }
      }

   }




   function formValidator($fields) {

      $ret = true ;


      return $ret ;

   }



}


?>