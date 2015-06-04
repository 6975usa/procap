<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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

class procap_model_structure_advogadoListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'advogadoList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_advogadoDAO';

      $this->listTitle = 'Advogados';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('tratamento_id','nome','estadocivil_id','nascimento','nacionalidade','identidade','profissao','cpf','cnpj','nome_fantasia','loginname');
      $this->fields = array(
            'nome'=>array(
               'label'=>'Nome',
               ),
            'oab'=>array(
               'label'=>'OAB',
               ),
            'cpf'=>array(
               'label'=>'CPF',
               ),
            'loginname'=>array(
               'label'=>'Nome de Login',
               ),
            );

      $this->links =
         array(
            'nome'=>array(
               'fields'=>array('id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>