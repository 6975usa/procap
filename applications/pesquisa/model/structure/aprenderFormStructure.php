<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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


class pesquisa_model_structure_aprenderFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
      $this->setActivitiesArray();
   }


   function setUpStructure(){


      $this->formName = 'aprenderForm' ;

      $this->table = 'aprender';

      $this->dao = 'pesquisa_dao_aprenderDAO';

      $this->col = array(

      'mestres' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'textarea',
      'qf_attrs' => array(
         'rows' => 4,
         'cols' => 40
         ),
      'qf_rules' => array(
         'required' => 'n�o pode ser vazio',
         ),
      ),


      'mestre_continua_estudo' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'textarea',
      'qf_attrs' => array(
         'rows' => 4,
         'cols' => 40
         ),
      'qf_rules' => array(
         //'required' => 'n�o pode ser vazio',
         ),
      ),


      'dificuldades_aprendizado' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'textarea',
      'qf_attrs' => array(
         'rows' => 4,
         'cols' => 40
         ),
      'qf_rules' => array(
         'required' => 'n�o pode ser vazio',
         ),
      ),


      'recurso_aprender_viola' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Nome',
      'qf_type'  => 'textarea',
      'qf_attrs' => array(
         'rows' => 4,
         'cols' => 40
         ),
      'qf_rules' => array(
         //'required' => 'n�o pode ser vazio',
         ),
      ),


      );



      $this->idx = array(
         '' => 'primary',
      );

      $this->auto_inc_col = '';


   }


   function setActivitiesArray() {

      $optionsMaker = new pesquisa_classes_optionsMaker();

      $elements = array(
         'tempo_aprender_viola'=>array(
            '0'=>'S� na �poca das festas populares',
            '1'=>'Uma vez por m�s',
            '2'=>'Uma vez por semana',
            '3'=>'Menos de uma hora por dia',
            '4'=>'Entre uma e duas horas por dia',
            '5'=>'Entre duas e quatro horas por dia',
            '6'=>'Quatro horas ou mais por dia',
         ),
      );
      $col = $optionsMaker->makeRadios($elements);
      $this->col = array_merge($col,$this->col);


   }


}



?>