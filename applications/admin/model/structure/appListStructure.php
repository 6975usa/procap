<?php

/**
 * Este arquivo Г© parte do programa LiteFrame - lightWeight FrameWork
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

class admin_model_structure_appListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'appList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/admin/templates/appList.tpl' ;

      $this->dao = 'admin_dao_appDAO';

      $this->listTitle = 'AplicaГ§Гµes';

      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('name','description');
      $this->fields = array(
            'name'=>array(
               'label'=>'Nome',
               ),
            'description'=>array(
               'label'=>'Descriзгo',
               ),
            );

      $this->links =
         array(
            'name'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>