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

class procap_model_structure_custasListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'custasList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_custasDAO';

      $this->listTitle = 'Custas';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('processo','descricao','data','tipo','valor');
      $this->fields = array(
            'processo'=>array(
               'label'=>'Processo',
               ),
            'descricao'=>array(
               'label'=>'Descriзгo',
               ),
            'data'=>array(
               'label'=>'Data',
               ),
            'tipo'=>array(
               'label'=>'Tipo',
               ),
            'valor'=>array(
               'label'=>'Valor',
               ),
            );

      $this->links =
         array(
            'descricao'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>