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

class pesquisa_dao_aprenderDAO extends classes_dao_AbstractDAO
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
      if(!$rs){
         throw new Exception('Next Id value error');
      }
      $res = $rs->getAssoc();
      return $res['nextval'];
   }


}



?>