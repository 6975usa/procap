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

class procap_model_structure_agendaListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'agendaList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_agendaDAO';

      $this->listTitle = 'Agenda';
      $this->displayOptions=array(
         'tableClass'   => 'showlist',
         'titleClass' => 'titulo',
         'trClasses'   => array(0=>'item1',1=>'item1'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('inicio_data','termino_data','conclusao_data','descricao','numero','nome','tipo','andamento_id' , 'cliente','contraparte');
      $this->fields = array(
            'inicio_data'=>array(
               'label'=>'Inнcio',
               ),
            'termino_data'=>array(
               'label'=>'Tйrmino',
               ),
            'conclusao_data'=>array(
               'label'=>'Conclusгo',
               ),
            'descricao'=>array(
               'label'=>'Descriзгo',
               ),
	     'numero'=>array(
               'label'=>'Processo',
               ),
            'nome'=>array(
               'label'=>'Pessoa',
               ),
            'tipo'=>array(
               'label'=>'Tipo',
               ),
            'andamento_id'=>array(
               'label'=>'',
               ),
            'termino'=>array(
               'label'=>'termino',
               ),
            'hoje'=>array(
               'label'=>'hoje',
               ),
            'cliente'=>array(
               'label'=>'cliente',
               ),
            'contraparte'=>array(
               'label'=>'contraparte',
               ),
            );

      $this->links =
         array(
            'termino_data'=>array(
               'fields'=>array('id'),
               'target'=>'', 
               'action'=>'',
            ),
            'numero'=>array(
               'fields'=>array(array('id','processo')),
               'target'=>'',
               'action'=>'/procap/procap/processo/',
               'list'=>'processoList'
            ),
         );

   }
}



?>