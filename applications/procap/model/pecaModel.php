<?php

/**
 * Este arquivo ï¿½ parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since 1.0
 * @author Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright 2010 Anselmo S Ribeiro
 *            @licence LGPL
 */
class procap_model_pecaModel extends classes_model_AbstractModel {

    function __construct (classes_controller_SystemController $controller) {
        parent::__construct($controller);
    }

    public function formConfiguration () {
        $this->form->addFormRule($this, 'formValidate');
        
        $this->moveFile('arquivo');
    }

    function moveFile ($file) {
        if (! empty($_FILES[$file])) {
            
            // Tirando acentos do nome do arquivo
            $_FILES[$file]['name'] = tiracento($_FILES[$file]['name']);
            $this->form->getElement($file)->_value['name'] = tiracento($_FILES[$file]['name']);
            
            if ($this->form->getElement($file)) {
                $arquivo = $this->form->getElement($file);
                if ($arquivo->isUploadedFile()) {
                    
                    $defaultRoot = PUBLIC_ROOT . '/static/procap/arquivos';
                    
                    $processoNr = $this->form->getElement('processo_id')->getValue();
                    $pecaNr = $this->form->getElement('id')->getValue();
                    
                    $concatFolder1 = $defaultRoot;
                    $concatFolder2 = $defaultRoot . DS . $processoNr;
                    
                    if (! is_dir($concatFolder1)) {
                        if (! mkdir($concatFolder1)) {
                            throw new Exception('Não foi poss&iacute;vel gravar a peça no servidor.');
                        }
                    }
                    if (! is_dir($concatFolder2)) {
                        if (! mkdir($concatFolder2)) {
                            throw new Exception('Não foi poss&iacute;vel gravar a peça no servidor.');
                        }
                    }
                    
                    if (! $arquivo->moveUploadedFile($concatFolder2)) {
                        throw new Exception("N&atilde;o foi poss&iacute;vel carregar o arquivo.");
                    }
                }
            }
        }
    }

    function formValidate ($fields) {
        $ret = true;
        
        // Validando arquivo de upload
        $arquivo = $this->form->getElement('arquivo');
        
        if ($arquivo->_value['size'] > 0) {
            $types = array(
                    'application/msword',
                    'application/pdf',
                    'text/html'
            );
            if (! in_array($_FILES['arquivo']['type'], $types)) {
                $this->controller->getEnv()->formErrorMessages['arquivo'] = 'somente PDF e DOC';
                $this->form->getElement('arquivo')->setAttribute('class', 'error');
                $ret = false;
            }
            if ($_FILES['arquivo']['size'] > 5 * 1024 * 1024) {
                $this->controller->getEnv()->formErrorMessages['arquivo'] = 'm&aacute;ximo 5MB';
                $this->form->getElement('arquivo')->setAttribute('class', 'error');
                $ret = false;
            }
        }
        
        return $ret;
    }
}

?>