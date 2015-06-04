<?php

/**
 * Este arquivo пїЅ parte do programa LiteFrame - lightWeight FrameWork
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

class admin_model_structure_actionListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'actionList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/admin/templates/actionList.tpl' ;

      $this->dao = 'admin_dao_actionDAO';

      $this->listTitle = 'Actions';

      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('application_id','name','menuname','menulevel1','menulevel2','description');
      $this->fields = array(
            'application_id'=>array(
               'label'=>'Aplicaзгo',
               ),
            'name'=>array(
               'label'=>'Action',
               ),
            'accesslevel'=>array(
               'label'=>'Acesso',
               ),
            'inmenu'=>array(
               'label'=>'Menu',
               ),
            'menulevel1'=>array(
               'label'=>'Menu 1',
               ),
            'menulevel2'=>array(
               'label'=>'Menu 2',
               ),
            'menuname'=>array(
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