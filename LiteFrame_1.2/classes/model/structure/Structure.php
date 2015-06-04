<?php
/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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

class  classes_model_structure_Structure extends classes_model_DBTable{

   public $col;
   public $idx;
   public $auto_inc_col;
   public $sql;
   public $formName;


   function __construct(){
      $this->setUpStructure();
   }



   function setInicialValues($colName,$value){
      $cols = $this->getCols();
      if(!key_exists('qf_type',$cols[$colName])){
         throw new Exception('Index not defined: "qf_type" ');
      }
      if($cols[$colName]['qf_type']=='select' || $cols[$colName]['qf_type']=='checkbox' || $cols[$colName]['qf_type']=='radio' || $cols[$colName]['qf_type']=='text' ){
         $this->setColAttribute($colName,'qf_vals',$value);
      }
      else{
         if(!empty($cols[$colName]['qf_attrs'])){
            $this->setColAttribute($colName,'qf_attrs',array_merge($cols[$colName]['qf_attrs'],array('value'=>"$value")));
         }
         else{
            $this->setColAttribute($colName,'qf_attrs',array('value'=>"$value"));
         }
      }
   }



   function getCols(){
      return $this->col;
   }

   function getTable(){
      return $this->table;
   }

   function getIdx(){
      return $this->idx;
   }

   function getAutoIncCol(){
      return $this->auto_inc_col;
   }

   function getFormName(){
      if(isset($this->formName)){
         return $this->formName;
      }
      else{
         throw new Exception('Form not found in Structure');
      }
   }


   function getForm(array $colums=null,string $array_name=null,array $args=array() , $clientValidate=null,array $formFilters=null){
      return parent::getForm($colums,$array_name,$args,$clientValidate,$formFilters);
   }



   function getColAttribute($colName,$attribute){
      $cols = $this->getCols();
      return $cols[$attribute];
   }

   function setColAttribute($colName,$attribute,$value){
      $this->col[$colName][$attribute]=$value;
   }


   function getSearchFields(){
      return (isset($this->searchFields))?$this->searchFields:null;
   }


   function getHtml(){
      return $this->html;
   }


   function getLabels(){
      foreach ($this->fields as $key=>$field ){
         $op[] = $field['label'];
      }

      return $op;
   }




}


?>