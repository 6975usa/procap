<?php

function debug($var,$kill=false){
   //       if (ALLOW_DEBUG) {
   if (is_array($var)) {
      pr($var);
   } else if (is_object($var)) {
      vd($var);
   } else if (is_null($var)) {
      print "variável vazia ou nula";
   } else {
      print $var;
   }
   //          print "<br>";
   if ($kill){
      die();
   }
   //       }
}




/**
 * Esta funçã server para fazer debug de variáveis
 * Ela mostra na tela da aplicaçã toda as informaçÃµes sobre a variável a ela passada
 *
 * @param mixed $var
 * @param boolean $kill
 *
 * @author Anselmo S Ribeiro
 */
function pr( $var , $kill=true){

   echo "<pre>";


   if(is_array($var)){
      /*      foreach ($var as $v){
      pr($v,false);
      }
      */
      print_r($var);
   }

   elseif(is_object($var)){

      echo "<h1>Classe: <font color=red>" ;
      print_r(get_class($var) );
      echo '</font></h1>';

      echo "<br>Classe Mãe: <font color=red>" ;
      print_r( get_parent_class($var) );
      echo '</font>';

      echo "<h3>Métodos:</h3>" ;
      print_r(get_class_methods($var));

      if(is_string($var)) {
         echo "<h3>Vaiáveis do Objeto</h3>" ;
         print_r( get_class_vars( $var) );
      }

      echo "<h3>Variáveis:</h3>" ;
      print_r(get_object_vars($var));

      echo "<h3>Dump:</h3>" ;
      //      var_dump( $var) ;

      echo "<h3>Classes declaradas:</h3>" ;
      print_r( get_declared_classes() );

      echo "<h3>Interfaces declaradas:</h3>" ;
      print_r( get_declared_interfaces() );

   }
   elseif($var === true){
      //echo "<h3>Booleano:</h3>" ;
      echo "true".'<br>';
   }
   elseif($var === false){
      //echo "<h3>Booleano:</h3>" ;
      echo "false".'<br>';
   }
   else{
      //echo "<h3>Variável simples:</h3>" ;
      echo $var.'<br>';
   }

   echo "</pre>";

   if($kill)
   die;
}

function vd($var){
   echo'<pre>';var_dump($var);echo'</pre>';
}





function tiracento($texto){
   $trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',);
   $porIsso =    array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y',);
   $titletext = str_replace($trocarIsso, $porIsso, $texto);
   return $titletext;
}



/**
 * Changes date masks from dd/mm/yyyy to yyy-mm-dd
 * and vice-versa
 *
 * $maskTipe:
 * 1 -> dd/mm/yyyy to yyy-mm-dd
 * 2 -> yyyy-mm-dd to dd/mm/yyyy
 *
 * @param string $date
 * @param integer $maskTipe
 */
function changeDateMask($date,$maskTipe){
   switch ($maskTipe) {
      case 1:
         return  substr($date,6,4).'-'.substr($date,3,2).'-'.substr($date,0,2);
         break;

      case 2:
         throw new Exception('Not Implemented yet.');
         break;

      default:
         return $date;
         break;
   }

}

?>
