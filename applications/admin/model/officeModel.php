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


class admin_model_officeModel extends classes_model_AbstractModel {



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




   function getOfficeUsers($officeId){
      return  $this->facade->getDAO('admin_dao_officeDAO')->getOfficeUsers($officeId);
   }


   function getApps($officeId){
      $apps =  $this->getApplications();
      $officeApps =   $this->facade->getDAO('admin_dao_appDAO')->getOfficeApps($officeId);

      foreach ($apps as $key1=>$app ){
         if(!empty($officeApps)){
            foreach ($officeApps as $officeApp ){
               if( in_array($app['id'] , $officeApp )){
                  $apps[$key1]['user_in'] = true;
               }
            }
         }
      }
      return $apps;
   }

   function getApplications(){
      return $this->facade->getApplications();
   }



}


?>