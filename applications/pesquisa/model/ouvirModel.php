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


require_once(SHARE_ROOT.'/'.str_replace('_',DS,'classes_model_AbstractModel').'.php');
class pesquisa_model_ouvirModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){
      $this->form->addFormRule($this,'formValidator') ;

      $this->setMakeCRUD(false) ;

      $this->form->addElement('submit', 'MM_insert', 'Próximo');

      if(!$this->isNewRecord()) {
         $this->form->validate();
         foreach($this->form->_errors as $elementName=>$errorMsg){
            $this->form->getElement($elementName)->setAttribute('class','error');
            $this->form->_errors[$elementName]='<div class="error">'.$errorMsg.'</div>';
         }
      }

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

      $return = true;

      $validator = new pesquisa_classes_formValidator();

      //Validacao dos campos de item 15
      $elementos = array('casa','amigo','teatro','festa','bar');
      $return = $validator->validateOptions($this->controller->env , $this->form , $elementos , $fields , 'outros_ambientes' , 'Escolha pelo menos um ambiente<br> ou preencha o campo "Outros"' );


      //Validacao dos campos de item 16
      $elementos = array('am','fm','mp3','cd','lp','internet','tv','video','cinema');
      $return = $validator->validateOptions($this->controller->env , $this->form , $elementos , $fields , 'outros_meios' , 'Escolha pelo menos um meio de comunica&ccedil;ão<br> ou preencha o campo "Outros"' );

      return $return ;

   }


   function getPaises(){
      return $this->facade->getPaises();
   }



   function getEstados($country_id){
      return $this->facade->getEstados($country_id);
   }





}


?>