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


class classes_dao_DBConfig extends classes_dao_AbstractDatabaseConfiguration   {




   /**
    * Function to get a MDB2 database connection object
    *
    * @param string $dao
    * @return object
    */
   public static function getConn($dao){

      //return parent::_connect(self::getConnInfo($dao));

   }


   /**
    * array with the parameters to database access
    *
    * @param string $dao
    * @return array
    */
   public static function getConnInfo($dao){
      if(SERVER_ADDR=='local'){
         return self::getLocalConnInfo($dao);
      }
      else{
         return self::getRemoteConnInfo($dao);
      }

   }




   /**
    * array with the parameters to database access
    *
    * @param string $dao
    * @return array
    */
   public static function getRemoteConnInfo($dao){
      switch ($dao) {

         case null:
         case '':
            throw new Exception('dao not defined: '.$dao);
            break;

         default:
            return
            array(
            'phptype'=>'mysql',
            'username'=>'procap',
            'password'=>'KNMzX2TaUfhJWR49',
            'hostspec'=>'localhost',
            'database'=> 'procap'
            );
            break;
      }
   }




   /**
    * array with the parameters to Local database access
    *
    * @param string $dao
    * @return array
    */
   public static function getLocalConnInfo($dao){
      switch ($dao) {

         case null:
         case '':
            throw new Exception('dao not defined: '.$dao);
            break;

         default:
            return
            array(
            'phptype'=>'mysql',
            'username'=>'procap',
            'password'=>'KNMzX2TaUfhJWR49',
            'hostspec'=>'localhost',
            'database'=> 'procap'
            );
            break;
      }
   }


}



?>
