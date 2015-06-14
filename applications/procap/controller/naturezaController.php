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
class procap_controller_naturezaController extends classes_controller_AbstractSystemController {

    /**     
     * @var classes_controller_SystemController     
     */
    private $controller;

    function __construct(classes_controller_SystemController $controller) { 
        $this->controller = $controller;
    }

    function execute() {
        $model = new procap_model_naturezaModel($this->controller);


        $form = $model->getForm(new procap_model_structure_naturezaFormStructure(), 'client');
        $this->controller->getEnv()->forms['naturezaForm'] = $form;


        $naturezaList = $model->getList(new procap_model_structure_naturezaListStructure());
        $this->controller->getEnv()->lists['naturezaList'] = $naturezaList;

        $view = new procap_view_naturezaView($this->controller, $this->getEnv());
    }

}

?>
