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
class classes_model_Model extends classes_model_CRUD {

    public $dao;
    public $controller;
    protected $formStructure;
    protected $listStructure;
    protected $form;
    protected $formName;
    protected $list;
    protected $formAction;
    public $newRecordFlag;
    public $message;
    public $validationSide = 'client';
    private $makeCRUD = true;
    private $hierSelect;

    function __construct(classes_controller_SystemController $controller) {
        $this->controller = $controller;
        $this->facade = classes_Singleton::getInstance($this->controller->getApplication()->getName() . '_dao_ApplicationDAOFacade', $controller);
    }

    function formExecute($validationSide) {

        $this->setListNames();

        $this->setNewRecordFlag();

        $this->setInitVals();

        $this->setHierSelectPost();


        $this->form = $this->formStructure->getFormulario($this->getFormStructureCols(), null, array('formName' => $this->formStructure->formName), $validationSide);

        $this->verifyPostValues();

        $this->form->name = $this->controller->getApplication()->getTemplatesDir() . '/' . $this->formStructure->getFormName() . '.tpl';
        $this->form->formValidate = ( isset($this->formStructure->formValidate) && $this->formStructure->formValidate === false) ? false : true;


        $this->form->setRequiredNote(REQUIRED_NOTE);
        $this->form->setJsWarnings(JS_PRE_WARNING, JS_POST_WARNING);

        if ($this->form->formValidate) {
            $this->setJsCalendarConfigurations();
        }

        $this->setIdToElements();
        $this->setHierSelect();
        $this->formConfiguration();
        $this->makeButtons();
        $this->formatError();


        /*
         * CRUD realiza insert, update, delete conforme o caso.
         */

        if ($this->makeCRUD) {
            $this->cols = $this->getExportValues();
            if ($this->beforeCRUD()) {
                if (!( isset($this->formStructure->formValidate) && $this->formStructure->formValidate === false)) {
                    $this->CRUD($this->cols);
                }
            }
            $this->afterCRUD();
        }


        $this->form->updateElementAttr('MM_insert', array('onClick' => "appendHiddenToForm(this.form,new Array('action','MM_insert'));"));
        $this->form->updateElementAttr('MM_update', array('onClick' => "appendHiddenToForm(this.form,new Array('action','MM_update'));"));
        $this->form->updateElementAttr('MM_delete', array('onClick' => "appendHiddenToForm(this.form,new Array('action','MM_delete'));"));
        $this->form->updateElementAttr('MM_new', array('onClick' => "appendHiddenToForm('MM_new',new Array('action','MM_new'));"));
        $this->form->updateElementAttr('MM_list', array('onClick' => "appendHiddenToForm('MM_list',new Array('action','MM_list'));"));
    }

    function listExecute() {

        $dao = $this->facade->getDao($this->listStructure->dao);

        require_once(SHARE_ROOT . '/' . str_replace('_', DS, 'classes_model_Pager') . '.php');
        $pager = new classes_model_Pager($dao, $this->listStructure, $this->controller);
        $pager->structure = $this->listStructure;
        $pager->makeDefaults();
        $pager->titles = $pager->createTitles($this->listStructure->getLabels());
        $pager->displayOptions = $this->listStructure->displayOptions;
        $pager->data = $this->listSetData($pager);
        $pager->listTitle = $this->listStructure->listTitle;
        $pager->listName = $this->listStructure->listName;
        $this->list = $this->controller->pager = $pager;
    }

    function listSetData($pager) {
        $op = array();
        foreach ($pager->data as $k => $data) {
            foreach ($this->listStructure->fields as $key => $options) {
                if (!key_exists($key, $data)) {
                    throw new Exception('Field not found: ' . $key);
                }
                if (key_exists($key, $this->listStructure->links)) {
                    $op[$k][$key] = $this->buildLink($key, $data, $pager);
                } else {
                    $op[$k][$key] = $data[$key];
                }
            }
        }
        return $op;
    }

    /* Cria o link para chamar o formulario correspondente */

