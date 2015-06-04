<?php

/** AUTOLOAD*/
function __autoload($class_name) {

   try {
      require_once(SYSTEM_ROOT.'/'.LITEFRAME_VERSION.'/classes/SystemException.php');

      $c = str_replace("_","/",$class_name).".php";

      $avoid = array(
      'MDB2_Driver_Common'=>'MDB2',
      );
      foreach ($avoid as $from=>$to){
         if($class_name == $from){
            $c = $avoid[$class_name].'.php';
         }
      }

      $incPaths = explode(PATH_SEPARATOR,get_include_path());

      foreach ($incPaths as $key=>$path){
         $file[$key] = $path.'/'.$c;
         if(file_exists($file[$key]) ){
            if(DEBUG_AUTO_LOAD){
               pr($file[$key],false) ;
            }
            require_once $file[$key] ;
            return true;
         }
      }

      pr($file,false) ;
      $msg = implode('<br>',$file);
      throw new Exception("File $class_name not Found in: <br>".$msg );


   }
   catch (Exception $e){
      throw new classes_SystemException($e);
   }
}




?>
