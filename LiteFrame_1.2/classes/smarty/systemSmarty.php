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
 * @since 1.0
 * @author Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright 2010 Anselmo S Ribeiro
 *            @licence LGPL
 */
require_once 'libs/Smarty.class.php';

class classes_smarty_systemSmarty extends Smarty {

    public $controller;

    public function __construct ($controller) {
        parent::Smarty();
        $this->controller = $controller;
        $this->template_dir = SHARE_ROOT . '/classes/smarty/templates';
        $this->compile_dir = SHARE_ROOT . '/classes/smarty/templates_c';
        $this->cache_dir = SHARE_ROOT . '/classes/smarty/cache';
        $this->config_dir = SHARE_ROOT . '/classes/smarty/config';
        
        $this->left_delimiter = '{s ';
        $this->right_delimiter = ' s}';
        
        $this->smartyExecute();
    }

    function smartyExecute () {
        if (defined(STATIC_URL))
            $this->assign('static_url', STATIC_URL);
        if (defined(SITE_ROOT))
            $this->assign('site_url', SITE_ROOT);
        
        $this->assign('messages', $this->controller->messages->getMessages());
        $this->assign('crudAction', $this->controller->getAction()
            ->getCrudAction());
        $this->assign('user', $this->controller->user);
        $this->assign('formErrorMessages', (! empty($this->controller->env->formErrorMessages)) ? $this->controller->env->formErrorMessages : null);
        $this->assign('site_url', SITE_ROOT);
        @$this->assign('welcomeTpl', APP_ROOT . '/procap/templates/' . DEFAULT_THEME . '/welcome.tpl');
        $this->assign('user_name', $this->controller->user->getProperty('loginname'));
        $this->listOperations();
        $this->formOperations();
        $this->setUserMenu();
    }

    function setUserMenu () {
        if ($this->controller->user->isLoged()) {
            $this->assign('usermenu', $this->controller->user->getUserMenu());
        }
    }

    function listOperations () {
        // Common variables in all list template
        $this->assign('public_root', PUBLIC_ROOT);
        $this->assign('static_url', STATIC_URL);
        
        $listSet = false;
        // pr($this->controller->env->lists);
        if (isset($this->controller->env->lists)) {
            foreach ($this->controller->env->lists as $frm) {
                if (! empty($frm)) {
                    $listSet = true;
                }
            }
        }
        
        if ($listSet) {
            $lists = $this->controller->getEnv()->lists;
            if (! empty($lists)) {
                $this->assign('lists', $lists);
                foreach ($lists as $list) {
                    $this->lists[$list->listName] = $list;
                    $this->assign('find', $list->find);
                    $this->assign('perPageSelectBox', $list->perPageSelectBox);
                    $this->assign('links', $list->links);
                    $this->assign('data', $list->data);
                    $this->assign('titles', $list->titles);
                    $this->assign('listTitle', $list->listTitle);
                    $this->assign('displayOptions', $list->displayOptions);
                }
            }
        }
    }

