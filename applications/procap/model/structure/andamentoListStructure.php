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

class procap_model_structure_andamentoListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'andamentoList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_andamentoDAO';

      $this->listTitle = 'Andamentos';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('tipo','processo','processo_nr','fase','descricao','agenda','inicio_data','termino_data','conclusao_data','advogado');
      $this->fields = array(
            'descricao'=>array(
               'label'=>'Descrição',
               ),
            'inicio_data'=>array(
               'label'=>'Início',
               ),
            'termino_data'=>array(
               'label'=>'Término',
               ),
            'conclusao_data'=>array(
               'label'=>'Conclusão',
               ),
            'tipo'=>array(
               'label'=>'Tipo',
               ),
            'advogado'=>array(
               'label'=>'Advogado',
               ),
            'andamento_id'=>array(
               'label'=>'Peças',
               ),
            );

      $this->links =
         array(
            'data_inicio'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
            'descricao'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>