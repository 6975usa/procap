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


class procap_model_relatorioModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

   }


   function getUltimosAndamentos($clienteId){
      $uas = $this->facade->getUltimosAndamentos($clienteId);

      foreach ($uas as $key=>$ua ){
         $uas[$key]['pecas'] = $this->getPecasDeAndamento($ua['andamento_id']);
      }

      return $uas ;
   }




   function getPecasDeAndamento($andamentoId){
      return $this->facade->getPecasDeAndamento($andamentoId);
   }




   function getClientes($officeId){
      return $this->facade->getClientes($officeId);
   }




   function getClienteNome($clienteId){
      return $this->facade->getClienteNome($clienteId);
   }



}


?>