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
class procap_controller_relatorioController extends classes_controller_AbstractSystemController {

    function __construct(classes_controller_SystemController $controller) {
        $this->controller = $controller;
    }

    function execute() {

        if (!isset($_POST['tipo'])) {
            return new procap_controller_relatoriosController($this->controller);
        }

        $model = new procap_model_relatorioModel($this->controller);
        $this->controller->getEnv()->clienteNome = $model->getClienteNome($_POST['cliente_id']);

        switch ($_POST['tipo']) {
            case "ultimos_andamentos":
                $this->controller->getEnv()->uaList = $model->getUltimosAndamentos($_POST['cliente_id']);
                $this->controller->getEnv()->templ = APP_ROOT . '/procap/templates/relatorio.tpl';
                break;
            case "ativos":
                $this->controller->getEnv()->uaList = $model->getProcessosAtivos($_POST['cliente_id']);
                $this->controller->getEnv()->templ = APP_ROOT . '/procap/templates/relatorio_processos_ativos.tpl';
                break;
            case "baixados":
                $this->controller->getEnv()->uaList = $model->getProcessosBaixados($_POST['cliente_id']);
                $this->controller->getEnv()->templ = APP_ROOT . '/procap/templates/relatorio_processos_baixados.tpl';
                break;
            default:
                break;
        }

        $view = new procap_view_relatorioView($this->controller, $this->getEnv());
    }

}

?>
