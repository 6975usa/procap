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
class classes_view_ListTemplateIt extends classes_view_TemplateIt
{

   function __construct( $controller){
      parent::__construct($controller);
      throw new Exception('chamou listTemplate');
   }


   function execute(){

   }


   function getHtml(){
      return $this->getList();
   }

   function make($listStructure,$template){

      try {

         $this->loadTplFile($template, true, true);

         $this->makeDataTable($listStructure);

         //$this->makeInsertLink($this->controller->pager);

         //$this->loadTableTitle('Ordens de Serviço');

         $this->makeFind($this->controller->pager);

         $this->loadColTitle($listStructure);

         $this->makeTableFooterLink($this->controller->pager);

         $this->makePageSelectBox($this->controller->pager);

         $this->makePerPageSelectBox($this->controller->pager);
      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }

      return true;

   }





   function loadTplFile($template){
      $this->templateDir='';
      if(!file_exists($template)){
         throw new Exception($template);
      }
      $this->template = $template;
      if(!parent::loadTemplatefile($template, true, true)){
         throw new Exception($this->err[0]->getmessage());
      }


   }



}
?>

