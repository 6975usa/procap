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


class admin_model_actionModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->setInsertSuccessMsg('Inserido com Sucesso!!');
      $this->setUpdateSuccessMsg('Alterado com Sucesso!!');
      $this->setDeleteSuccessMsg('Excluído com Sucesso!!');
      $this->setNewRegistryMsg('');
      $this->setLsUpdateMsg('');



      $action  = $this->controller->getAction()->getCrudAction();
      switch ($action) {
         case 'insert':
         case 'update':
            if( !$this->crudValidate() ){
               foreach($this->form->_errors as $elementName=>$errorMsg){
                  $this->form->getElement($elementName)->setAttribute('class','error');
                  $this->form->_errors[$elementName]='<div class="error">'.$errorMsg.'</div>';
               }
            }
            break;

         default:
            break;
      }



   }


   function getGroups(){
      $groups = $this->facade->getDAO('admin_dao_groupsDAO')->getGroups();
      $actionGroups =  $this->facade->getDAO('admin_dao_actionDAO')->getactionGroups($this->controller->action->getProperty('id'));

      return $groups;
      //pr(array($groups,$actionGroups));

   }


}


?>