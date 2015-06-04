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
class classes_SystemException extends Exception {

   public function __construct($e,$kill=true)
   {

      if(SERVER_ADDR == 'local'){
         //pr($e);
         //      $msg = "<h1>Admin Debug</h1>";
         $msg = "<link href='/static/framework/css/azul.css' rel='stylesheet' type='text/css'>";
         $msg .= "<h1>System Debug</h1>";
         $msg .= "<h3>".$e->getMessage()."</h3>";
         //$msg .= "Código : ".$e->getCode()."<br>";
         $msg .= "<br><h3>".$e->getFile().":".$e->getLine()."</h3>";
         //$msg .= "String : <b>".$e->__toString()."</b><br>";
         //$msg .= "Trace : <br>";
         echo $msg;

         //pr($e->getTraceAsString(),false);
         pr('<h3>'.$e->__toString(),$kill);
      }
      else{
         $file = file_get_contents(CLASSES_ROOT.'/view/templates/error.tpl');
         $file = str_replace('#PUBLIC_ROOT#',PUBLIC_ROOT,$file);
         $file = str_replace('#ERROR_MESSAGE#',DEFAULT_ERROR_MESSAGE,$file);
         if($kill){
            die($file);
         }
      }

   }


}
?>
