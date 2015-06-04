<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Environment setings object for entire application
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_controller_Environment{

   public $request = array() ;

   protected $internalVars = array(
   'setPerPage'=>array('int','nohtml'),
   'pageID'=>array('int','nohtml'),
   'find_txt'=>array('nosql','str'),
   'order_field'=>array('nosql','str','nohtml'),
   );


   protected $internalConstants = array(
   'MM_insert',
   'MM_update',
   'MM_delete',
   'MM_new',
   );




   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
   }


   function sanitizeMany($var,$type){
      if(is_array($var)){
         foreach ($var as $key=>$v ){
            $var[$key]=$this->sanitizeOne($v,$type);
         }
         return $var;
      }
      else{
         return $this->sanitizeOne($var,$type);
      }
   }


   public function sanitize() {

      /*
      Sanitizing Internal Vars
      */
      foreach ($this->internalVars as $var=>$types){
         foreach ($types as $type){
            if(isset($_POST[$var])){
               $sanitized = $this->sanitizeMany($_POST[$var],$type);
               $this->request['POST'][$var] = $_POST[$var] = $sanitized;
            }
            if(isset($_GET[$var])){
               $sanitized = $this->sanitizeMany($_GET[$var],$type);
               $this->request['GET'][$var] = $_GET[$var] = $sanitized;
            }
         }
      }
      if(isset($_POST['setPerPage']))$_GET['setPerPage']=$_POST['setPerPage'];
      if(isset($_POST['pageID']))$_GET['pageID']=$_POST['pageID'];
      if(isset($_POST['find_txt']))$_GET['find_txt']=$_POST['find_txt'];
      if(isset($_POST['order_field']))$_GET['order_field']=$_POST['order_field'];




      /*
      Sanitizing Internal Constants
      */
      foreach ($this->internalConstants as $intConst){
         if($intConst=='MM_delete' && !isset($_POST['action']) && isset($_POST[$intConst]) && $_POST[$intConst]==DELETE_BUTTON_LABEL){
            if(DEBUG_REQUEST){pr(array($_POST,$_GET,$_GET[$var]),false);}
            break;
         }
         if( (isset($_GET[$intConst]) && !isset($_GET['action'])) ||  (isset($_POST[$intConst]) && !isset($_POST['action']))  ){
            if(DEBUG_REQUEST){pr(array($_POST,$_GET,$_GET[$var]),false);}
            $this->controller->getAccess()->denny('Variable not allowed.');
         }
         if(isset($_POST[$intConst])){
            if(($_POST['action']!=$intConst)){
               if(DEBUG_REQUEST){pr(array($intConst,$this->internalConstants,$_POST,$_GET),false);}
               $this->controller->getAccess()->denny('Variable not allowed.');
            }
         }
         if(isset($_GET[$intConst])){
            if(($_GET['action']!=$intConst)){
               if(DEBUG_REQUEST){pr(array($_POST,$_GET,$_GET[$var]),false);}
               $this->controller->getAccess->denny('Variable not allowed.');
            }
         }

      }




      /*
      Sanitizing any other request var
      */
      $types = array('str','nosql');
      foreach ($_POST as $key=>$value){
         if(!in_array($_POST[$key],$this->internalVars) && !in_array($_POST[$key],$this->internalConstants) ){
            foreach ($types as $type){
               $value = $this->sanitizeMany($value,$type);
            }
            $_POST[$key]=$value;
         }
      }


      $this->request['POST']=$_POST;
      $this->request['GET']=$_GET;
      $this->request['REQUEST']=$_REQUEST;

   }





   protected function sanitizeOne($var, $type)

   {
      if(DEBUG_REQUEST) {echo "sanitizou $var => ";}

      switch ( $type ) {

         case 'int': // integer
         $var = (int) $var;
         break;



         case 'str': // trim string
         if(!is_array($var)){
            $var = trim ( $var );
         }
         $chars = array(
            '"'=>'&quot;',
            "'"=>'&#039;',
            '<'=>'&lt;',
            '>'=>'&gt;'
         );
         foreach ($chars as $char=>$val){
            $var = str_replace($char,$val,$var);
         }
         break;



         case 'nohtml': // trim string, no HTML allowed
         $var = htmlentities ( trim ( $var ), ENT_QUOTES );
         break;



         case 'plain': // trim string, no HTML allowed, plain text
         $var =  htmlentities ( trim ( $var ) , ENT_NOQUOTES )  ;
         break;



         case 'upper_word': // trim string, upper case words
         $var = ucwords ( strtolower ( trim ( $var ) ) );
         break;



         case 'ucfirst': // trim string, upper case first word
         $var = ucfirst ( strtolower ( trim ( $var ) ) );
         break;



         case 'lower': // trim string, lower case words
         $var = strtolower ( trim ( $var ) );
         break;



         case 'urle': // trim string, url encoded
         $var = urlencode ( trim ( $var ) );
         break;



         case 'trim_urle': // trim string, url decoded
         $var = urldecode ( trim ( $var ) );
         break;



         case 'telephone': // True/False for a telephone number
         $size = strlen ($var) ;

         for ($x=0;$x<$size;$x++)
         {
            if ( ! ( ( ctype_digit($var[$x] ) || ($var[$x]=='+') || ($var[$x]=='*') || ($var[$x]=='p')) ) )
            {
               return false;
            }
         }
         return true;
         break;



         case 'pin': // True/False for a PIN
         if ( (strlen($var) != 13) || (ctype_digit($var)!=true) )
         {
            return false;
         }
         return true;
         break;



         case 'id_card': // True/False for an ID CARD
         if ( (ctype_alpha( substr( $var , 0 , 2) ) != true ) || (ctype_digit( substr( $var , 2 , 6) ) != true ) || ( strlen($var) != 8))
         {
            return false;
         }
         return true;
         break;



         case 'nosql': // True/False if the given string is SQL injection safe
         $chars = array(
         'select'=>null,
         'insert'=>null,
         'update'=>null,
         'delete'=>null,
         'grant' =>null,
         'drop'  =>null,
         );
         foreach ($chars as $char=>$val){
            if(!is_array($var) && strstr($var,$char) ){
               $var=str_replace($char,$val,$var);
            }
         }
         return $var;
         break;

         default:
            throw new Exception('Choose any type.');

      }

      if(DEBUG_REQUEST){echo $var.' <br> ';}
      return $var;



   }



}


?>