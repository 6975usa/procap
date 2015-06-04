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

class procap_model_structure_pecaListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'pecaList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/pecaList.tpl' ;

      $this->dao = 'procap_dao_pecaDAO';

      $this->listTitle = 'Peзas';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('id','nome','descricao','andamento','arquivo','ad','termino');
      $this->fields = array(
            'descricao'=>array(
               'label'=>'Descriзгo',
               ),
            'andamento'=>array(
               'label'=>'Andamento',
               ),
            'inicio'=>array(
               'label'=>'Inнcio',
               ),
            'termino'=>array(
               'label'=>'Tйrmino',
               ),
            'arquivo'=>array(
               'label'=>'Arquivo',
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