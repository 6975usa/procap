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


class pesquisa_model_structure_ouvirFormStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
      $this->setActivitiesArray();
   }


   function setUpStructure(){


      $this->formName = 'ouvirForm' ;

      $this->table = 'ouvir';

      $this->dao = 'pesquisa_dao_ouvirDAO';

      $this->col = array(

      'recursos' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Recursos',
      'qf_type'  => 'textarea',
      'qf_attrs' =>
         array(
         'rows' => 4,
         'cols' => 40
         ),
      'qf_rules' =>
         array(
         //'required' => 'n�o pode ser vazio',
         ),
      ),


      'outros_ambientes' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Outros: ',
      'qf_type'  => 'text',
      ),

      'outros_meios' => array(
      'type' => 'varchar',
      'size' => 200,
      'form'=>true,
      'validate'=>true,
      'qf_label'=>'Outros: ',
      'qf_type'  => 'text',
      ),


      );



      $this->idx = array(
      'nome' => 'primary',
      );

      $this->auto_inc_col = 'nome';


   }


   function setActivitiesArray() {

      $optionsMaker = new pesquisa_classes_optionsMaker();


      $arr = array('casa','amigo','teatro','festa','bar');
      $label = array(
         'casa'=>'Em sua casa',
         'amigo'=>'Em casa de amigos',
         'teatro'   =>'Em teatro ou audit�rios',
         'festa'   =>'Em festas populares',
         'bar'   =>'Em bares',
      );
      $col = $optionsMaker->makeOptions($arr,$label);
      $this->col = array_merge($col,$this->col);




      $arr = array('am','fm','mp3','cd','lp','internet','tv','video','cinema');
      $label = array(
         'am'=>'R�dio AM',
         'fm'=>'R�dio FM',
         'cd'=>'CD',
         'lp'=>'LP',
         'internet'=>'Internet',
         'tv'=>'Televis�o',
         'video'=>'V�deo',
      );
      $col = $optionsMaker->makeOptions($arr,$label);
      $this->col = array_merge($col,$this->col);




      $elements = array(
         'tempo_viola'=>array(
            '0'=>'Mais que uma hora',
            '1'=>'At� uma hora',
            '2'=>'Entre uma e duas horas',
            '3'=>'Entre duas e quatro horas',
            '4'=>'Quatro horas ou mais',
         ),
      );
      $col = $optionsMaker->makeRadios($elements,$label);
      $this->col = array_merge($col,$this->col);


      $elements = array(
         'tempo_outros_generos'=>array(
            '4'=>'Muito',
            '3'=>'Bastante',
            '2'=>'Meio a meio',
            '1'=>'Pouco',
            '0'=>'Quase nada',
         ),
      );
      $col = $optionsMaker->makeRadios($elements,$label);
      $this->col = array_merge($col,$this->col);


   }


}



?>