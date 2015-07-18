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
require_once 'HTML/Template/IT.php' ;

class classes_view_TemplateIt extends HTML_Template_IT
{

   private $pager;
   public $templateDir;
   public $insertLink=true;
   public $insertName=false;
   public $tableTitle=null;
   public $buildTable=null;
   public $controller;
   public $env;

   function __construct($controller){
      $this->controller = $controller;
      //pr($this->controller);
      //$this->templateDir = $controller->appTemplateDir;
      parent::__construct($this->templateDir);
      $this->execute();
   }



   function execute(){

   }

   function loadTplFile($template){
      if(!file_exists($template)){
         throw new Exception('Template not Found: '.$template);
      }
      try{
         $this->template = $template;
         parent::loadTemplatefile($template, true, true);
      }
      catch (Exception $e){
         throw new classes_SystemException("Template load error: ".$e->getMessage());
      }
   }





   function makeDataTable($listStructure) {
      $dados = $this->controller->pager->getVar('data');
      if(!empty($dados)) {
         foreach($dados as $k=>$fields) {
            $this->setVariable("TR_CLASS", 'item'.($k%2+1) ) ;
            foreach($fields as $fieldName=>$value) {
               if(key_exists($fieldName,$listStructure->links)){
                  $value = $this->buildLink($fieldName,$fields,$listStructure->links,$listStructure);
               }
               //$this->setCurrentBlock("cell") ;
               $this->setVariable(strtolower($fieldName), $value) ;
               //$this->parseCurrentBlock("cell") ;
            }
            $this->parse("row");
         }
      }
   }




   /* Cria o link para chamar o formulario correspondente*/
   function buildLink($fieldName,$fields,$listStructure,$list){
      $f='';
      foreach ($listStructure[$fieldName]['fields'] as $field){
         $f .=  ",'$field','".$fields[$field]."'";
      }
      $f = substr($f,1);
      if(!key_exists('target',$listStructure[$fieldName]) || empty($listStructure[$fieldName]['target'])){
         $listStructure[$fieldName]['target']='null';
      }
      if(!key_exists('action',$listStructure[$fieldName]) || empty($listStructure[$fieldName]['action'])){
         $listStructure[$fieldName]['action']='null';
      }
      $str = "<a href=# onClick=\"javascript:linkSubmit(Array(".$f."),".$listStructure[$fieldName]['target'].",".$listStructure[$fieldName]['action'].",'post','".$list->listName."','lsUpdate')\">".$fields[$fieldName]."</a>";
      return $str;

   }



   function makeInsertLink(){
      //seta o link para NOVO registro
      if($this->insertLink===true) {
         $this->setVariable("INSERT_LINK",DEFAULT_INSERT_LINK ) ;
         $this->setVariable("INSERT_TITLE", DEFAULT_INSERT_TITLE ) ;
      }
      else{
         $this->setVariable("INSERT_LINK", $this->insertLink ) ;
         $this->setVariable("INSERT_TITLE", $this->insertName ) ;
      }
   }



   function makeFind(){
      $find = $this->controller->pager->getVar('find');
      if( !empty($find) ) $this->setVariable("FIND", $find ) ;
   }




   function makePageSelectBox(){
      //seta campo de busca
      $pageSelectBox = $this->controller->pager->getVar('pageSelectBox');
      if( isset($pageSelectBox) ) $this->setVariable("PAGE_SELECT_BOX", $pageSelectBox ) ;
   }



   function makePerPageSelectBox(){
      //seta escolha de numero de registros a exibir
      $perPageSelectBox = $this->controller->pager->getVar('perPageSelectBox');
      if( isset($perPageSelectBox) ) $this->setVariable("PER_PAGE_SELECT_BOX", $perPageSelectBox ) ;
   }



   function loadColTitle($listStructure){
      $query = $this->controller->pager->getVar('query');

      $sql = $this->controller->pager->dao->getListSelect($listStructure);
      $rs = $this->controller->pager->dao->mdb2Conn->query($sql);
      $cols = $rs->getColumnNames();

      foreach($cols  as $colName=>$val) {
         $colName=strtoupper($colName);
         $link = file_get_contents(SYSTEM_TEMPLATES_DIR.'/link.tpl');
         $subs = array(
         'href'=>'#',
         'class'=>'',
         'name'=>$colName,
         'id'=>$colName,
         'title'=>'Ordenar por '.$colName,
         'content'=>$colName,
         );
         foreach ($subs as $tag=>$value){
            $link = str_replace('##'.strtoupper($tag).'##',$value,$link);
         }
         //$this->setCurrentBlock("tit_cell") ;
         $this->setVariable("tit_".strtolower($colName), $link) ;
         //$this->parseCurrentBlock("tit_cell") ;
      }
   }



   function loadTableTitle(){
      $this->setCurrentBlock("title_row") ;
      $this->setVariable("TABLE_TITLE", 'Tãtulo da Tabela') ;
      $this->parseCurrentBlock("title_row") ;
   }



   function loadPageTitle($tit=GLOBAL_TITLE){
      $this->setVariable("PAGE_TITLE", $tit ) ;
   }



   function load_css(){
      //carrega a variavel de css da pagina
      $this->setVariable("CSS", $this->_css_path.$this->_css ) ;
   }



   function makeTableFooterLink(){
      //carrega a variavel de links no rodape da tabela
      $this->setCurrentBlock("link_cell") ;
      $links = $this->controller->pager->getVar('links') ;
      if(isset($links))  $this->setVariable("LINK_DATA", $links ) ;
   }


   function buildTable(){

      $this->makeDataTable();

      $this->makeInsertLink();

      $this->loadTableTitle();

      $this->makeFind();

      $this->loadColTitle();

      $this->makeTableFooterLink();

      $this->makePageSelectBox();

      $this->makePerPageSelectBox();

   }


   function display(){
      $this->show();
   }



   function setJsCalendar(){
      if(isset($this->controller->getEnv()->jscalendar) && ($this->controller->getEnv()->jscalendar)>0){
         foreach ($this->controller->getEnv()->jscalendar as $elementName=>$code){
            $this->assign($elementName.'_jscalendar',$code);
         }
      }
   }



   function setVar( $varName,$value){
      $this->$varName=$value;
   }



   /**
     * Print a certain block with all replacements done.
     * @brother get()
     */
   function getList($block = '__global__')
   {
      return $this->get($block);
   } // end func show



   function assign($var,$value){
      $this->setVariable($var,$value);
   }


}
?>

