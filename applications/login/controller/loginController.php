<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since   1.0
 * @author  Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright  2010 Anselmo S Ribeiro
 * @licence LGPL
 */


class login_controller_loginController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){

      $model = new login_model_loginModel($this->controller);

      if($this->controller->getAction()->getCrudAction() == 'list'){
         $this->controller->getAction()->setCrudAction('new');
      }

      $form =  $model->getForm( new login_model_structure_loginFormStructure() ,'client' );

      if($this->controller->getAction()->getCrudAction()=='insert'){
         if($model->crudValidate()){

            $sessionId = classes_utils_session::generateSessionId();
            $userId = $this->controller->getUser()->getUserIdByName($_POST['name'],$_POST['office']);

            $this->controller->getUser()->login($sessionId , $userId);

            //classes_utils_cookies::writeSessionCookie($sessionId);
            classes_utils_session::writeSessionId($sessionId,$userId, $_COOKIE['PHPSESSID']);

         	$this->controller->loger->log(LOGIN_SUCCESS);
            classes_utils_jsFunctions::carregaFormViaPostParaUrl(SITE_ROOT.'/procap/default/',array('LITEFRAMESESSIONID'=>$sessionId));

            die;
         }
         else{
         	$this->controller->loger->log(LOGIN_FAILURE);
         }
      }

      $form->getElement('MM_insert')->setValue('Entrar');

      $this->controller->getEnv()->forms['loginForm'] =  $form;

      $view = new login_view_loginView($this->controller,$this->getEnv());

   }

}
?>
