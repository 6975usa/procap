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
class procap_model_andamentoModel extends classes_model_AbstractModel {

    function __construct(classes_controller_SystemController $controller) {
        parent::__construct($controller);
        $this->controller = $controller;
    }

    public function formConfiguration() {
        $this->form->addFormRule($this, 'formValidate');
    }

    function formValidate($fields) {

        $ret = true;


        if (!empty($fields['agenda']) && $fields['agenda'] == 1) {

            if (empty($fields['termino_data'])) {

                $this->controller->getEnv()->formErrorMessages['termino_data'] = 'Termino nao pode ser vazio';
                $this->form->getElement('termino_data')->setAttribute('class', 'error');

                $ret = false;
            }
            if (empty($fields['inicio_data'])) {

                $this->controller->getEnv()->formErrorMessages['inicio_data'] = ' Inicio nao pode ser vazio';
                $this->form->getElement('inicio_data')->setAttribute('class', 'error');

                $ret = false;
            }
        }

        return $ret;
    }

    function getPastaDeProcesso($procId) {
        return $this->facade->getPastaDeProcesso($procId);
    }

    function setPecas($andamentos) {
        $processo_id = $_GET['pc'];
        foreach ($andamentos->data as $key => $data) {
            $andamentos->data[$key]['pecas'] = $this->facade->setPecas($data['andamento_id'], $processo_id);
            unset($andamentos->data[$key]['andamento_id']);
        }
        return $andamentos;
    }

    public function savePecasDeAndamento() {

        $pecaDao = new procap_dao_pecaDAO();
        $values = array();

        if (!empty($_FILES['arquivo1']) && !empty($_POST["descricao1"])) {
            $values[] = array("file" => 'arquivo1', "desc" => "descricao1");
        }
        if (!empty($_FILES['arquivo2']) && !empty($_POST["descricao2"])) {
            $values[] = array("file" => 'arquivo2', "desc" => "descricao2");
        }
        if (!empty($_FILES['arquivo3']) && !empty($_POST["descricao3"])) {
            $values[] = array("file" => 'arquivo3', "desc" => "descricao3");
        }

        foreach ($values as $val) {
            $arq = STATIC_URL . '/procap/arquivos/' . $_POST["processo_id"] . DS . $_FILES[$val['file']]['name'];
            $pecaDao->savePeca($_POST["processo_id"], $_POST[$val["desc"]], $_POST["andamento_id"], $arq);

            $this->moveFile($val["file"]);
        }
    }

    function moveFile($file) {
        
    }

}

?>