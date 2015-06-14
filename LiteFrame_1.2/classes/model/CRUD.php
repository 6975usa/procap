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
class classes_model_CRUD {

   private $newRegistryMsg=null ;
   private $lsUpdateMsg=null;
   private $crudValidate;


   function CRUD(array $cols){


      // INSERTING REGISTRY
      if($this->controller->getAction()->isInsert() ){
         if( $this->crudValidate() ){
            $cols = $this->setPkVals($this->formStructure,$cols);
            if( in_array('beforeInsert',get_class_methods($this->dao)) ){
               $res = $this->dao->beforeInsert($this->formStructure,$cols,$this->controller->getMessages());
            }
            else{
               $res = true;
            }
            if( $res===true ) {
               $this->controller->getMessages()->addSuccessMessage(  $this->dao->insert($this->formStructure,$cols) );
               if( in_array('afterInsert',get_class_methods($this->dao)) ){
                  $this->dao->afterInsert($this->formStructure,$cols,$this->controller->getMessages());
               }
            }
         }
         else{
            $this->controller->getMessages()->addErrorMessage(INSERT_FAILURE);
         }
      }



      // UPDATING REGISTRY
      elseif( $this->controller->getAction()->isUpdate() ){
         if(  $this->crudValidate()  ){
            if( in_array('beforeUpdate',get_class_methods($this->dao)) ){
               $res = $this->dao->beforeUpdate($this->formStructure,$cols,$this->controller->getMessages());
            }
            else{
               $res = true;
            }
            if( $res===true) {
               $this->controller->getMessages()->addSuccessMessage(  $this->dao->update($this->formStructure,$cols) );
               if( in_array('afterUpdate',get_class_methods($this->dao)) ){
                  $this->dao->afterUpdate($this->formStructure,$cols,$this->controller->getMessages());
               }
            }
         }
         else{
            $this->controller->getMessages()->addErrorMessage(UPDATE_FAILURE);
         }
      }




      // EDITING REGISTRY THAT CAME FROM LIST
      elseif( $this->controller->getAction()->isLsUpdate() ){
         $this->controller->getMessages()->addSuccessMessage(  $this->lsUpdateMsg );
      }




      //DELETING REGISTRY
      elseif( $this->controller->getAction()->isDelete() ){
         if( $this->crudValidate() ) {
            if( in_array('beforeDelete',get_class_methods($this->dao)) ){
               $res = $this->dao->beforeDelete($this->formStructure,$cols,$this->controller->getMessages());
            }
            else{
               $res = true ;
            }
            if( $res===true  ){
               $this->controller->getMessages()->addSuccessMessage(  $this->dao->delete($this->formStructure,$cols) );
               if( in_array('afterDelete',get_class_methods($this->dao)) ){
                  $this->dao->afterDelete($this->formStructure,$cols,$this->controller->getMessages());
               }
            }
         }
         else{
            $this->controller->getMessages()->addErrorMessage(DELETE_FAILURE);
         }
      }



      // NEW REGISTRY
      else{
         $types = Array('group','hidden'.'reset','checkbox','file','image','password','radio','select','hiddenselect','text','textarea','advcheckbox','date','static','html','hierselect','autocomplete');
         foreach ($this->form->_elements as $element){
            if(in_array($element->_type,$types)){
               $element->setValue(null);
            }
         }
         $this->controller->getMessages()->addSuccessMessage(  $this->newRegistryMsg );
      }


   }




   //SETTING UP THE PRIMARY KEYS OF THE TABLE
   function setPkVals($formStructure,$cols){
      foreach ($formStructure->idx as $pkName=>$type){
         $value = $this->dao->getNextIdVal($pkName);
         $cols[$pkName] = $value;
         $element = $this->form->getElement($pkName);
         if(PEAR::isError($element)){
            throw new Exception('"'.$pkName . '" does not exist in Structure.');
         }
         $this->form->getElement($pkName)->setValue($value);
      }
      return $cols;
   }


   function setNewRegistryMsg($msg){
      $this->newRegistryMsg = $msg;
   }


   function setLsUpdateMsg($msg){
      $this->lsUpdateMsg = $msg;
   }


   function setInsertSuccessMsg($msg){
      $this->dao->setInsertSuccessMsg($msg);
   }

   function setUpdateSuccessMsg($msg){
      $this->dao->setUpdateSuccessMsg($msg);
   }


   function setDeleteSuccessMsg($msg){
      $this->dao->setDeleteSuccessMsg($msg);
   }



   function  crudValidate(){
      if(!isset($this->crudValidate)){

         $formRulesValidate = $this->formRulesValidate();

         $validate = $this->form->validate() ;

         $JsCalendarValidate =  $this->JsCalendarValidate();

         $verifyPostValues = $this->verifyPostValues();

         if( $JsCalendarValidate && $formRulesValidate  && $validate  && $verifyPostValues ){
            $this->crudValidate = true;
         }
         else{
            $this->crudValidate = false;
         }
      }
      return $this->crudValidate ;
   }


}

?>