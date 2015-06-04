
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
require_once 'MDB2.php';

class classes_dao_MDB2 extends MDB2_Driver_Common
{

   //static $conn ;

   static function getConn(){
      throw new Exception('chamou MDB2');

/*      if(empty(self::$conn)){
         self::$conn = $this->conectar();
      }
      return self::$conn;*/
   }


   function conectar()
   {

      throw new Exception('chamou MDB2');
      /*
      $mdb2 = MDB2::factory($this->dsn, $this->options);

      if (PEAR::isError($mdb2)) {
         die($mdb2->getMessage());
      }
*/
      return $mdb2;
   }







}




?>

