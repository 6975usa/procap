<?php

/**
 * Este arquivo УЉ parte do programa LiteFrame - lightWeight FrameWork
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

class admin_model_structure_officeUsersListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'officeUsersList' ;

      //$this->listTemplate = APPLICATIONS_ROOT.'/admin/templates/defaultList.tpl' ;

      $this->dao = 'admin_dao_officeDAO';

      $this->listTitle = 'Usuсrios';

      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('loginname','fullname','active','description','email');
      $this->fields = array(
            'loginname'=>array(
               'label'=>'Nome de Login',
               ),
            'fullname'=>array(
               'label'=>'Nome',
               ),
            'active'=>array(
               'label'=>'Ativo',
               ),
            'description'=>array(
               'label'=>'Descriчуo',
               ),
            'email'=>array(
               'label'=>'Email',
               ),
            );

      $this->links =
         array(
            ''=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>