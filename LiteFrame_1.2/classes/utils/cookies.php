<?php
/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 * Class for user interface
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
final class classes_utils_cookies {

   static $cookieName = 'LITEFRAMESESSIONID' ;
   static $expires = 20 ; //time in seconds


   public static function writeSessionCookie($value){
      if(!setcookie(self::$cookieName,$value,null,SITE_ROOT.'/')){
         //throw new Exception('Cookies Failure');
      }
   }





   public static function getSessionCookie(){
      if(!empty($_COOKIE[self::$cookieName])){
         return $_COOKIE[self::$cookieName] ;
      }
   }



   public static function deleteSessionCookie($value){
      setcookie(self::$cookieName,$value,time()-3600,null,null,null,true);
   }




}

?>