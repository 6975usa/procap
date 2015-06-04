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
class classes_controller_AccessParams {


   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
   }



   function getParams($authMethod){
      switch ($authMethod) {
      	case 'post':
      		return $this->getParamsByPost();
      		break;

      	default:
      	   throw new Exception('Authentication method does not exist: '.$authMethod);
      		break;
      }
   }




   private function getParamsByPost(){
//       if (SERVER_ADDR=='local') {
         //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_ADMIN);
         $dadosLogin = array('LOGIN','1271','SGT_ANSELMO','51','SOLSV',LEVEL_SUPERVISOR);
         //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_MAINTENANCE);
         //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_SUPERUSER);
         //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_USER);

//       }
//       else{
//          if(!isset($_SERVER['dadoslogin'])) {
//             if(!isset($_POST['dadoslogin'])){
//                $this->controller->getAccess()->unsetSessionVars();
//                echo('There is no POST available from LOGIN.');die;
//             }
//             $_SERVER['dadoslogin'] = explode("|",hexbin2($_POST['dadoslogin'])) ;
//          }
//          $dadosLogin = $_SERVER['dadoslogin'];
//       }

      return $dadosLogin ;

   }


}
?>
