<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
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
require_once ('MDB2.php');
class classes_dao_DatabaseConfiguration extends MDB2_Driver_Common {
	static $conn;
	public static function _connect($dsn) {
		$options = array (
				'debug' => 2,
				'portability' => MDB2_PORTABILITY_ALL 
		);
		
		$phptype = $dsn["phptype"];
		$dsn = $dsn ['phptype'] . '://' . $dsn ['username'] . ':' . $dsn ['password'] . '@' . $dsn ['hostspec'] . '/' . $dsn ['database'];
		
		$m = new MDB2();
		$mdb2 = $m->connect($dsn, $options);
		if (PEAR::isError ( $mdb2 )) {
			throw new Exception ( '[' . $mdb2->getMessage () . '] ' . $mdb2->getUserInfo () );
		}
		self::$conn [$phptype] = $mdb2;
		return self::$conn [$phptype];
	}
}

?>