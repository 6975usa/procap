<?php
try{

   $server_ip = ip2long(gethostbyname($_SERVER['SERVER_NAME']) );

   if ( ((($server_ip & 0xFF000000) >> 24) == 127)  ) {
      //LOCAL
      define('SERVER_ADDR','local');
      define('DEBUG_ALLOWED',true);
      ini_set('display_errors','on');
      error_reporting(E_ALL ^ E_STRICT ^ E_DEPRECATED );
   }
   else{
      //REMOTE
      define('SERVER_ADDR','remote');
      define('DEBUG_ALLOWED',false);
      ini_set('display_errors','off');
   }




   /** USER RIGHTS */
   //require_once 'nivelAcesso.php';

   /** GLOBAL CONSTANTS */
   require_once 'custom/globalConstants.inc.php';
   require_once 'custom/logConstants.inc.php';

   /** INCLUDE DIRECTORY */
   set_include_path(  
   //get_include_path().
   	PATH_SEPARATOR.SHARE_ROOT
   .PATH_SEPARATOR.APPLICATIONS_ROOT
   .PATH_SEPARATOR.PEAR_ROOT
   .PATH_SEPARATOR.CLASSES_ROOT.'/adodb'
   );

   /** GLOBAL FUNCTIONS */
   require_once SHARE_ROOT.'/functions/functions.php';

   /** AUTOLOAD */
   require_once 'init/autoLoad.php';

   /** ERROR HANDLER  */

}
catch(Exception $e){
   print_r($e);
}

?>