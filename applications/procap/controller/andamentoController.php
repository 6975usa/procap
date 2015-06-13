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
class procap_controller_andamentoController extends classes_controller_AbstractSystemController {

    private $desc_html = null;

    function __construct($controller) {
        $this->controller = $controller;
    }

    function execute() {
        $model = new procap_model_andamentoModel($this->controller);

        $form = $model->getForm(new procap_model_structure_andamentoFormStructure(), 'client');

        if ($form) {

            $form->getElement('processo_id')->setValue($_GET['pc']);
            if ($form->elementExists(INSERT_BUTTON_NAME)) {
                $form->getElement(INSERT_BUTTON_NAME)->setValue('Salvar Andamento');
            }
            if ($form->elementExists(UPDATE_BUTTON_NAME)) {
                $form->getElement(UPDATE_BUTTON_NAME)->setValue('Salvar Andamento');
            }
            if ($form->elementExists(NEW_BUTTON_NAME)) {
                $form->getElement(NEW_BUTTON_NAME)->setValue('Novo Andamento');
            }
            if ($form->elementExists(DELETE_BUTTON_NAME)) {
                $form->getElement(DELETE_BUTTON_NAME)->setValue('Excluir Andamento');
            }
            if ($form->elementExists(LIST_BUTTON_NAME)) {
                $form->getElement(LIST_BUTTON_NAME)->setValue('Ver Andamentos');
            }

            //Faz com que o andamento sempre possa aparecer na agenda. Unless termino is null
            $form->getElement("agenda")->setValue("1");
            
            $this->controller->env->forms['andamentoForm'] = $form;
            $this->acertaTextarea($form);
        } else {
            $_GET['setPerPage'] = 10000;
            $andamentoList = $model->getList(new procap_model_structure_andamentoListStructure());
            $this->controller->env->lists['andamentoList'] = $model->setPecas($andamentoList);
        }

        $this->controller->env->desc_html = $this->desc_html;

        $this->controller->env->pastaProcesso = $model->getPastaDeProcesso($_GET['pc']);

        $view = new procap_view_andamentoView($this->controller, $this->env);
    }

    private function acertaTextarea($form) {
        $html = $form->toArray()['elements'][9]['html'];
        $value = $form->toArray()['elements'][9]['value'];
        if (strstr($html, "></textarea>")) {
            $this->desc_html = str_replace("></textarea>", ">" . $value . "</textarea>", $html);
        } else {
            $this->desc_html = $html;
        }
    }

}
