<?php

/**
 * Este arquivo ι  parte do programa LiteFrame - lightWeight FrameWork
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

class pesquisa_model_structure_pesquisaListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'pesquisaList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/pesquisa/templates/pesquisaList.tpl' ;

      $this->dao = 'pesquisa_dao_pesquisaDAO';

      $this->listTitle = 'pesquisa';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('nome','naturalidade','avos_instrumentos','nascimento','identidade','registro_entidade','endereco1','endereco2','telefone_residencial','ddd_comercial');
      $this->fields = array(
            'nome'=>array(
               'label'=>'Nome',
               ),
            'naturalidade'=>array(
               'label'=>'Descriηγ',
               ),
            'avos_instrumentos'=>array(
               'label'=>'5',
               ),
            'nascimento'=>array(
               'label'=>'nasc',
               ),
            'identidade'=>array(
               'label'=>'idt',
               ),
            'omb'=>array(
               'label'=>'omb',
               ),
            'registro_entidade'=>array(
               'label'=>'8',
               ),
            'endereco1'=>array(
               'label'=>'end1',
               ),
            'endereco2'=>array(
               'label'=>'end2',
               ),
            'ddd_residencial'=>array(
               'label'=>'ddd_res',
               ),
            'telefone_residencial'=>array(
               'label'=>'tel_res',
               ),
            'ddd_comercial'=>array(
               'label'=>'ddd_com',
               ),
            'telefone_comercial'=>array(
               'label'=>'tel_com',
               ),
/*            'ddd_celular'=>array(
               'label'=>'ddd_cel',
               ),
            'telefone_celular'=>array(
               'label'=>'tel_cel',
               ),
            'ddd_recado'=>array(
               'label'=>'ddd_rec',
               ),
            'telefone_recado'=>array(
               'label'=>'tel_rec',
               ),
            'email1'=>array(
               'label'=>'email1',
               ),
            'email2'=>array(
               'label'=>'email2',
               ),
            'paginas_internet'=>array(
               'label'=>'pοΏ½g',
               ),
            'ser_violeiro'=>array(
               'label'=>'ser v',
               ),
            'outras_atividades'=>array(
               'label'=>'atv',
               ),*/
            );

      $this->links =
         array(
            'nome'=>array(
               'fields'=>array('codigo'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>