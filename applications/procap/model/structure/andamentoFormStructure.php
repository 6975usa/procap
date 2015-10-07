<?php

/**
 * Este arquivo é parte do programa LiteFrame - lightWeight FrameWork
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
class procap_model_structure_andamentoFormStructure extends classes_model_structure_AbstractStructure {

    function __construct() {
        parent::__construct();
    }

    function setUpStructure() {


        $this->formName = 'andamentoForm';

        $this->table = 'procap_andamento';

        $this->dao = 'procap_dao_andamentoDAO';

        $this->col = array(
            'id' => array(
                'type' => 'integer',
                'size' => 10,
                'form' => true,
                'validate' => false,
                'qf_label' => 'id',
                'qf_type' => 'hidden',
            ),
            'tipo_id' => array(
                'type' => 'integer',
                'size' => 10,
                'form' => true,
                'validate' => true,
                'qf_label' => 'Tipo',
                'qf_type' => 'select',
                'qf_vals' => array('dao' => 'procap_dao_tipoandamentoDAO', 'functionName' => 'getTiposDeAndamento'),
                'qf_rules' =>
                array(
                    'required' => 'n&atilde;o pode ser vazio',
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'processo_id' => array(
                'type' => 'integer',
                'size' => 10,
                'form' => true,
                'validate' => true,
                'qf_label' => 'Processo',
                'qf_type' => 'hidden',
                'qf_rules' =>
                array(
                    'required' => 'n&atilde;o pode ser vazio',
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'fase_id' => array(
                'type' => 'integer',
                'size' => 10,
                'form' => true,
                'validate' => true,
                'qf_label' => 'Fase',
                'qf_type' => 'select',
                'qf_vals' => array('dao' => 'procap_dao_faseDAO', 'functionName' => 'getFases'),
                'qf_rules' =>
                array(
                    'required' => 'n&atilde;o pode ser vazio',
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'advogado_id' => array(
                'type' => 'integer',
                'size' => 10,
                'form' => true,
                'validate' => true,
                'qf_label' => 'Distribu&iacute;do para',
                'qf_type' => 'select',
                'qf_vals' => array('dao' => 'procap_dao_advogadoDAO', 'functionName' => 'getTodosAdvogados'),
                'qf_rules' =>
                array(
                    'required' => 'n&atilde;o pode ser vazio',
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'inicio_data' => array(
                'type' => 'text',
                'form' => true,
                'jscalendar' => true,
                'size' => 10,
                'qf_label' => 'In&iacute;cio',
                'qf_rules' =>
                array(
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'termino_data' => array(
                'type' => 'text',
                'form' => true,
                'jscalendar' => true,
                'size' => 10,
                'qf_label' => 'T&eacute;rmino',
                'qf_rules' =>
                array(
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'conclusao_data' => array(
                'type' => 'text',
                'form' => true,
                'jscalendar' => true,
                'size' => 10,
                'qf_label' => 'Conclus&atilde;o',
                'qf_rules' =>
                array(
                    'maxlength' => array('m&aacute;ximo de 10 caracteres', 10),
                ),
            ),
            'agenda' => array(
                'type' => 'integer',
                'form' => true,
                'validate' => true,
                'size' => 1,
                'qf_type' => 'hidden',
                'qf_rules' =>
                array(
                    'required' => 'Agenda nao pode ser vazio',
                    'numeric' => 's&oacute; n&uacute;mero',
                    'maxlength' => array('m&aacute;ximo de 1 caracteres', 1),
                ),
                'qf_vals' =>
                array(
                    '1' => '1',
                ),
            ),
            'descricao' => array(
                'type' => 'varchar',
                'size' => 500,
                'form' => true,
                'validate' => true,
                'qf_label' => 'Descri&ccedil;&atilde;o',
                'qf_type' => 'textarea',
                'qf_rules' =>
                array(
                    'required' => 'n&atilde;o pode ser vazio',
                    'maxlength' => array('m&aacute;ximo de 500 caracteres', 500),
                ),
                'qf_attrs' =>
                array(
                    'rows' => '4',
                    'cols' => '40',
                ),
            ),
        );



        $this->idx = array(
            'id' => 'primary',
        );



        $this->auto_inc_col = 'id';
    }

}

?>