    function formOperations () {
        $formSet = false;
        if (isset($this->controller->getEnv()->forms)) {
            foreach ($this->controller->getEnv()->forms as $frm) {
                if (! empty($frm)) {
                    $formSet = true;
                }
            }
        }
        
        if ($formSet) {
            
            $this->assign('forms', (isset($this->controller->env->forms)) ? $this->controller->env->forms : null);
            $this->assign('controller', $this->controller);
            
            foreach ($this->controller->env->forms as $form) {
                if ($form->formValidate) {
                    
                    foreach ($frm->_elements as $elem) {
                        if ($elem->getType() == 'select') {
                            $elem->_options = array_merge(
                                    array(
                                            '' => array(
                                                    'text' => '',
                                                    'attr' => array(
                                                            'value' => ''
                                                    )
                                            )
                                    ), $elem->_options);
                        }
                    }
                    
                    $frm = $form->toArray();
                    // pr($form);
                    $this->assign('jqueryInputMaskScript', 
                            "<script type='text/javascript'> $(document).ready(function() { jQuery(function($) {" . $form->jqueryInputMaskScript . " });  }); </script>");
                    $this->assign('jsValidationScript', $frm['javascript']);
                    $this->assign('formOptions', $frm['attributes']);
                    $this->assign('requiredNote', $frm['requirednote']);
                    
                    foreach ($frm['elements'] as $element) {
                        
                        // element type RADIO
                        if (isset($element['elements']) && ($element['elements'])) {
                            $html = '';
                            foreach ($element['elements'] as $el) {
                                $html .= $el['html'] . $element['separator'];
                            }
                            $this->assign($element['name'] . '_html', $html);
                            $this->assign($element['name'] . '_error', $html);
                            $this->assign($element['name'] . '_required', $html);
                        }                         

                        // any other element type
                        else {
                            if (isset($this->controller->env->jscalendar)) {
                                $jscalendar = $this->controller->env->jscalendar;
                                if (isset($jscalendar[$element['name']])) {
                                    $element['html'] .= $jscalendar[$element['name']];
                                }
                            }
                            $this->assign($element['name'] . '_html', $element['html']);
                        }
                        
                        $this->assign($element['name'] . '_label', $element['label']);
                        $this->assign($element['name'] . '_error', $element['error']);
                        if ($element['required']) {
                            $this->assign($element['name'] . '_required', REQUIRED_FIELD);
                        }
                    }
                }
            }
            
            $messages = $this->controller->messages->getMessages();
            if (isset($messages['crud'])) {
                $this->assign('messages', $messages['crud']);
            }
        }
    }

    function assignSelect (array $values, $idName, $descriptionName, $selectedValue = null, $selectedName = null) {
        foreach ($values as $key => $value) {
            if (! is_numeric($key)) {
                throw new Exception('Array Index must be numeric');
            }
            if (! key_exists(0, $value)) {
                throw new Exception('Array Index "0" not defined');
            }
            if (! key_exists(1, $value)) {
                throw new Exception('Array Index "1" not defined');
            }
            break;
        }
        
        foreach ($values as $value) {
            $op[0][] = $value[0];
            $op[1][] = $value[1];
        }
        
        $this->assign($idName, $op[0]);
        $this->assign($descriptionName, $op[1]);
        if (isset($selectedValue) && isset($selectedName)) {
            $this->assign($selectedName, $selectedValue);
        }
    }

    function display ($OriginalTemplate, $cache_id = null, $compile_id = null) {
        // pr($this->lists);
        if (! empty($this->lists)) {
            // pr($OriginalTemplate);
            $tempCont = file_get_contents($OriginalTemplate);
            
            while (strstr($tempCont, '{ ')) {
                $tempCont = str_replace('{ ', '{', $tempCont);
            }
            
            while (strstr($tempCont, ' }')) {
                $tempCont = str_replace(' }', '}', $tempCont);
            }
            
            $template = $this->compile_dir . '/' . md5($OriginalTemplate);
            foreach ($this->lists as $list) {
                if (! empty($list->getListStructure()->listTemplate)) {
                    if (! $defaultTemp = file_get_contents($list->getListStructure()->listTemplate)) {
                        throw new Exception('Template not found: ' . $list->getListStructure()->listTemplate);
                    }
                } else {
                    $defaultTemp = file_get_contents(SHARE_ROOT . '/classes/view/templates/defaultList.tpl');
                }
                $tempCont = str_replace('{$' . $list->listName . '}', $defaultTemp, $tempCont);
                if (! ($fd = @fopen($template, 'wb'))) {
                    throw new Exception("problem opening temporary file '$template'");
                }
                fwrite($fd, $tempCont);
                fclose($fd);
            }
        } else {
            $template = $OriginalTemplate;
        }
        parent::display($template);
    }
}

?>