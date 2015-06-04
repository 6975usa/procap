<?php

class pesquisa_classes_formValidator{


   function validateOptions($env , $form , array $elements , $fields , $fieldName=null , $msg=null ){

      $return = 1 ;

      foreach($elements as $elemento){
         if (!empty($fields[$elemento]) ){
            if(!empty($fields[$elemento.'_posicao'])){
               if($fields[$elemento.'_posicao']<0 ){
                  $env->formErrorMessages[$elemento] = '<div class="error">Pelo menos 1</div>' ;
                  $form->getElement($elemento.'_posicao')->setAttribute('class','error') ;
                  $return = 0;
               }
            }
            else{
               $env->formErrorMessages[$elemento] = '<div class="error">&nbsp;Defina o quanto gosta</div>' ;
               $form->getElement($elemento.'_posicao')->setAttribute('class','error') ;
                  $return = 0;
            }
         }
         else{
            //pr($fields,false);
            if(!empty($fields[$elemento.'_posicao']) || $fields[$elemento.'_posicao']==='0'){
               $form->getElement($elemento.'_posicao')->setValue(null);
            }
         }
      }

      //verifica se pelo menos uma ambiente foi escolhida
      if(!is_null($fieldName)){
         $empty = true;
         foreach($elements as $elemento){
            if (!empty($fields[$elemento]) ){
               $empty = false;
            }
         }
         if($empty && empty($fields[$fieldName]) ){
            $env->formErrorMessages[$elemento] =
               '<div class="error">'.$msg.'</div>' ;
                  $return = 0;
         }
      }

      return $return ;

   }



}

?>