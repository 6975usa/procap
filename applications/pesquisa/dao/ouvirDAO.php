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

class pesquisa_dao_ouvirDAO extends classes_dao_AbstractDAO
{

   public $table = '';

   function __construct( ){
      parent::__construct();
   }


   public function setConnString(){
      return pesquisa_config_DatabaseConfiguration::getConn('pesquisa');
   }

   public function setMdb2Conn(){
      return pesquisa_config_DatabaseConfiguration::getConn('pesquisa');
   }

   public function getConnInfo(){
      return pesquisa_config_DatabaseConfiguration::getConnInfo('pesquisa');
   }

   public function getListNames(){
      return  array(
      'pesquisaList' => "
            select
               product_price_id  ,
               price.product_id as product_id ,
               product_name as produto,
               product_price as preco_venda,
               product_price_compra as preco_compra,
               product_custo_envio as envio,
               product_outros_custos as outros_custos,
               (product_price_compra + product_custo_envio + product_outros_custos) as custo_total,
               product_sku
            from  lm_vm_product_price as price
               inner join lm_vm_product as product  on product.product_id = price.product_id
            order by product_sku
               "
               );
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from lm_vm_product_price ";
      $rs = $this->conn->query($sql);
      $res = $rs->getAssoc();
      return $res['nextval'];
   }



   function beforeInsert($formStructure,$formValues,$messages){
      return true;
   }

   function beforeUpdate($formStructure,$formValues,$messages){
      $this->conn->execute($sql);
      //$messages->AddSuccessMessage('before update realizado com sucesso');
      return true;
   }

   function afterUpdate($formStructure,$formValues,$messages){
      //$this->conn->execute($sql);
      //$messages->AddSuccessMessage('after update realizado com sucesso');
      return true;
   }


   function getPaises(){
      $sql = "select distinct country_id as codigo  , country_name as descricao  from lm_vm_country order by country_name ";
      $res = $this->conn->execute($sql);
      return $res->getAssoc() ;
   }



   function getEstados($country_id){
      $sql = "select distinct state_id as codigo  , state_name as descricao  from lm_vm_state where country_id = ? ";
      $res = $this->conn->execute($sql,array($country_id));
      return $res->getAssoc() ;
   }



   function getProductName(){
      $sql = "            select
               price.product_id as codigo,
               product_name as descricao
            from  lm_vm_product_price as price
               inner join lm_vm_product as product  on product.product_id = price.product_id
            ";
      $res = $this->conn->execute($sql);
      return $res->getAssoc() ;
   }




   function getProductInfo($product_id){
      $sql = " select product.* ,
               price.product_price,
               price.product_price_compra,
               price.product_custo_envio,
               price.product_outros_custos,
               price.product_id as codigo,
               product_name as descricao
            from  lm_vm_product_price as price
               inner join lm_vm_product as product  on product.product_id = price.product_id
            where product.product_id = ? ";
      $res = $this->conn->execute($sql,$product_id);
      return $res->getRowAssoc() ;
   }



}



?>