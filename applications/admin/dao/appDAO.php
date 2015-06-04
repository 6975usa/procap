<?php

/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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

class admin_dao_appDAO extends classes_dao_AbstractDAO
{

	public $table = 'application';

	function __construct( ){
		parent::__construct();
	}


	public function setConnString(){
		return admin_config_DatabaseConfiguration::getConn('app');
	}

	public function setMdb2Conn(){
		return admin_config_DatabaseConfiguration::getConn('app');
	}

	public function getConnInfo(){
		return admin_config_DatabaseConfiguration::getConnInfo('app');
	}


	public function getListNames(){
		return  array(
		'appList' => "
            SELECT
               a.id
               ,a.name
               ,a.description
            from application as a
            "
            );
	}


	function getNextIdVal($pk){
		$sql = " select max($pk)+1 as nextval from `application` ";
		$rs = $this->execute($sql);
		if(empty($rs->fields['nextval'])){
			return '1';
		}
		return $rs->fields['nextval'];
	}




	function getApplications(){
		$user = classes_Singleton::getInstance('classes_controller_user');
		$userId = $user->getProperty('id');
		$userOfficeId = $user->getProperty('office_id');
		if($userId == '1'){
			$sql = '
		         select id as codigo , name as descricao
		         from application
          ';
			$res = $this->execute($sql);
		}
		else{
			$sql ='
		         select app.id as codigo , app.name as descricao
		         from application as app
		         	inner join officeapplication as oa on oa.application_id = app.id
	         	where oa.office_id = ? and app.id <> "1" and app.id <> "2"
				';
			$res = $this->execute($sql,array($userOfficeId));
		}
		return $res->getAssoc();
	}





	function getApps(){
		$sql = '
         select id  , name
         from application
          ';
		$res = $this->execute($sql);
		return $res->getRows();
	}


	function getAppGroups($appId){
		$sql = '
         select  id as codigo  , name as descricao
         from groups
         where groups.application_id = ?
          ';
		$res = $this->execute($sql,array($appId));
		return $res->getAssoc();
	}


	function getOfficeApps($officeId){
		$sql = '
            SELECT a.id AS id, a.name AS name
            FROM `application` a
            INNER JOIN officeapplication oa ON oa.application_id = a.id
            inner JOIN office o ON o.id = oa.office_id
            WHERE oa.office_id = ?
          ';
		$res = $this->execute($sql,array($officeId));
		return $res->getRows();
	}



}



?>