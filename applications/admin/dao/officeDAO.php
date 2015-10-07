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

class admin_dao_officeDAO extends classes_dao_AbstractDAO
{

	public $table = 'office';

	function __construct( ){
		parent::__construct();
	}


	public function setConnString(){
		return admin_config_DatabaseConfiguration::getConn('office');
	}

	public function setMdb2Conn(){
		return admin_config_DatabaseConfiguration::getConn('office');
	}

	public function getConnInfo(){
		return admin_config_DatabaseConfiguration::getConnInfo('office');
	}


	public function getListNames(){

		if(isset($this->controller->getEnv()->request['id'])){
			//$w = "where user.office_id = '".$this->controller->getEnv()->request['id']."' ";
		}
		else{
			$w = null;
		}

		return  array(

		'officeList' => "
            SELECT
               id
               ,	name
               ,	description
               , if(active=1,'sim','não') as active
               ,	creation_date
               ,	creator_id
               ,	fullname
               ,	logo
            from office ",

            'officeUsersList' => "
            select
               loginname
               ,fullname
               ,active
               ,description
               ,user.email
            from user
            $w ",
            );
	}


	function getNextIdVal($pk){
		$sql = " select max($pk)+1 as nextval from `office` ";
		$rs = $this->execute($sql);
		if(empty($rs->fields['nextval'])){
			return '1';
		}
		return $rs->fields['nextval'];
	}





	public function getOffices(){
		$user = classes_Singleton::getInstance('classes_controller_user');
		$userId = $user->getProperty('id');
		$userOfficeId = $user->getProperty('office_id');
		if($userId == '1'){
			$sql =' select
      			distinct id as codigo
      			, concat(fullname , "  (" , name , ")") as descricao
  			from office
  			';
			$res = $this->execute($sql);
		}
		else{
			$sql =' select
      			distinct o.id as codigo
      			, concat(o.fullname , "  (" , o.name , ")") as descricao
  			from office as o inner join officeapplication as oa on oa.office_id = o.id
  			    inner join application as app on app.id = oa.application_id
  			where o.id = ?
				';
			$res = $this->execute($sql,array($userOfficeId));
		}
		return $res->getAssoc();

	}



	public function getOfficeUsers($officeId){
		$sql =' select user.loginname , user.fullname , user.active , user.description , user.email
               from user
               where user.office_id = ? ';
		$res = $this->execute($sql,array($officeId));
		return $res->getRows();

	}



	function afterUpdate($formStructure,$formValues,$messages){

		$ad = $this->afterDelete($formStructure,$formStructure,$messages);

		if ( isset($_POST['id'])   && isset($_POST['apps'] )  ){

			foreach ( $_POST['apps'] as $appId=> $appName ){
				$this->execute(" insert into officeapplication (office_id,application_id) values (?,?) " ,array($_POST['id'],$appId) );
			}

		}
		return true && $ad ;
	}



	function afterInsert($formStructure,$formValues,$messages){
		return $this->afterUpdate($formStructure,$formValues,$messages);
	}



	function afterDelete($formStructure,$formValues,$messages){
		$officeId = $_POST['id'];
		$this->execute(" delete from officeapplication where office_id = ?  " ,array($officeId) );
		return true;
	}






}



?>