<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since   1.0
 * @author  Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright  2010 Anselmo S Ribeiro
 * @licence LGPL
 */


class procap_controller_defaultController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){

      try {


         if(isset($_POST)){
            $_POST['agenda']=1;
         }

         if(isset($_GET)){
            if(!empty($_GET['semana_da_agenda'])){
               switch ($_GET['semana_da_agenda']) {
                  case 'atual':
                     $_GET['dia_da_agenda'] =  date('Y-m-d');
                     break;

                  case 'anterior':
                     //Diminuindo 7 dias
                     $_GET['dia_da_agenda'] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) - ( 7 * 24 * 60 * 60 ) );
                     break;

                  case 'proxima':
                     //Aumentando 7 dias
                     $_GET['dia_da_agenda'] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) + ( 7 * 24 * 60 * 60 ) );
                     break;

                  default:
                     break;
               }
               $_GET['dias'][] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) - ( 0 * 24 * 60 * 60 ) );
               $_GET['dias'][] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) + ( 6 * 24 * 60 * 60 ) );
            }
            else{
               if(empty($_GET['dia'])){
                  $_GET['dia_da_agenda'] = date('Y-m-d');
                  $_GET['dias'][] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) - ( 0 * 24 * 60 * 60 ) );
                  $_GET['dias'][] =  date('Y-m-d', strtotime($_GET['dia_da_agenda']) + ( 6 * 24 * 60 * 60 ) );
               }
               else{
                  $_GET['dia'] = changeDateMask($_GET['dia'],1);
               }
            }
         }
         $this->controller->env->dia_da_agenda = $_GET['dia_da_agenda'];



         $model = new procap_model_agendaModel($this->controller);


         //Preenchendo data de conclusao do andamento
         if(!empty($_POST['concluido'])){
            $andamentoId = $_POST['concluido'];
            $andamentoId = $this->controller->env->sanitizeMany($andamentoId,'int');
            $andamentoId = $this->controller->env->sanitizeMany($andamentoId,'nohtml');
            $andamentoId = $this->controller->env->sanitizeMany($andamentoId,'nosql');
            $model->marcarConclusaoAndamento($andamentoId);

         }



         $form =  $model->getForm( new procap_model_structure_agendaFormStructure('client' ) ) ;
         $this->controller->env->forms['agendaForm'] =  $form;

         $_GET['setPerPage'] = 1000 ;
         $agendaList =  $model->getList( new procap_model_structure_agendaListStructure() );
         $this->controller->env->lists['agendaList'] =  $agendaList ;
         unset($_GET['setPerPage']);

         if($agendaList){
            foreach ($agendaList->data as $key=>$data ) {
               if(! strstr($data['conclusao_data'],'/')){
                  $this->controller->env->lists['agendaList']->data[$key]['conclusao_data'] = null ;
               }
            }
         }

         $view = new procap_view_defaultView($this->controller,$this->env);

      }
      catch (Exception $e){
         throw new classes_SystemException($e);
      }
   }

}
?>
