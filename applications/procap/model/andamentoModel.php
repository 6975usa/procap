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
    }

    public function formConfiguration() {
        $this->form->addFormRule($this, 'formValidate');
    }

    function formValidate($fields) {

        $ret = true;


        if (!empty($fields['agenda']) && $fields['agenda'] == 1) {

            if (empty($fields['termino_data'])) {

                $this->controller->env->formErrorMessages['termino_data'] = 'Termino nao pode ser vazio';
                $this->form->getElement('termino_data')->setAttribute('class', 'error');

                $ret = false;
            }
            if (empty($fields['inicio_data'])) {

                $this->controller->env->formErrorMessages['inicio_data'] = ' Inicio nao pode ser vazio';
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

}

?>