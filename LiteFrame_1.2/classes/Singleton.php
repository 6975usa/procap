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
class classes_Singleton
{



   /**
    * Object containing all the classes instances
    *
    * @var array
    */
   private static $instance = array() ;




   /**
    * Class to get allways the same instance of a class
    *
    * @param string $class .  The name of the class
    * @param string $params  the parameters to instanciate the new class
    * @return  object  .  The instace of the new class.
    */


   public static function getInstance(  $class,   $params=null )
   {

      if(file_exists(SHARE_ROOT.'/'.str_replace('_',DS,$class).'.php')){
         require_once(SHARE_ROOT.'/'.str_replace('_',DS,$class).'.php');
      }
      else{
         require_once(APP_ROOT.'/'.str_replace('_',DS,$class).'.php');
      }

      if ( class_exists ( $class ) ){
         if ( !isset(self :: $instance[$class]) || self :: $instance[$class] === NULL )    {
            self :: $instance[$class] = new $class($params) ;
         }
      }
      else{
         throw new Exception('Class does not exist: '.$class);
      }
      return self :: $instance[$class] ;
   }


}

?>