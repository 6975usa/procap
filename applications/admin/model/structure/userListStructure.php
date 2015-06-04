<?php

/**
 * Este arquivo й  parte do programa LiteFrame - lightWeight FrameWork
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

class admin_model_structure_userListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'userList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/admin/templates/userList.tpl' ;

      $this->dao = 'admin_dao_userDAO';

      $this->listTitle = '';

      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('loginname','fullname','office','active','creation_date','description','email');
      $this->fields = array(
            'fullname'=>array(
               'label'=>'Nome',
               ),
            'loginname'=>array(
               'label'=>'Login',
               ),
            'office'=>array(
               'label'=>'Escritуrio',
               ),
            'active'=>array(
               'label'=>'Ativo',
               ),
            'creation_date'=>array(
               'label'=>'Criado em',
               ),
            'description'=>array(
               'label'=>'Descriзгo',
               ),
            'email'=>array(
               'label'=>'Email',
               ),
            );

      $this->links =
         array(
            'fullname'=>array(
               'fields'=>array('id','office_id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>