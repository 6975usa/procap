<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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
final class classes_utils_cripto  {

   private static $salt = '8&6%$rfhHYjhk%4@21+-M%6';
   private static $desafio="expressaodesafiobemcompridaparaatrapalharohacker";



   public static function createHash($str){
      return md5(sha1($str.self::$salt).self::$salt);
   }


   public static function code($var) {
      return base64_encode(self::$desafio . $var);
   }


   public static function decode($var) {
      //Extrai o desafio. O resto é o código do voluntario,
      return substr(base64_decode($var),strlen(self::$desafio));
   }



}

?>