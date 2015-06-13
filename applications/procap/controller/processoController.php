<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
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
class procap_controller_processoController extends classes_controller_AbstractSystemController {

    function __construct($controller) {
        $this->controller = $controller;
    }

    function execute() {

        $model = new procap_model_processoModel($this->controller);


        $form = $model->getForm(new procap_model_structure_processoFormStructure(), 'client');
        if ($form) {
            $form->getElement('office_id')->setValue($this->controller->user->getProperty('office_id'));
            $this->controller->env->processoNumero = $form->getElement('numero')->getValue();
        } else {
            $this->controller->env->processoNumero = null;
        }

        /*      Impedindo a mudanca do numero do processo */
        //if(!empty($form)  && $this->controller->getAction()->getCrudAction() != 'new' ){
        //$form->getElement('numero')->freeze();
        //}
        $this->controller->env->forms['processoForm'] = $form;

        $processoList = $model->getList(new procap_model_structure_processoListStructure());
        $this->controller->env->lists['processoList'] = $processoList;

        if (isset($_GET['find_txt'])) {
            $this->controller->env->find_txt = $_GET['find_txt'];
        } else {
            @$processoList->find = str_replace('size=10', 'size="60"', $processoList->find);
            $this->controller->env->find_txt = null;
        }




        /* Definindo template */
        $this->controller->env->processoCodigo = null;
        $action = $this->controller->getAction()->getCrudAction();
        //pr($action ,false ) ;
        if ($action == 'new' || ($action == 'insert' && !$model->crudValidate() )) {
            $this->controller->env->formTemplate = APP_ROOT . '/procap/templates/processoFormNew.tpl';
        } else {
            $this->controller->env->formTemplate = APP_ROOT . '/procap/templates/processoForm.tpl';
            if ($form) {
                $this->controller->env->processoCodigo = $form->getElement('id')->getValue();
            }
        }

        $view = new procap_view_processoView($this->controller, $this->env);
    }

}

?>
