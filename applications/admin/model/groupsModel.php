<?php

/**
 * Este arquivo Ã© parte do programa LiteFrame - lightWeight FrameWork
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


class admin_model_groupsModel extends classes_model_AbstractModel {



	function __construct(classes_controller_SystemController $controller){
		parent::__construct($controller);
	}


	public function formConfiguration(){

		$this->setInsertSuccessMsg('Inserido com Sucesso!!');
		$this->setUpdateSuccessMsg('Alterado com Sucesso!!');
		$this->setDeleteSuccessMsg('Excluído com Sucesso!!');
		$this->setNewRegistryMsg('');
		$this->setLsUpdateMsg('');



		$action  = $this->controller->getAction()->getCrudAction();
		switch ($action) {
			case 'insert':
			case 'update':
				if( !$this->crudValidate() ){
					foreach($this->form->_errors as $elementName=>$errorMsg){
						$this->form->getElement($elementName)->setAttribute('class','error');
						$this->form->_errors[$elementName]='<div class="error">'.$errorMsg.'</div>';
					}
				}
				break;

			default:
				break;
		}
	}





	function getAllActions(){

		$actions = $this->getActions();

		$apps = array();
		if(isset($_POST['id'])){
			$groupActions =  $this->facade->getDAO('admin_dao_actionDAO')->getGroupActions($_POST['id']);
			foreach ($actions as $key1=>$action ){
				if(!in_array($action['app'],$apps)){
					$apps[] = $action['app'];
				}
				if(!empty($groupActions)){
					foreach ($groupActions as $groupAction ){
						if( in_array($action['id'] , $groupAction )){
							$actions[$key1]['user_in'] = true;
						}
					}
				}
			}
			$op = array();
			foreach ($apps as $app ){
				foreach ($actions as $key=>$action){
					if($app == $action['app'] ) {
						$op[$app][] = $action ;
					}
				}
			}

			return $op ;
		}
		else{
			return array();
		}

	}



	function getActions (){
		return $this->facade->getActions();
	}



}


?>