    function buildLink($fieldName, $fields, $pager) {
        $f = '';
        foreach ($this->listStructure->links[$fieldName]['fields'] as $column) {
            if (is_array($column)) {
                $f .= ",'{$column[0]}','" . $fields[$column[1]] . "'";
            } else {
                $f .= ",'$column','" . $fields[$column] . "'";
            }
        }
        $f = substr($f, 1);
        $str = "<a href=\"javascript:linkSubmit(Array(" . $f . "),";
        $str .= (!empty($this->listStructure->links[$fieldName]['target'])) ? "'" . $this->listStructure->links[$fieldName]['target'] . "'" : "'_self'";
        $str .= ",";
        $str .= (!empty($this->listStructure->links[$fieldName]['action'])) ? "'" . $this->listStructure->links[$fieldName]['action'] . "'" : "'" . $_SERVER['REQUEST_URI'] . "'";

        $str .= ",'post','";
        $str .= (isset($this->listStructure->links[$fieldName]['list'])) ? $this->listStructure->links[$fieldName]['list'] : $this->listStructure->listName;
        $str .= "','lsUpdate')\">";

        if (!empty($this->listStructure->links[$fieldName]['embebedTag'])) {
            switch ($this->listStructure->links[$fieldName]['embebedTag']) {
                case 'img':
                    if (empty($this->listStructure->links[$fieldName]['src']))
                        throw new Exception('"src" must be set.');
                    $fld = '<img border=0 src="' . $this->listStructure->links[$fieldName]['src'] . '/' . $fields[$fieldName] . '" >';
                    break;
                default:
                    throw new Exception('Invalid EmbebedTag.' . $this->listStructure->links[$fieldName]['embebedTag']);
            }
        }
        else {
            $fld = $fields[$fieldName];
        }
        $str .= $fld . "</a>";
        return $str;
    }

    /**
     * This function runs all tasks before insert,update and delete routines at the database
     *
     * @return unknown
     */
    function beforeCRUD() {

        //seting up calendar values
        $this->cols = $this->setJsCalendarValues($this->cols);

        return true;
    }

    /**
     * Adds form rules defined at application model
     *
     * @return void
     */
    function addFormRules() {
        if ($this->controller->getAction()->isUpdate() || $this->controller->getAction()->isInsert()) {
            if (!empty($this->form->formRules)) {
                foreach ($this->form->formRules as $rule) {
                    $res = call_user_func(array($rule['obj'], $rule['method']), $this->form->getSubmitValues(), $this->form->_submitFiles);
                    if (!($res === true || $res === false)) {
                        throw new Exception('Invalid value from User Form Rule. Return true|false.');
                    }
                    if (!$res) {
                        return false;
                    }
                }
            }
        }
    }

    /**
     * It runs all rules defined at application model
     * Form validation depends on this function
     *
     * @return unknown
     */
    function formRulesValidate() {
        //Executing form rules defined in application model
        if (isset($this->form->formRules)) {
            foreach ($this->form->formRules as $rule) {
                if (is_callable(array($rule['obj'], $rule['method']))) {
                    $res = $rule['obj']->{$rule['method']}($this->form->getSubmitValues());
                    return $res;
                } else {
                    throw new Exception('not callable function: ' . $rule['method']);
                }
            }
        }

        return 1;
    }

    /**
     * This function runs all tasks after insert,update and delete routines at the database
     *
     * @return unknown
     */
    function afterCRUD() {
        
    }

    /**
     * 
     * @param classes_model_structure_Structure $formStructure
     * @param type $validationSide
     * @return HTML_QuickForm
     * @throws Exception
     */
    function getForm(classes_model_structure_Structure $formStructure, $validationSide = "server") {
        $action = $this->controller->getAction()->getCrudAction();
        switch ($action) {
            case 'lsUpdate':
            case 'update':
            case 'delete':
            case 'new':
            case 'insert':
                if (empty($formStructure)) {
                    throw new Exception("Form Structure not defined ");
                }
                $this->formStructure = $formStructure;
                $this->dao = $this->facade->getDao($this->formStructure->dao);
                $this->formExecute($validationSide);
                return $this->form;

                break;

            default:
                break;
        }
        return null;
    }

    function getFormStructure($formName) {
        return $this->formStructure;
    }

    function getListStructure($listName) {
        return classes_Singleton::getInstance($this->controller->getApplication()->getName() . '_' . $this->controller->module->getName() . '_model_structure_' . $listName . 'Structure', $listName);
    }

