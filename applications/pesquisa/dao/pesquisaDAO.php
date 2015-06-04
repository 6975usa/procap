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

class pesquisa_dao_pesquisaDAO extends classes_dao_AbstractDAO
{

   public $table = 'pesquisa';

   function __construct( ){
      require_once(APP_ROOT.'/'.str_replace('_',DS,'pesquisa_config_DatabaseConfiguration').'.php');
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
               codigo,nome,apelido
               ,date_format(nascimento,'%d/%m/%Y') as nascimento
               ,avos_instrumentos,nascimento2
               ,identidade,omb,registro_entidade,endereco1,endereco2,ddd_residencial,telefone_residencial
               ,ddd_comercial,telefone_comercial
               ,ddd_celular,telefone_celular,ddd_recado,telefone_recado,email1
               ,email2,paginas_internet,ser_violeiro,outras_atividades,ouvir,ouvir_posicao,aprender
               ,aprender_posicao,tocar,tocar_posicao,compor,compor_posicao,ensinar,ensinar_posicao,produzir
               ,produzir_posicao,elaborar,elaborar_posicao,pesquisar,pesquisar_posicao
               ,divulgar,divulgar_posicao,construir,construir_posicao,vender,vender_posicao,colecionar,colecionar_posicao
               ,gerir,gerir_posicao,louvar,louvar_posicao
               ,(select nome from cidade where codigo = naturalidade) as naturalidade
               ,avos_naturalidade
      from pesquisa
               "
               );
   }



   function getNextIdVal($pk){
      $sql = " select max($pk)+1 as nextval from pesquisa ";
      $rs = $this->execute($sql);
      if(empty($rs->fields['nextval'])){
         return '1';
      }
      return $rs->fields['nextval'];
   }





   function getPaises($codigo=null){
      if(is_null($codigo)){
         $sql = "select distinct codigo  ,  nome as descricao   from pais order by nome ";
         $res = $this->conn->execute($sql);
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select naturalidade from pesquisa where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         $cidadeCodigo  = $res->Fields('naturalidade');

         $sql = "select pais.codigo as codigo
                     from pais inner join estado on estado.pais_codigo = pais.codigo
                        inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,$cidadeCodigo);
         return  $res->fields('codigo') ;
      }
   }



   function getEstados($pais_codigo , $codigo=null ){
      if(is_null($codigo)){
         $sql = " select codigo as codigo , nome as descricao from estado where pais_codigo = ? order by nome asc ";
         $res = $this->conn->execute($sql,array($pais_codigo));
         if(empty($res)){
            throw new Exception('Sql error. '.$sql);
         }
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select naturalidade from pesquisa where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         $cidadeCodigo  = $res->Fields('naturalidade');

         $sql = "select estado.codigo as codigo
                     from estado  inner join cidade on estado.codigo = cidade.estado_codigo
                     where cidade.codigo = ?
                        ";
         $res = $this->execute($sql,$cidadeCodigo);
         return  $res->fields('codigo') ;
      }
   }




   function getCidades($estado_codigo,$codigo=null){
      if(is_null($codigo)){
         $sql = "select codigo, nome from cidade where estado_codigo = ? order by nome asc ; ";
         $res = $this->conn->execute($sql,array($estado_codigo));
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select naturalidade from pesquisa where codigo = ? ';
         $res = $this->execute($sql,$codigo);
         return  $res->Fields('naturalidade');

      }
   }


   function getPaisesAn($codigo=null){
      if(is_null($codigo)){
         $sql = "select distinct codigo  ,  nome as descricao   from pais order by nome ";
         $res = $this->conn->execute($sql);
         return $res->getAssoc() ;
      }
      else{
         $sql = ' select avos_naturalidade from pesquisa where codigo = ? ';
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
         $sql = ' select avos_naturalidade from pesquisa where codigo = ? ';
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
         $sql = ' select avos_naturalidade from pesquisa where codigo = ? ';
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