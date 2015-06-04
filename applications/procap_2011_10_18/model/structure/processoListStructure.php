<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
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

class procap_model_structure_processoListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'processoList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_processoDAO';

      $this->listTitle = 'Processos';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('id','numero','pasta','status','fase','acao','rito'
         ,'objeto','tribunal','condicao','distribuicao_data'
         ,'valorcausa','valorrepercussaoeconomica'
         ,'cliente','partecontraria'
         ,'vara','tribunal'
          );
      $this->fields = array(
            'numero'=>array(
               'label'=>'Número',
               ),
            'cliente'=>array(
               'label'=>'Cliente',
               ),
            'partecontraria'=>array(
               'label'=>'Parte Contrária',
               ),
            'vara'=>array(
               'label'=>'Vara',
               ),
            'tribunal'=>array(
               'label'=>'Tribunal',
               ),
            'fase'=>array(
               'label'=>'Fase',
               ),
            );

      $this->links =
         array(
            'numero'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>