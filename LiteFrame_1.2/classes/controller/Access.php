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
class classes_controller_Access
{

   private  $userId;
   private  $userName;
   private  $systemId;
   private  $systemName;
   private  $accessLevel;

   private $accessParams;
   private $controller;
   private $registryFile;

   function __construct(classes_controller_SystemController $controller){
      $this->controller = $controller;
      require_once(SHARE_ROOT.'/classes/controller/AccessParams'.'.php');
      $this->accessParams = new classes_controller_AccessParams($this->controller);
   }


   /**
    *
    * @param array $acesso
    *
    */
   function verify(){
      $allowedApps = applications_AllowedAplications::getAllowedApplications();
      $appName = $this->controller->getApplication()->getName() ;
      $authMethod = $allowedApps[$appName]['authMethod'];

      if(! ($appName == 'login' || $authMethod=='none') ){
         $appParams = $this->accessParams->getParams($authMethod);
         $this->verifyByAuthMethod($appParams,$authMethod);
      }

   }



   function verifyByAuthMethod($appParams,$authMethod){

      switch ($authMethod) {
         case 'post':
            $this->verifyByPost($appParams);
            break;

         default:
            throw new Exception('Define authentication method.');
      }

   }



   function verifyByPost($appParams){
      $acesso = $appParams;
      if( !(is_array($acesso) && $acesso[0] == 'LOGIN') ){
         $this->denny('Access dennied.');
      }
      else{
         $params['userId']=$acesso['1'];
         $params['userName'] = $acesso['2'];
         $params['systemId'] = $acesso['3'];
         $params['systemName'] = $acesso['4'];
         $params['accessLevel'] = $acesso['5'];
         $this->setAccessParams($params);
      }
   }




   function setAccessParams(array $params){
      $this->userId = $params['userId'];
      $this->userName = $params['userName'];
      $this->systemId = $params['systemId'];
      $this->systemName = $params['systemName'];
      $this->accessLevel = $params['accessLevel'];
   }



   public function getLevel(){
      return $this->accessLevel;
   }


   public function setNivelAcessoPagina($nivel){
      if( $this->accessLevel > $nivel ){
         require_once SYSTEM_TEMPLATES_DIR.'/AccessDenied.tpl';
         rodape();
         die;
      }
   }



   function denny($motivo=null){
      //$this->unsetSessionVars();
      $file = file_get_contents(dirname(__FILE__).'/../../classes/view/templates/AccessDenied.tpl');
      $file = str_replace('##MOTIVO##',$motivo,$file);
      die($file);
      //header('Location: '.$_SERVER['PHP_SELF'].'?target=/login/');
   }


   function unsetSessionVars() {
      $vars = array('$this->controller','$_POST','$_GET','$_SESSION','$_COOKIE','$_ENV','$this');
      foreach ($vars as $var ){
         if(isset($var))unset($var) ;
      }
   }


   public function setNivelIndefinido(){
      throw new Exception('Usu�rio indefinido!!!');
   }


   public function getUserId(){
      return $this->userId ;
   }


   public function getUserName(){
      return substr($this->userName,strpos($this->userName,'_')+1) ;
   }


   public function getPgAndUserName() {
      return $this->userName ;
   }

   function registry($msg,$registryFile){
      if($this->debug){
         error_log($msg  . "\n", 3, $file);
         //error_log($msg.'/n;',3,$file);
      }
   }


   function setRegistryFile($file){
      $this->registryFile = $file ;
   }

}
?>