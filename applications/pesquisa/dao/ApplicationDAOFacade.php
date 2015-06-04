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

class pesquisa_dao_ApplicationDAOFacade extends classes_dao_AbstractDAOFacade
{

   function __construct( classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   function getProductInfo($product_id){
      return $this->getDao('pesquisa_principal_dao_principalDAO')->getProductInfo($product_id);
   }

   function getSaidas($entradaId){
      return $this->getDao('pesquisa_material_dao_materialDAO')->getSaidas($entradaId);
   }

   function getSecao($secId){
      return $this->getDao('pesquisa_dao_cadmilDAO')->getSec($secId);
   }

   function getMateriais(){
      return $this->getDao('pesquisa_material_dao_materialDAO')->getMateriais();
   }

   function getDescricaoDeMaterial($id){
      //pr($this->getDao('pesquisa_material_dao_materialDAO')->getDescricaoDeMaterial($id));
      return $this->getDao('pesquisa_material_dao_materialDAO')->getDescricaoDeMaterial($id);
   }


   function getPaises(){
      return $this->getDao('pesquisa_dao_pesquisaDAO')->getPaises();
   }



   function getEstados($country_id){
      return $this->getDao('pesquisa_dao_pesquisaDAO')->getEstados($country_id);
   }




   function getCidades($estadoCodigo){
      return $this->getDao('pesquisa_dao_pesquisaDAO')->getCidades($estadoCodigo);
   }



}



?>