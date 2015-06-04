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

class procap_model_structure_orgaojudicialListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'orgaojudicialList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/procap/templates/'.DEFAULT_THEME.'/defaultList.tpl' ;

      $this->dao = 'procap_dao_orgaojudicialDAO';

      $this->listTitle = 'Órgão Judicial';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('nome','nomeabreviado','endereco','complemento','bairro','cidade','estado','cep','telefone1','telefone2','obs');
      $this->fields = array(
            'nome'=>array(
               'label'=>'Nome',
               ),
            'nomeabreviado'=>array(
               'label'=>'Abreviatura',
               ),
            'endereco'=>array(
               'label'=>'EndereÃ§o',
               ),
            'cidade'=>array(
               'label'=>'Cidade',
               ),
            'estado'=>array(
               'label'=>'UF',
               ),
            'telefone1'=>array(
               'label'=>'Telefone1',
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