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

class lib_dao_libDAO extends classes_dao_AbstractDAO
{

   public $table = '';

   function __construct( ){
      require_once(APP_ROOT.'/'.str_replace('_',DS,'lib_config_DatabaseConfiguration').'.php');
      parent::__construct();
   }


   public function setConnString(){
      return lib_config_DatabaseConfiguration::getConn('lib');
   }

   public function setMdb2Conn(){
      return lib_config_DatabaseConfiguration::getConn('lib');
   }

   public function getConnInfo(){
      return lib_config_DatabaseConfiguration::getConnInfo('lib');
   }

   public function getListNames(){ }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from lib ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }





   function getPaises($cidadeCodigo=null){
      if(is_null($cidadeCodigo)){
         $sql = "select distinct codigo  ,  nome as descricao   from pais order by nome ";
         $res = $this->execute($sql);
         return $res->getAssoc() ;
      }
      else{
         $sql = "select pais.codigo as codigo
                     from pais inner join estado on estado.pais_codigo = pais.codigo
                        inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,array($cidadeCodigo));
         return  $res->fields('codigo') ;
      }
   }



   function getEstados($pais_codigo , $cidadeCodigo=null ){
      if(is_null($cidadeCodigo)){
         $sql = "
            select distinct estado.codigo as codigo  ,  estado.nome as descricao
            from estado inner join pais on pais.codigo = estado.pais_codigo
            where pais.codigo = ?
            order by estado.nome ";
         $res = $this->execute($sql,array($pais_codigo));
         return $res->getAssoc() ;
      }
      else{
         $sql = "select estado.codigo as codigo
                     from estado
                        inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,array($cidadeCodigo));
         return  $res->fields('codigo') ;
      }
   }



   function getEstadosDoBrasil(){
      $sql = " select sigla as codigo , nome as descricao from estado where pais_codigo = 1 order by nome asc ";
      $res = $this->execute($sql);
      if(empty($res)){
         throw new Exception('Sql error. '.$sql);
      }
      return $res->getAssoc() ;
   }




   function getCidades($estado_codigo){
      $sql = "select codigo, nome from cidade where estado_codigo = ? order by nome asc ; ";
      $res = $this->execute($sql,array($estado_codigo));
      return $res->getAssoc() ;

   }


   function getPaisesAn($codigo=null){
      if(is_null($codigo)){
         $sql = "select distinct codigo  ,  nome as descricao   from pais order by nome ";
         $res = $this->execute($sql);
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select avos_naturalidade from lib where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         $cidadeCodigo  = $res->Fields('avos_naturalidade');

         if(is_null($cidadeCodigo) || $cidadeCodigo==0 ){
            return null;
         }

         $sql = "select pais.codigo as codigo
                     from pais inner join estado on estado.pais_codigo = pais.codigo
                        inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,$cidadeCodigo);
         return  $res->fields('codigo') ;
      }
   }



   function getEstadosAn($pais_codigo , $codigo=null ){
      if(is_null($codigo)){
         $sql = " select codigo as codigo , nome as descricao from estado where pais_codigo = ? order by nome asc ";
         $res = $this->conn->execute($sql,array($pais_codigo));
         if(empty($res)){
            throw new Exception('Sql error. '.$sql);
         }
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select avos_naturalidade from lib where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         $cidadeCodigo  = $res->Fields('avos_naturalidade');

         if(is_null($cidadeCodigo) || $cidadeCodigo==0 ){
            return null;
         }

         $sql = "select estado.codigo as codigo
                     from estado  inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,$cidadeCodigo);
         return  $res->fields('codigo') ;
      }
   }




   function getCidadesAn($estado_codigo,$codigo=null){
      if(is_null($codigo)){
         $sql = "select codigo, nome from cidade where estado_codigo = ? order by nome asc ; ";
         $res = $this->conn->execute($sql,array($estado_codigo));
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select avos_naturalidade from lib where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         $return =  $res->Fields('avos_naturalidade');

         return ($return==0)?null:$return;

      }
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