    function getList($listStructure) {
        $action = $this->controller->getAction()->getCrudAction();
        switch ($action) {
            case 'list':
                $this->listStructure = $listStructure;
                $this->listExecute();
                return $this->list;
            default :
                return '';
        }
    }

    function getFormHtmlCode() {
        $renderer = $this->form->defaultRenderer();
        $renderer->setFormTemplate(file_get_contents(SYSTEM_ROOT . '/library/templates/defaultForm.tpl'));
        return $this->form->tohtml();
    }

    /**
     * Sets the value for new record flag
     *
     * if true , the user is inserting a new registry
     * if false, the user is editing , listing or deleting an existing registry
     *
     * @return avoid
     */
    function setNewRecordFlag() {
        if ($this->controller->getAction()->isInsert() || $this->controller->getAction()->isUpdate() || $this->controller->getAction()->isLsUpdate()) {
            $this->newRecordFlag = false;
        } else {
            $this->newRecordFlag = true;
        }
    }

    /**
     * It returns whether action is new record or not
     *
     * @return boolean true (in case of new record) or false otherwise
     */
    function isNewRecord() {
        if (!isset($this->newRecordFlag)) {
            $this->setNewRecordFlag();
        }
        return $this->newRecordFlag;
    }

    function getFormStructureCols() {
        $fs = $this->formStructure;
        $cols = array();
        foreach ($fs->getCols() as $colName => $col) {
            if (isset($col['form']) && $col['form'] === true) {
                $cols[] = $colName;
            } elseif (isset($col['form']) && $col['form'] === false) {
                //$cols[] = $colName;
            } else {
                throw new Exception("Index 'form' not defined for '$colName'. Choose true|false. ");
            }
        }
        return $cols;
    }

    function getFormStructureColsForValidation() {
        $fs = $this->formStructure;
        $cols = array();
        foreach ($fs->getCols() as $colName => $col) {
            if (isset($col['form']) && $col['form'] === true) {
                if (!(isset($col['crud']) && $col['crud'] === false)) {
                    $cols[] = $colName;
                }
            } else {
                if (!(isset($col['form']) && $col['form'] === false)) {
                    throw new Exception("Index 'form' not defined for '$colName'. Choose true|false. ");
                }
            }
        }
        return $cols;
    }

    function getFSCols(classes_model_structure_Structure $fs) {
        $cols = array();
        foreach ($fs->getCols() as $colName => $col) {
            if (isset($col['form']) && $col['form'] === true) {
                if (!(isset($col['crud']) && $col['crud'] === false)) {
                    $cols[] = $colName;
                }
            } else {
                if (!(isset($col['form']) && $col['form'] === false)) {
                    throw new Exception("Index 'form' not defined for '$colName'. Choose true|false. ");
                }
            }
        }
        return $cols;
    }

    /**
     * This function creates the code for JsCalendar inputs
     *
     * @return void
     *
     */
    function setJsCalendarConfigurations() {
        $this->form->jqueryInputMaskScript = '';
        $elements = $this->formStructure->getColumns();
        foreach ($elements as $elementName => $element) {
            if (isset($element['jscalendar']) && $element['jscalendar']) {
                if (!PEAR::isError($this->form->getElement($elementName))) {
                    $code = $this->getJsCalendarCode($elementName);
                    $this->form->jqueryInputMaskScript .= "
               $('#$elementName').mask('99/99/9999');
               ";
                    $this->form->getElement($elementName)->setAttribute('id', $elementName);
                    $this->form->getElement($elementName)->setAttribute('size', '10');
                    $this->form->getElement($elementName)->setAttribute('maxlength', '10');
                    $this->controller->getEnv()->jscalendar[$elementName] = $code;
                }
            }
        }
    }

    /**
     * This function validates jsCalendar inputs
     *
     * @return boolean true (form is valid) or false otherwise
     */
    function JsCalendarValidate() {
        $elements = $this->formStructure->getColumns();
        foreach ($elements as $elementName => $element) {
            if (isset($element['jscalendar']) && $element['jscalendar']) {
                $en = $this->form->getElement($elementName);
                if (!PEAR::isError($en)) {
                    $value = $en->getValue();
                    if (!empty($value)) {
                        $date = explode('/', $value);
                        if (!checkdate($date[1], $date[0], $date[2])) {
                            $this->controller->getMessages()->addErrorMessage(INVALID_DATE);
                            return false;
                        }
                    }
                } else {
                    throw new Exception($en->message);
                }
            }
        }
        return true;
    }

