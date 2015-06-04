<?php

class pesquisa_classes_OptionsMaker {



   function makeOptions(array $elements,array $labels){

      $arr = $elements;

      $opCol = array();

      foreach($arr as $activity ){
         $qf_label = (!empty($labels[$activity])?$labels[$activity]:ucfirst($activity)) ;
         $col = array(

            $activity => array(
            'type' => 'varchar',
            'size' => 200,
            'form'=>true,
            'validate'=>true,
            'qf_label'=>$qf_label,
            'qf_type'  => 'checkbox',
            ),

            $activity .'_posicao' => array(
            'type' => 'varchar',
            'size' => 2,
            'form'=>true,
            'validate'=>true,
            'qf_label'=>'',
            'qf_type'  => 'text',
            'qf_attrs' =>
            array(
            'maxlength' =>  2,
            'size' => 2,
            ),
            'qf_rules' =>
            array(
            'numeric' => 'Use somente número',
            ),
            ),

         );
         $opCol = array_merge($opCol,$col);
      }

      return $opCol ;
   }



   function makeRadios(array $elements){

      $opCol = array();

      foreach($elements as $elementName=>$vals ){
         $col = array(
            $elementName => array(
            'type' => 'varchar',
            'size' => 200,
            'form'=>true,
            'validate'=>true,
            'qf_label'=>'',
            'qf_type'  => 'radio',
            'qf_vals'  =>$vals,
            'qf_rules' => array(
                  'required' => 'Escolha uma op&ccedil;ão',
               ),
            ),

         );
         $opCol = array_merge($opCol,$col);
      }

      return $opCol ;
   }



}

?>