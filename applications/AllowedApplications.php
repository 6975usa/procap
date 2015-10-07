<?php


class applications_AllowedAplications {

   static protected $allowedApplications = array(
      'pesquisa'     =>array('authMethod'=>'post'),
      'login'     =>array('authMethod'=>'post'),
      'admin'     =>array('authMethod'=>'post'),
      'procap'     =>array('authMethod'=>'post'),
      );


   static function getAllowedApplications(){
      return self::$allowedApplications;
   }

}