    /**
     * This function defines and return the jsCalendar code
     * It adds a new element type and adds a new element to the form
     *
     * @param unknown_type $elementName
     * @return unknown
     */
    function getJsCalendarCode($elementName) {
        $temp = '__temp__';
        $elementName .= $temp;
        $options1 = array(
            'baseURL' => STATIC_URL . '/framework/js',
            'styleCss' => STATIC_URL . '/framework/css/calendar-win2k-1.css',
            'language' => 'pt',
            'image' => array(
                'src' => STATIC_URL . '/framework/images/calendar.gif',
                'border' => 0
            ),
            'setup' => array(
                'inputField' => $elementName,
                'ifFormat' => '%d/%m/%Y',
                'showsTime' => true,
                'time24' => true,
                'weekNumbers' => false,
                'showOthers' => true
            )
        );

        require_once 'HTML/QuickForm/jscalendar.php';

        $cal = $this->form->addElement('jscalendar', $elementName, null, $options1);
        $this->form->setDefaults(array($elementName => '1989-08-07'));
        $code = str_replace($temp, '', $cal->toHtml());
        return $code;
    }

    /**
     * Basicly it changes date formats from yyyy-mm-dd to dd/mm/yyyy
     *
     * @param unknown_type $cols
     * @return unknown
     */
    function setJsCalendarValues($cols) {
        $columns = $this->formStructure->getColumns();
        if ($this->controller->getAction()->IsUpdate() || $this->controller->getAction()->IsInsert()) {
            foreach ($cols as $col => $value) {
                if (isset($columns[$col]['jscalendar']) && $columns[$col]['jscalendar']) {
                    $data = $this->form->exportValue($col);
                    //$this->form->getElement($col)->setValue($data);
                    if (!empty($data)) {
                        $cols[$col] = substr($data, 6, 4) . '-' . substr($data, 3, 2) . '-' . substr($data, 0, 2);
                    } else {
                        $cols[$col] = null;
                    }
                }
            }
        } elseif ($this->controller->getAction()->IsLsUpdate()) {
            foreach ($cols as $col => $value) {
                if (isset($columns[$col]['jscalendar']) && $columns[$col]['jscalendar']) {
                    $data = $this->form->exportValue($col);
                    if (!empty($data)) {
                        $data = substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4);
                        $this->form->getElement($col)->setValue($data);
                    }
                }
            }
        }
        return $cols;
    }

    /**
     * Creates the list values for input type select
     * It changes the form struture by completing input type select
     * with values from a DAO function defined on form structure
     *
     * @return avoid
     */
    function setInitVals() {
        $cols = $this->formStructure->getCols();

        //seting lists values
        foreach ($cols as $colName => $values) {
            if (isset($values['qf_vals']) && !empty($values['qf_vals'])) {
                if (key_exists('dao', $values['qf_vals']) && key_exists('functionName', $values['qf_vals'])) {
                    $dao = $values['qf_vals']['dao'];
                    $functionName = $values['qf_vals']['functionName'];
                    $vals = $this->facade->getDao($dao)->$functionName();
                    $this->formStructure->setInicialValues($colName, $vals);
                } elseif (key_exists('dao', $values['qf_vals']) && !key_exists('functionName', $values['qf_vals'])) {
                    throw new Exception('functionName not defined in qf_vals at Structure. ');
                } elseif (!key_exists('dao', $values['qf_vals']) && key_exists('functionName', $values['qf_vals'])) {
                    throw new Exception('dao not defined in qf_vals at Structure. ');
                }
            }
        }
    }

    function verifyPostValues() {

        $cols = $this->formStructure->getCols();

        $action = $this->controller->getAction()->getCrudAction();

        if ($action == 'insert' or $action == 'update') {
            foreach ($cols as $colName => $values) {
                if (isset($values['qf_vals']) && !empty($values['qf_vals']) && $values['qf_type'] != 'hierselect') {
                    if (!empty($_POST[$colName]) && !key_exists($_POST[$colName], $values['qf_vals'])) {
                        $this->controller->getEnv()->formErrorMessages[$colName] = INVALID_VALUE;
                        $this->form->getElement($colName)->setAttribute('class', 'error');
                        return false;
                    }
                }
            }
        }

        return true;
    }

    function setValidationSide($validationSide) {
        $this->validationSide = $validationSide;
    }

    function setMakeCRUD($value) {
        $this->makeCRUD = $value;
    }

    function getExportValues() {
        $values = $this->form->exportValues($this->getFormStructureColsForValidation());

        if (PEAR::isError($values)) {
            throw new Exception($values->getMessage());
        }


        foreach ($values as $colName => $value) {
            if (is_array($value)) {
                @$values[$colName] = $value[count($value) - 1];
            }
        }

        return $values;
    }

    /**
     * This function sets all insert,update,delete and view buttons
     * based on the action required by the user
     *
     * It changes $this->form object
     *
     * @return void
     */
    function makeButtons() {

        //pr (array($this->controller->getAction()->getCrudAction(),$this->crudValidate()) ,false);
        switch ($this->controller->getAction()->getCrudAction()) {
            case 'delete':
                if ($this->crudValidate()) {
                    $this->form->addElement('submit', INSERT_BUTTON_NAME, 'Inserir novamente', array('class' => 'botao'));
                    $this->form->addElement('button', NEW_BUTTON_NAME, NEW_BUTTON_LABEL, array('class' => 'botao'));
                } else {
                    $this->form->addElement('submit', UPDATE_BUTTON_NAME, UPDATE_BUTTON_LABEL, array('class' => 'botao'));
                    $this->form->addElement('button', DELETE_BUTTON_NAME, DELETE_BUTTON_LABEL, array('class' => 'botao'));
                    $this->form->addElement('button', NEW_BUTTON_NAME, NEW_BUTTON_LABEL, array('class' => 'botao'));
                }
                break;

            case 'new':
                $this->form->addElement('submit', INSERT_BUTTON_NAME, INSERT_BUTTON_LABEL, array('class' => 'botao'));
                break;
            case 'insert':
                if ($this->crudValidate()) {
                    $this->form->addElement('submit', UPDATE_BUTTON_NAME, UPDATE_BUTTON_LABEL, array('class' => 'botao'));
                    $this->form->addElement('button', DELETE_BUTTON_NAME, DELETE_BUTTON_LABEL, array('class' => 'botao'));
                    $this->form->addElement('button', NEW_BUTTON_NAME, NEW_BUTTON_LABEL, array('class' => 'botao'));
                } else {
                    $this->form->addElement('submit', INSERT_BUTTON_NAME, INSERT_BUTTON_LABEL, array('class' => 'botao'));
                }
                break;

            case 'lsUpdate':
            case 'update':
                $this->form->addElement('submit', UPDATE_BUTTON_NAME, UPDATE_BUTTON_LABEL, array('class' => 'botao'));
                $this->form->addElement('button', DELETE_BUTTON_NAME, DELETE_BUTTON_LABEL, array('class' => 'botao'));
                $this->form->addElement('button', NEW_BUTTON_NAME, NEW_BUTTON_LABEL, array('class' => 'botao'));
                break;

            default:
                throw new Exception('CrudAdction not defined.');
                break;
        }

        $this->form->addElement('button', LIST_BUTTON_NAME, LIST_BUTTON_LABEL, array('class' => 'list_button'));
    }

    /**
     * Seta os valores iniciais do formul�rio quando usu�rio clica numa lista para edi��o
     * Os valores s�o buscados da base de dados.
     *
     * @return avoid
     */
    function setListNames() {
        foreach ($this->formStructure->getCols() as $colName => $cols) {
            foreach ($cols as $col => $type) {
                if ($col == 'qf_type' && $type == 'hierselect') {
                    $avoids[] = $colName;
                }
            }
        }
        if (empty($avoids)) {
            $avoids = null;
        }
        return $this->dao->setListNames($avoids);
    }

    /**
     * This function adds hieraquic select element to the form
     * It changes $this->form object
     *
     * @return void
     *
     */
    function setHierSelect() {

        if (!empty($this->hierSelect)) {
            foreach ($this->hierSelect as $colName => $col) {

                if ($this->form->elementExists($colName)) {
                    $this->form->removeElement($colName);
                }

                $sel = $this->form->addElement('hierselect', $colName, $col['qf_label'], null, $col['qf_separator']);
                $sel->setOptions($col['opt']);
            }
        }
    }

    /**
     * Sets the values for hierarquic select such as
     * Country, state and city
     *
     * It changes the form struture by filling hierarquic select
     * with values from a DAO function defined in form structure
     *
     * @return void
     */
    function setHierSelectPost() {
        foreach ($this->formStructure->getcols() as $colName => $col) {
            if (isset($col['qf_type']) && $col['qf_type'] == 'hierselect') {
                $number = count($col['qf_vals']);

                switch ($number) {
                    case 3:
                        $select1[0] = $col['qf_vals'][0]['first'];
                        $paises = $this->facade->getDao($col['qf_vals'][0]['dao'])->$col['qf_vals'][0]['function']();
                        if ($paises) {
                            foreach ($this->facade->getDao($col['qf_vals'][0]['dao'])->$col['qf_vals'][0]['function']() as $paisCodigo => $paisDescricao) {
                                $select1[$paisCodigo] = $paisDescricao;
                                $select2[$paisCodigo][0] = $col['qf_vals'][1]['first'];
                                foreach ($this->facade->getDao($col['qf_vals'][1]['dao'])->$col['qf_vals'][1]['function']($paisCodigo) as $estadoCodigo => $estadoDescricao) {
                                    $select2[$paisCodigo][$estadoCodigo] = $estadoDescricao;
                                    $select3[$paisCodigo][$estadoCodigo][0] = $col['qf_vals'][2]['first'];
                                    foreach ($this->facade->getDao($col['qf_vals'][2]['dao'])->$col['qf_vals'][2]['function']($estadoCodigo) as $cidadeCodigo => $cidadeDescricao) {
                                        $select3[$paisCodigo][$estadoCodigo][$cidadeCodigo] = $cidadeDescricao;
                                    }
                                }
                            }
                        }
                        if ($this->controller->getAction()->getCrudAction() == 'lsUpdate') {
                            $cidadeCodigo = $_POST[$colName];
                            unset($_POST[$colName]);
                            $_POST[$colName][0] = $this->facade->getDao($col['qf_vals'][0]['dao'])->$col['qf_vals'][0]['function']($cidadeCodigo);
                            $_POST[$colName][1] = $this->facade->getDao($col['qf_vals'][1]['dao'])->$col['qf_vals'][1]['function'](null, $cidadeCodigo);
                            $_POST[$colName][2] = $cidadeCodigo;
                        }
                        break;

                    default:
                        throw new Exception('Number of iteractions not implemented yet: ' . $number);
                }

                if (!empty($select1) && !empty($select2)) {
                    $this->hierSelect[$colName]['name'] = $colName;
                    $this->hierSelect[$colName]['qf_label'] = $col['qf_label'];
                    $this->hierSelect[$colName]['qf_separator'] = $col['qf_separator'];
                    $this->hierSelect[$colName]['opt'] = array($select1, $select2, $select3);
                }
            }
        }
    }

    /**
     * This function set property class='error' to all element
     * on which was found any error
     *
     * It changes $this->form object
     *
     * @return void
     */
    function formatError() {
        $action = $this->controller->getAction()->getCrudAction();
        switch ($action) {
            case 'insert':
            case 'update':
                if (!$this->crudValidate()) {
                    foreach ($this->form->_errors as $elementName => $errorMsg) {
                        $this->form->getElement($elementName)->setAttribute('class', 'error');
                        $this->form->_errors[$elementName] = '<span class="error" >' . $errorMsg . '</span>';
                    }
                }
                break;

            default:
                break;
        }
    }

    /**
     * This function sets id property to all html elements
     * That is actually a copy of its name
     *
     * It changes $this->form object
     *
     * @return void
     *
     */
    function setIdToElements() {
        foreach ($this->form->_elements as $element) {
            $element->setAttribute('id', $element->_attributes['name']);
        }
    }

    public function getFromValues(HTML_QuickForm $form, classes_model_structure_Structure $formStructure) {
        $values = $form->exportValues($this->getFSCols($formStructure));
        foreach ($values as $colName => $value) {
            if (is_array($value)) {
                @$values[$colName] = $value[count($value) - 1];
            }
        }
        return $values;
    }

}

?>