<?php

/** RECEBE DADOS DE ACESSO DO SISTEMA LOGIN */


if (SERVER_ADDR=='localhost') {
   //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_ADMIN);
   //$_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','SOLSV',LEVEL_SUPERVISOR);
   //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_MAINTENANCE);
   //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_SUPERUSER);
   //    $_SESSION['dadosLogin'] = array('LOGIN','1271','SGT_ANSELMO','51','PS',LEVEL_USER);

}
else{
   if(isset($_POST['dadoslogin']))
   {
      $_SESSION['dadosLogin'] = explode("|",hexbin2($_POST['dadoslogin'])) ;
   }
   elseif( !isset($_SESSION['dadosLogin']) )
   {
      require_once SHARE_ROOT.'/classes/view/templates/AccessDenied.tpl';
      die;
   }
}


?>
