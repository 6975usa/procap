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

class login_login_model_structure_loginListStructure extends classes_model_structure_AbstractStructure
{

   function __construct(){
      parent::__construct();
   }


   function setUpStructure(){

      $this->listName = 'loginList' ;
      $this->listTemplate = APPLICATIONS_ROOT.'/login/view/templates/loginList.tpl' ;

      $this->dao = 'login_dao_loginDAO';

      $this->listTitle = 'Produtos';
      $this->displayOptions=array(
         'tableClass'   => 'campo',
         'titleClass' => 'item3',
         'trClasses'   => array(0=>'item1',1=>'item2'),
         'trClassSwitch'   => 'item5',
      );

      $this->searchFields = array('produto','preco_compra','preco_venda','product_sku');
      $this->fields = array(
            'product_sku'=>array(
               'label'=>'SKU',
               ),
            'produto'=>array(
               'label'=>'Produto',
               ),
            'preco_compra'=>array(
               'label'=>'Compra',
               ),
            'envio'=>array(
               'label'=>'Envio',
               ),
            'outros_custos'=>array(
               'label'=>'Outros Custos',
               ),
            'custo_total'=>array(
               'label'=>'Total',
               ),
            'preco_venda'=>array(
               'label'=>'Venda',
               ),
            );

      $this->links =
         array(
            'produto'=>array(
               'fields'=>array('product_id','product_price_id'),
               'target'=>'',
               'action'=>'',
            ),
            'preco_compra'=>array(
               'fields'=>array('product_id','product_price_id'),
               'target'=>'',
               'action'=>'',
            ),
         );

   }
}



?>