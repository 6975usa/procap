<?php

/**
 * Este arquivo é parte do programa LiteFrame - lightWeight FrameWork
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

require_once 'Pager.php' ;


class classes_model_Pager extends Pager
{

   private $query;
   private $pageSelectBox;
   public $dao;
   protected $listStructure;
   protected $controller;
   private $pager;

   function __construct($dao,$listStructure,$controller){
      $this->dao = $dao ;
      $this->listStructure = $listStructure;
      $this->controller = $controller;
   }


   function getListStructure(){
      return $this->listStructure;
   }

   public function makeDefaults() {

      $this->paginar($this->listStructure);

      //$this->createLink();

      /** LINKAR PARA NOVO REGISTRO */
      $this->setLinkNovo();

      /** ATIVAR DISPOSITIVO DE BUSCA */
      $this->ativarDispositivoBusca();

      /** ESCOLHE O NR DE REGISTROS POR PAGINAS */
      $this->setPerPageSelectBox();

      /** CRIA OS LINKS DE NAVEGAããO */
      $this->setNavLinks() ;

   }



   function ativarDispositivoBusca(){
      $value = ( isset( $_GET['find_txt'] ) ) ? $_GET['find_txt'] : null ;

      $oc = ' onClick="document.location.href=\''.$this->getRequestParams('get','find_txt').'&find_txt=\'   + document.getElementById(\'find_txt\').value"';
      $form = "<input type=text id=find_txt name=find_txt size=10 value='$value' title='Procurar'>
               <input type=submit class=bt_search align='absmiddle' value='OK' $oc  title='Procurar' >";
      $this->find = $form;

   }


   function getRequestParams($method,$avoid=null){
      switch ($method) {
         case 'get':
            $request = $_GET;
            break;

         case 'post':
            $request = $_POST;
            break;

         case 'request':
            $request = $_REQUEST;
            break;

         default:
            throw new Exception('method not implemented in this function. Please try get or post.');
            break;
      }
      $op='';
      foreach ($request as $key=>$value){
         if($key != $avoid){
            $op .= '&'.$key.'='.$value;
         }
      }

      return '?'.substr($op,1);

   }



   public function setNavLinks(){
      $ppsb = $this->pager->getPageSelectBox(array('autoSubmit'=>true));
      $ppsb =  str_replace($this->pager->_url , '' , $ppsb);
      $ppsb = str_replace('<select name="pageID"','<select name="pageID" id="pageID"',$ppsb);
      //pr($this->pager->_url);
      $ln = str_replace("<b>".$this->pager->getCurrentPageID()."</b>",$ppsb,$this->pager->links);
      $ln= str_replace('href="'.$this->pager->_url,'href="',$ln);
      //pr($this->pager->links);
      $ln .=  " (".$this->pager->numItems()." Registros)" ;
      $this->links = $ln;
      return true;
   }


   public function setLinks(){
      $this->pager['links'] = $this->pager->links . " (".$this->pager->numItems()." Registros)  [".$this->pager->numPages()." páginas]"  ;
   }


   public function  getEnv(){
      return $this->_env ;
   }

   /**
   * Cria o objeto $pager com todas as informacoes sobre a paginacao
   * e popula o array  $_data que contem todos os dados que swerao paginados
   *
   * @param string $sql sql da consulta ao banco de dados
   * @param int $totalRows numero de linhas da consulta
   * @param object $conn conexao com o banco de dados
   *
   * @return object $pager
   *
   */  //$sql,$totalRows,$conn
   public  function paginar(){

      $regPerPage = (isset($_GET['setPerPage'])) ? $_GET['setPerPage'] : REGISTRIES_PER_PAGE ;

      $params = array(
      'mode'       => NAV_METHOD,
      'perPage'    => $regPerPage,
      'delta'      => NAVS,
      'prevImg'    => PREV_IMG,
      'nextImg'    => NEXT_IMG,
      'firstPageText' => FIRST_PAGE_TEXT ,
      'lastPageText' => LAST_PAGE_TEXT,
      'spacesAfterSeparator' => SPACES_AFTER_SEPARATOR ,
      'spacesBeforeSeparator' => SPACES_BEFORE_SEPARATOR ,
      'totalItems'   => $this->dao->getTotalRows($this->listStructure),
      );



      $this->pager = & parent::factory($params);

      //cria array com os dados da consulta
      list($from, $to) = $this->pager->getOffsetByPageId();


      //set the OFFSET and LIMIT clauses for the following query
      $this->dao->mdb2Conn->setLimit($params['perPage'], $from - 1);



      $sql = $this->dao->getListSelect($this->listStructure) ;

      if(DEBUG_SQL)pr($sql);

      $this->data = $this->dao->mdb2Conn->queryAll($sql, null, MDB2_FETCHMODE_ASSOC,false,false,false);

      if (PEAR::isError($this->data)) {
         throw new classes_SystemException($this->data);
      }


      //substituindo os valores nulos por espaco:
      foreach($this->data as $k1=>$v){
         foreach($v as $k2=>$d){
            if($d=='')
            $this->data[$k1][$k2] = '&nbsp';
         }
      }

      return true  ;


   }



   /*
   public  function makePageLinks($env){
   //cria array com os links de paginacao
   self::$_links = self::$_pager->links;
   }
   */


   public  function getLinkNovo(){
      return (isset($this->_env['novo'])) ? $this->_env['novo'] : null ;
   }



   public  function setLinkNovo(){
      //$this->insertName =  (isset($name)) ? $name  : DEFAULT_INSERT_TITLE  ;
      //$this->insertLink =  (isset($target)) ? $target  : DEFAULT_INSERT_LINK  ;
      return true ;
   }


   /*
   function editLink($linkAt='id',$linkTo='id',$target){

   foreach($this->_env['data'] as $k=>$f ){
   $this->_env['data'][$k]['link']  =
   "<a href='".$target."?pageID=".$this->_env['pager']->getCurrentPageID()."&id=".$this->_env['data'][$k][$linkTo]."'>"
   .'editar'
   ."</a>" ;
   }

   // botando a posicao de edicao para frente
   foreach($this->_env['data'] as $k=>$f ){
   array_unshift( $this->_env['data'][$k]  , $this->_env['data'][$k]['link'] ) ;
   unset($this->_env['data'][$k]['link']);
   }

   }
   */

   function createLink(){

      foreach($this->data as $k=>$f ){
         $tihs->data[$k][$this->dao->list['link_at']]  =
         "<a href='".$this->dao->list['target']."?pageID=".$this->pager->getCurrentPageID()."&id=".$this->data[$k][$this->dao->list['link_to']]."'>"
         .$this->data[$k][$this->dao->list['link_at']]
         ."</a>" ;
      }
      return true ;
   }



   public  function setPageSelectBox($find=null){
      return $this->pager->getPageSelectBox(array('autoSubmit'=>true));
   }



   public  function setPerPageSelectBox(){

      //$p = str_replace('<select ','<select onChange="javascript:submit()" ',$this->getPerPageSelectBox($start = 2 ,100, $step = 2 ,$showAllData = true  ) );
      /*      <select name="setPerPage">*/
      $sb = $this->pager->getPerPageSelectBox(2,100,2 ,true);

      $oc = 'id="setPerPage" title="Registros por página" onchange="document.location.href=\''.$this->getRequestParams('get','setPerPage')
      .'&setPerPage=\' + this.options[this.selectedIndex].value';
      $oc .= '"  ';

      $sb = str_replace('<select ','<select '.$oc,$sb);
      $this->perPageSelectBox = $sb;
   }




   public function getOnChange(){
      $str = 'onchange="document.location.href=\'?setPerPage='.$this->pager->_perPage.'&pageID='.$this->pager->_currentPage;
      if(isset($_GET['find_txt'])){
         $str .= '&find_txt='.urlencode($_GET['find_txt']);
      }
      $str .= '\'"  ';
      return $str;
   }




   function getVar($varName){
      return $this->$varName;
   }




   function getHtml($template){
      $list = new classes_view_ListTemplateIt($this->controller);
      $list->make($this->listStructure,$template);
      return $list->getList();
   }


   function setController($controller){
      $this->controller=$controller;
   }


   function createTitles($labels){
      //pr($labels,false);
      foreach ($labels as $key=>$label){
         $labels[$key]='<a href="'. $this->getRequestParams('get','order_field').'&order_field='.$label.'" >'.$label.'</a>';
      }
      return $labels;
   }


}




?>