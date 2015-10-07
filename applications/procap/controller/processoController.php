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

    /**
     * @var classes_controller_SystemController
     */
    private $controller;

    function __construct(classes_controller_SystemController $controller) {
        $this->controller = $controller;
    }

    function execute() {

        $model = new procap_model_processoModel($this->controller);


        $form = $model->getForm(new procap_model_structure_processoFormStructure(), 'client');
        if ($form) {
            $form->getElement('office_id')->setValue($this->controller->getUser()->getProperty('office_id'));
            $this->controller->getEnv()->processoNumero = $form->getElement('numero')->getValue();
        } else {
            $this->controller->getEnv()->processoNumero = null;
        }

        /*      Impedindo a mudanca do numero do processo */
        //if(!empty($form)  && $this->controller->getAction()->getCrudAction() != 'new' ){
        //$form->getElement('numero')->freeze();
        //}
        $this->controller->getEnv()->forms['processoForm'] = $form;

        $processoList = $model->getList(new procap_model_structure_processoListStructure());
        $this->controller->getEnv()->lists['processoList'] = $processoList;

        if (isset($_GET['find_txt'])) {
            $this->controller->getEnv()->find_txt = $_GET['find_txt'];
        } else {
            @$processoList->find = str_replace('size=10', 'size="60"', $processoList->find);
            $this->controller->getEnv()->find_txt = null;
        }




        /* Definindo template */
        $this->controller->getEnv()->processoCodigo = null;
        $action = $this->controller->getAction()->getCrudAction();
        //pr($action ,false ) ;
        if ($action == 'new' || ($action == 'insert' && !$model->crudValidate() )) {
            $this->controller->getEnv()->formTemplate = APP_ROOT . '/procap/templates/processoFormNew.tpl';
        } else {
            $this->controller->getEnv()->formTemplate = APP_ROOT . '/procap/templates/processoForm.tpl';
            if ($form) {
                $this->controller->getEnv()->processoCodigo = $form->getElement('id')->getValue();
            }
        }

        $view = new procap_view_processoView($this->controller, $this->getEnv());
    }

}

?>
 