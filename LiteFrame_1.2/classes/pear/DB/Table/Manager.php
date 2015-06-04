<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Creates, checks or alters tables from DB_Table definitions.
 * 
 * DB_Table_Manager provides database automated table creation
 * facilities.
 * 
 * PHP versions 4 and 5
 *
 * LICENSE:
 * 
 * Copyright (c) 1997-2007, Paul M. Jones <pmjones@php.net>
 *                          David C. Morse <morse@php.net>
 *                          Mark Wiesemann <wiesemann@php.net>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *    * Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the 
 *      documentation and/or other materials provided with the distribution.
 *    * The names of the authors may not be used to endorse or promote products 
 *      derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
 * IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
 * OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Database
 * @package  DB_Table
 * @author   Paul M. Jones <pmjones@php.net>
 * @author   David C. Morse <morse@php.net>
 * @author   Mark Wiesemann <wiesemann@php.net>
 * @license  http://opensource.org/licenses/bsd-license.php New BSD License
 * @version  CVS: $Id: Manager.php,v 1.37 2007/12/13 16:52:15 wiesemann Exp $
 * @link     http://pear.php.net/package/DB_Table
 */

require_once 'DB/Table.php';


/**
* Valid types for the different data types in the different DBMS.
*/
$GLOBALS['_DB_TABLE']['valid_type'] = array(
    'fbsql' => array(  // currently not supported
        'boolean'   => '',
        'char'      => '',
        'varchar'   => '',
        'smallint'  => '',
        'integer'   => '',
        'bigint'    => '',
        'decimal'   => '',
        'single'    => '',
        'double'    => '',
        'clob'      => '',
        'date'      => '',
        'time'      => '',
        'timestamp' => ''
    ),
    'ibase' => array(
        'boolean'   => array('char', 'integer', 'real', 'smallint'),
        'char'      => array('char', 'varchar'),
        'varchar'   => 'varchar',
        'smallint'  => array('integer', 'smallint'),
        'integer'   => 'integer',
        'bigint'    => array('bigint', 'integer'),
        'decimal'   => 'numeric',
        'single'    => array('double precision', 'float'),
        'double'    => 'double precision',
        'clob'      => 'blob',
        'date'      => 'date',
        'time'      => 'time',
        'timestamp' => 'timestamp'
    ),
    'mssql' => array(  // currently not supported
        'boolean'   => '',
        'char'      => '',
        'varchar'   => '',
        'smallint'  => '',
        'integer'   => '',
        'bigint'    => '',
        'decimal'   => '',
        'single'    => '',
        'double'    => '',
        'clob'      => '',
        'date'      => '',
        'time'      => '',
        'timestamp' => ''
    ),
    'mysql' => array(
        'boolean'   => array('char', 'decimal', 'int', 'real', 'tinyint'),
        'char'      => array('char', 'string', 'varchar'),
        'varchar'   => array('char', 'string', 'varchar'),
        'smallint'  => array('smallint', 'int'),
        'integer'   => 'int',
        'bigint'    => array('int', 'bigint'),
        'decimal'   => array('decimal', 'real'),
        'single'    => array('double', 'real'),
        'double'    => array('double', 'real'),
        'clob'      => array('blob', 'longtext', 'tinytext', 'text', 'mediumtext'),
        'date'      => array('char', 'date', 'string'),
        'time'      => array('char', 'string', 'time'),
        'timestamp' => array('char', 'datetime', 'string')
    ),
    'mysqli' => array(
        'boolean'   => array('char', 'decimal', 'tinyint'),
        'char'      => array('char', 'varchar'),
        'varchar'   => array('char', 'varchar'),
        'smallint'  => array('smallint', 'int'),
        'integer'   => 'int',
        'bigint'    => array('int', 'bigint'),
        'decimal'   => 'decimal',
        'single'    => array('double', 'float'),
        'double'    => 'double',
        'clob'      => array('blob', 'longtext', 'tinytext', 'text', 'mediumtext'),
        'date'      => array('char', 'date', 'varchar'),
        'time'      => array('char', 'time', 'varchar'),
        'timestamp' => array('char', 'datetime', 'varchar')
    ),
    'oci8' => array(
        'boolean'   => 'number',
        'char'      => array('char', 'varchar2'),
        'varchar'   => 'varchar2',
        'smallint'  => 'number',
        'integer'   => 'number',
        'bigint'    => 'number',
        'decimal'   => 'number',
        'single'    => array('float', 'number'),
        'double'    => array('float', 'number'),
        'clob'      => 'clob',
        'date'      => array('char', 'date'),
        'time'      => array('char', 'date'),
        'timestamp' => array('char', 'date')
    ),
    'pgsql' => array(
        'boolean'   => array('bool', 'numeric'),
        'char'      => array('bpchar', 'varchar'),
        'varchar'   => 'varchar',
        'smallint'  => array('int2', 'int4'),
        'integer'   => 'int4',
        'bigint'    => array('int4', 'int8'),
        'decimal'   => 'numeric',
        'single'    => array('float4', 'float8'),
        'double'    => 'float8',
        'clob'      => array('oid', 'text'),
        'date'      => array('bpchar', 'date'),
        'time'      => array('bpchar', 'time'),
        'timestamp' => array('bpchar', 'timestamp')
    ),
    'sqlite' => array(
        'boolean'   => 'boolean',
        'char'      => 'char',
        'varchar'   => array('char', 'varchar'),
        'smallint'  => array('int', 'smallint'),
        'integer'   => array('int', 'integer'),
        'bigint'    => array('int', 'bigint'),
        'decimal'   => array('decimal', 'numeric'),
        'single'    => array('double', 'float'),
        'double'    => 'double',
        'clob'      => array('clob', 'longtext'),
        'date'      => 'date',
        'time'      => 'time',
        'timestamp' => array('datetime', 'timestamp')
    ),
);

/**
* Mapping between DB_Table and MDB2 data types.
*/
$GLOBALS['_DB_TABLE']['mdb2_type'] = array(
    'boolean'   => 'boolean',
    'char'      => 'text',
    'varchar'   => 'text',
    'smallint'  => 'integer',
    'integer'   => 'integer',
    'bigint'    => 'integer',
    'decimal'   => 'decimal',
    'single'    => 'float',
    'double'    => 'float',
    'clob'      => 'clob',
    'date'      => 'date',
    'time'      => 'time',
    'timestamp' => 'timestamp'
);

/**
 * Creates, checks or alters tables from DB_Table definitions.
 * 
 * DB_Table_Manager provides database automated table creation
 * facilities.
 * 
 * @category Database
 * @package  DB_Table
 * @author   Paul M. Jones <pmjones@php.net>
 * @author   David C. Morse <morse@php.net>
 * @author   Mark Wiesemann <wiesemann@php.net>
 * @version  Release: 1.5.2
 * @link     http://pear.php.net/package/DB_Table
 */
class DB_Table_Manager {


   /**
    * 
    * Create the table based on DB_Table column and index arrays.
    * 
    * @static
    * 
    * @access public
    * 
    * @param object &$db A PEAR DB/MDB2 object.
    * 
    * @param string $table The table name to connect to in the database.
    * 
    * @param mixed $column_set A DB_Table $this->col array.
    * 
    * @param mixed $index_set A DB_Table $this->idx array.
    * 
    * @return mixed Boolean false if there was no attempt to create the
    * table, boolean true if the attempt succeeded, and a PEAR_Error if
    * the attempt failed.
    * 
    */

    function create(&$db, $table, $column_set, $index_set)
    {
        if (is_subclass_of($db, 'db_common')) {
            $backend = 'db';
        } elseif (is_subclass_of($db, 'mdb2_driver_common')) {
            $backend = 'mdb2';
            $db->loadModule('Manager');
        }
        $phptype = $db->phptype;

        // columns to be created
        $column = array();

        // max. value for scope (only used with MDB2 as backend)
        $max_scope = 0;
        
        // indexes to be created
        $indexes = array();
        
        // check the table name
        $name_check = DB_Table_Manager::_validateTableName($table);
        if (PEAR::isError($name_check)) {
            return $name_check;
        }
        
        
        // -------------------------------------------------------------
        // 
        // validate each column mapping and build the individual
        // definitions, and note column indexes as we go.
        //
        
        if (is_null($column_set)) {
            $column_set = array();
        }
        
        foreach ($column_set as $colname => $val) {
            
            $colname = trim($colname);
            
            // check the column name
            $name_check = DB_Table_Manager::_validateColumnName($colname);
            if (PEAR::isError($name_check)) {
                return $name_check;
            }
            
            
            // prepare variables
            $type    = (isset($val['type']))    ? $val['type']    : null;
            $size    = (isset($val['size']))    ? $val['size']    : null;
            $scope   = (isset($val['scope']))   ? $val['scope']   : null;
            $require = (isset($val['require'])) ? $val['require'] : null;
            $default = (isset($val['default'])) ? $val['default'] : null;

            if ($backend == 'mdb2') {

                // get the declaration string
                $result = DB_Table_Manager::getDeclareMDB2($type,
                    $size, $scope, $require, $default, $max_scope);

                // did it work?
                if (PEAR::isError($result)) {
                    $result->userinfo .= " ('$colname')";
                    return $result;
                }

                // add the declaration to the array of all columns
                $column[$colname] = $result;

            } else {

                // get the declaration string
                $result = DB_Table_Manager::getDeclare($phptype, $type,
                    $size, $scope, $require, $default);

                // did it work?
                if (PEAR::isError($result)) {
                    $result->userinfo .= " ('$colname')";
                    return $result;
                }

                // add the declaration to the array of all columns
                $column[] = "$colname $result";

            }

        }
        
        
        // -------------------------------------------------------------
        // 
        // validate the indexes.
        //
        
        if (is_null($index_set)) {
            $index_set = array();
        }

        $count_primary_keys = 0;

        foreach ($index_set as $idxname => $val) {
            
            list($type, $cols) = DB_Table_Manager::_getIndexTypeAndColumns($val, $idxname);

            $newIdxName = '';

            // check the index definition
            $index_check = DB_Table_Manager::_validateIndexName($idxname,
                $table, $phptype, $type, $cols, $column_set, $newIdxName);
            if (PEAR::isError($index_check)) {
                return $index_check;
            }

            // check number of primary keys (only one is allowed)
            if ($type == 'primary') {
                // SQLite does not support primary keys
                if ($phptype == 'sqlite') {
                    return DB_Table::throwError(DB_TABLE_ERR_DECLARE_PRIM_SQLITE);
                }
                $count_primary_keys++;
            }
            if ($count_primary_keys > 1) {
                return DB_Table::throwError(DB_TABLE_ERR_DECLARE_PRIMARY);
            }

            // create index entry
            if ($backend == 'mdb2') {

                // array with column names as keys
                $idx_cols = array();
                foreach ($cols as $col) {
                    $idx_cols[$col] = array();
                }

                switch ($type) {
                    case 'primary':
                        $indexes['primary'][$newIdxName] =
                            array('fields'  => $idx_cols,
                                  'primary' => true);
                        break;
                    case 'unique':
                        $indexes['unique'][$newIdxName] =
                            array('fields' => $idx_cols,
                                  'unique' => true);
                        break;
                    case 'normal':
                        $indexes['normal'][$newIdxName] =
                            array('fields' => $idx_cols);
                        break;
                }
                
            } else {

                $indexes[] = DB_Table_Manager::getDeclareForIndex($phptype,
                    $type, $newIdxName, $table, $cols);

            }
            
        }
        
        
        // -------------------------------------------------------------
        // 
        // now for the real action: create the table and indexes!
        //
        if ($backend == 'mdb2') {

            // save user defined 'decimal_places' option
            $decimal_places = $db->getOption('decimal_places');
            $db->setOption('decimal_places', $max_scope);

            // attempt to create the table
            $result = $db->manager->createTable($table, $column);
            // restore user defined 'decimal_places' option
            $db->setOption('decimal_places', $decimal_places);
            if (PEAR::isError($result)) {
                return $result;
            }

        } else {

            // build the CREATE TABLE command
            $cmd = "CREATE TABLE $table (\n\t";
            $cmd .= implode(",\n\t", $column);
            $cmd .= "\n)";

            // attempt to create the table
            $result = $db->query($cmd);
            if (PEAR::isError($result)) {
                return $result;
            }

        }

        $result = DB_Table_Manager::_createIndexesAndContraints($db, $backend,
                                                                $table, $indexes);
        if (PEAR::isError($result)) {
            return $result;
        }

        // we're done!
        return true;
    }


   /**
    * 
    * Verify whether the table and columns exist, whether the columns
    * have the right type and whether the indexes exist.
    * 
    * @static
    * 
    * @access public
    * 
    * @param object &$db A PEAR DB/MDB2 object.
    * 
    * @param string $table The table name to connect to in the database.
    * 
    * @param mixed $column_set A DB_Table $this->col array.
    * 
    * @param mixed $index_set A DB_Table $this->idx array.
    * 
    * @return mixed Boolean true if the verification was successful, and a
    * PEAR_Error if verification failed.
    * 
    */

    function verify(&$db, $table, $column_set, $index_set)
    {
        if (is_subclass_of($db, 'db_common')) {
            $backend = 'db';
            $reverse = $db;
            $table_info_mode = DB_TABLEINFO_FULL;
            $table_info_error = DB_ERROR_NEED_MORE_DATA;
        } elseif (is_subclass_of($db, 'mdb2_driver_common')) {
            $backend = 'mdb2';
            $reverse = $this->db->loadModule('Reverse');
            $table_info_mode = MDB2_TABLEINFO_FULL;
            $table_info_error = MDB2_ERROR_NEED_MORE_DATA;
        }
        $phptype = $db->phptype;

        // check #1: does the table exist?

        // check the table name
        $name_check = DB_Table_Manager::_validateTableName($table);
        if (PEAR::isError($name_check)) {
            return $name_check;
        }

        // get table info
        $tableInfo = $reverse->tableInfo($table, $table_info_mode);
        if (PEAR::isError($tableInfo)) {
            if ($tableInfo->getCode() == $table_info_error) {
                return DB_Table::throwError(
                    DB_TABLE_ERR_VER_TABLE_MISSING,
                    "(table='$table')"
                );
            }
            return $tableInfo;
        }
        $tableInfoOrder = array_change_key_case($tableInfo['order'], CASE_LOWER);

        if (is_null($column_set)) {
            $column_set = array();
        }

        foreach ($column_set as $colname => $val) {
            $colname = strtolower(trim($colname));
            
            // check the column name
            $name_check = DB_Table_Manager::_validateColumnName($colname);
            if (PEAR::isError($name_check)) {
                return $name_check;
            }

            // check #2: do all columns exist?
            $column_exists = DB_Table_Manager::_columnExists($colname,
                $tableInfoOrder, 'verify');
            if (PEAR::isError($column_exists)) {
                return $column_exists;
            }

            // check #3: do all columns have the right type?

            // check whether the column type is a known type
            $type_check = DB_Table_Manager::_validateColumnType($phptype, $val['type']);
            if (PEAR::isError($type_check)) {
                return $type_check;
            }

            // check whether the column has the right type
            $type_check = DB_Table_Manager::_checkColumnType($phptype,
                $colname, $val['type'], $tableInfoOrder, $tableInfo, 'verify');
            if (PEAR::isError($type_check)) {
                return $type_check;
            }

        }

        // check #4: do all indexes exist?
        $table_indexes = DB_Table_Manager::getIndexes($db, $table);
        if (PEAR::isError($table_indexes)) {
            return $table_indexes;
        }

        if (is_null($index_set)) {
            $index_set = array();
        }
        
        foreach ($index_set as $idxname => $val) {
          
            list($type, $cols) = DB_Table_Manager::_getIndexTypeAndColumns($val, $idxname);

            $newIdxName = '';

            // check the index definition
            $index_check = DB_Table_Manager::_validateIndexName($idxname,
                $table, $phptype, $type, $cols, $column_set, $newIdxName);
            if (PEAR::isError($index_check)) {
                return $index_check;
            }

            // check whether the index has the right type and has all
            // specified columns
            $index_check = DB_Table_Manager::_checkIndex($idxname, $newIdxName,
                $type, $cols, $table_indexes, 'verify');
            if (PEAR::isError($index_check)) {
                return $index_check;
            }

        }

        return true;
    }


   /**
    * 
    * Alter columns and indexes of a table based on DB_Table column and index
    * arrays.
    * 
    * @static
    * 
    * @access public
    * 
    * @param object &$db A PEAR DB/MDB2 object.
    * 
    * @param string $table The table name to connect to in the database.
    * 
    * @param mixed $column_set A DB_Table $this->col array.
    * 
    * @param mixed $index_set A DB_Table $this->idx array.
    * 
    * @return bool|object True if altering was successful or a PEAR_Error on
    * failure.
    * 
    */

    function alter(&$db, $table, $column_set, $index_set)
    {
        $phptype = $db->phptype;

        if (is_subclass_of($db, 'db_common')) {
            $backend = 'db';
            $reverse = $db;
            // workaround for missing index and constraint information methods
            // in PEAR::DB ==> use adopted code from MDB2's driver classes
            require_once 'DB/Table/Manager/' . $phptype . '.php';
            $classname = 'DB_Table_Manager_' . $phptype;
            $dbtm = new $classname();
            $dbtm->_db = $db;  // pass database instance to the 'workaround' class
            $manager = $dbtm;
            $table_info_mode = DB_TABLEINFO_FULL;
            $ok_const = DB_OK;
        } elseif (is_subclass_of($db, 'mdb2_driver_common')) {
            $backend = 'mdb2';
            $db->loadModule('Reverse');
            $manager = $db->manager;
            $reverse = $db->reverse;
            $table_info_mode = MDB2_TABLEINFO_FULL;
            $ok_const = MDB2_OK;
        }

        // get table info
        $tableInfo = $reverse->tableInfo($table, $table_info_mode);
        if (PEAR::isError($tableInfo)) {
            return $tableInfo;
        }
        $tableInfoOrder = array_change_key_case($tableInfo['order'], CASE_LOWER);

        // emulate MDB2 Reverse extension for PEAR::DB as backend
        if (is_subclass_of($db, 'db_common')) {
            $reverse = $dbtm;
        }

        // check (and alter) columns
        if (is_null($column_set)) {
            $column_set = array();
        }

        foreach ($column_set as $colname => $val) {
            $colname = strtolower(trim($colname));
            
            // check the column name
            $name_check = DB_Table_Manager::_validateColumnName($colname);
            if (PEAR::isError($name_check)) {
                return $name_check;
            }

            // check the column's existence
            $column_exists = DB_Table_Manager::_columnExists($colname,
                $tableInfoOrder, 'alter');
            if (PEAR::isError($column_exists)) {
                return $column_exists;
            }
            if ($column_exists === false) {  // add the column
                $definition = DB_Table_Manager::_getColumnDefinition($backend,
                    $phptype, $val);
                if (PEAR::isError($definition)) {
                    return $definition;
                }
                $changes = array('add' => array($colname => $definition));
                if (array_key_exists('debug', $GLOBALS['_DB_TABLE'])) {
                    echo "(alter) New table field will be added ($colname):\n";
                    var_dump($changes);
                    echo "\n";
                }
                $result = $manager->alterTable($table, $changes, false);
                if (PEAR::isError($result)) {
                    return $result;
                }
                continue;
            }

            // check whether the column type is a known type
            $type_check = DB_Table_Manager::_validateColumnType($phptype, $val['type']);
            if (PEAR::isError($type_check)) {
                return $type_check;
            }

            // check whether the column has the right type
            $type_check = DB_Table_Manager::_checkColumnType($phptype,
                $colname, $val['type'], $tableInfoOrder, $tableInfo, 'alter');
            if (PEAR::isError($type_check)) {
                return $type_check;
            }
            if ($type_check === false) {  // change the column type
                $definition = DB_Table_Manager::_getColumnDefinition($backend,
                    $phptype, $val);
                if (PEAR::isError($definition)) {
                    return $definition;
                }
                $changes = array('change' =>
                    array($colname => array('type' => null,
                                            'definition' => $definition)));
                if (array_key_exists('debug', $GLOBALS['_DB_TABLE'])) {
                    echo "(alter) Table field's type will be changed ($colname):\n";
                    var_dump($changes);
                    echo "\n";
                }
                $result = $manager->alterTable($table, $changes, false);
                if (PEAR::isError($result)) {
                    return $result;
                }
                continue;
            }

        }

        // get information about indexes / constraints
        $table_indexes = DB_Table_Manager::getIndexes($db, $table);
        if (PEAR::isError($table_indexes)) {
            return $table_indexes;
        }

        // check (and alter) indexes / constraints
        if (is_null($index_set)) {
            $index_set = array();
        }
        
        foreach ($index_set as $idxname => $val) {
          
            list($type, $cols) = DB_Table_Manager::_getIndexTypeAndColumns($val, $idxname);

            $newIdxName = '';

            // check the index definition
            $index_check = DB_Table_Manager::_validateIndexName($idxname,
                $table, $phptype, $type, $cols, $column_set, $newIdxName);
            if (PEAR::isError($index_check)) {
                return $index_check;
            }

            // check whether the index has the right type and has all
            // specified columns
            $index_check = DB_Table_Manager::_checkIndex($idxname, $newIdxName,
                $type, $cols, $table_indexes, 'alter');
            if (PEAR::isError($index_check)) {
                return $index_check;
            }
            if ($index_check === false) {  // (1) drop wrong index/constraint
                                           // (2) add right index/constraint
                if ($backend == 'mdb2') {
                    // save user defined 'idxname_format' option
                    $idxname_format = $db->getOption('idxname_format');
                    $db->setOption('idxname_format', '%s');
                }
                // drop index/constraint only if it exists
                foreach (array('normal', 'unique', 'primary') as $idx_type) {
                    if (array_key_exists(strtolower($newIdxName),
                                         $table_indexes[$idx_type])) {
                        if (array_key_exists('debug', $GLOBALS['_DB_TABLE'])) {
                            echo "(alter) Index/constraint will be deleted (name: '$newIdxName', type: '$idx_type').\n";
                        }
                        if ($idx_type == 'normal') {
                            $result = $manager->dropIndex($table, $newIdxName);
                        } else {
                            $result = $manager->dropConstraint($table, $newIdxName);
                        }
                        if (PEAR::isError($result)) {
                            if ($backend == 'mdb2') {
                                // restore user defined 'idxname_format' option
                                $db->setOption('idxname_format', $idxname_format);
                            }
                            return $result;
                        }
                        break;
                    }
                }

                // prepare index/constraint definition
                $indexes = array();
                if ($backend == 'mdb2') {

                    // array with column names as keys
                    $idx_cols = array();
                    foreach ($cols as $col) {
                        $idx_cols[$col] = array();
                    }

                    switch ($type) {
                        case 'primary':
                            $indexes['primary'][$newIdxName] =
                                array('fields'  => $idx_cols,
                                      'primary' => true);
                            break;
                        case 'unique':
                            $indexes['unique'][$newIdxName] =
                                array('fields' => $idx_cols,
                                      'unique' => true);
                            break;
                        case 'normal':
                            $indexes['normal'][$newIdxName] =
                                array('fields' => $idx_cols);
                            break;
                    }

                } else {

                    $indexes[] = DB_Table_Manager::getDeclareForIndex($phptype,
                        $type, $newIdxName, $table, $cols);

                }

                // create index/constraint
                if (array_key_exists('debug', $GLOBALS['_DB_TABLE'])) {
                    echo "(alter) New index/constraint will be created (name: '$newIdxName', type: '$type'):\n";
                    var_dump($indexes);
                    echo "\n";
                }
                $result = DB_Table_Manager::_createIndexesAndContraints(
                    $db, $backend, $table, $indexes);
                if ($backend == 'mdb2') {
                    // restore user defined 'idxname_format' option
                    $db->setOption('idxname_format', $idxname_format);
                }
                if (PEAR::isError($result)) {
                    return $result;
                }

                continue;
            }

        }

        return true;
    }


   /**
    * 
    * Check whether a table exists.
    * 
    * @static
    * 
    * @access public
    * 
    * @param object &$db A PEAR DB/MDB2 object.
    * 
    * @param string $table The table name that should be checked.
    * 
    * @return bool|object True if the table exists, false if not, or a
    * PEAR_Error on failure.
    * 
    */

    function tableExists(&$db, $table)
    {
        if (is_subclass_of($db, 'db_common')) {
            $list = $db->getListOf('tables');
        } elseif (is_subclass_of($db, 'mdb2_driver_common')) {
            $db->loadModule('Manager');
            $list = $db->manager->listTables();
        }
        if (PEAR::isError($list)) {
            return $list;
        }
        array_walk($list, create_function('&$value,$key',
                                          '$value = trim(strtolower($value));'));
        return in_array(strtolower($table), $list);
    }


   /**
    * 
    * Get the column declaration string for a DB_Table column.
    * 
    * @static
    * 
    * @access public
    * 
    * @param string $phptype The DB/MDB2 phptype key.
    * 
    * @param string $coltype The DB_Table column type.
    * 
    * @param int $size The size for the column (needed for string and
    * decimal).
    * 
    * @param int $scope The scope for the column (needed for decimal).
    * 
    * @param bool $require True if the column should be NOT NULL, false
    * allowed to be NULL.
    * 
    * @param string $default The SQL calculation for a default value.
    * 
    * @return string|object A declaration string on success, or a
    * PEAR_Error on failure.
    * 
    */

    function getDeclare($phptype, $coltype, $size = null, $scope = null,
        $require = null, $default = null)
    {
        // validate char/varchar/decimal type declaration
        $validation = DB_Table_Manager::_validateTypeDeclaration($coltype, $size,
                                                                 $scope);
        if (PEAR::isError($validation)) {
            return $validation;
        }
        
        // map of column types and declarations for this RDBMS
        $map = $GLOBALS['_DB_TABLE']['type'][$phptype];
        
        // is it a recognized column type?
        $types = array_keys($map);
        if (! in_array($coltype, $types)) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_TYPE,
                "('$coltype')"
            );
        }
        
        // basic declaration
        switch ($coltype) {
    
        case 'char':
        case 'varchar':
            $declare = $map[$coltype] . "($size)";
            break;
        
        case 'decimal':
            $declare = $map[$coltype] . "($size,$scope)";
            break;
        
        default:
            $declare = $map[$coltype];
            break;
        
        }
        
        // set the "NULL"/"NOT NULL" portion
        $null = ' NULL';
        if ($phptype == 'ibase') {  // Firebird does not like 'NULL'
            $null = '';             // in CREATE TABLE
        }
        if ($phptype == 'pgsql') {  // PostgreSQL does not like 'NULL'
            $null = '';             // in ALTER TABLE
        }
        $declare .= ($require) ? ' NOT NULL' : $null;
        
        // set the "DEFAULT" portion
        if ($default) {
            switch ($coltype) {        
                case 'char':
                case 'varchar':
                case 'clob':
                    $declare .= " DEFAULT '$default'";
                    break;

                default:
                    $declare .= " DEFAULT $default";
                    break;
            }
        }
        
        // done
        return $declare;
    }


   /**
    * 
    * Get the column declaration string for a DB_Table column.
    * 
    * @static
    * 
    * @access public
    * 
    * @param string $coltype The DB_Table column type.
    * 
    * @param int $size The size for the column (needed for string and
    * decimal).
    * 
    * @param int $scope The scope for the column (needed for decimal).
    * 
    * @param bool $require True if the column should be NOT NULL, false
    * allowed to be NULL.
    * 
    * @param string $default The SQL calculation for a default value.
    * 
    * @param int $max_scope The maximal scope for all table column
    * (pass-by-reference).
    * 
    * @return string|object A MDB2 column definition array on success, or a
    * PEAR_Error on failure.
    * 
    */

    function getDeclareMDB2($coltype, $size = null, $scope = null,
        $require = null, $default = null, &$max_scope)
    {
        // validate char/varchar/decimal type declaration
        $validation = DB_Table_Manager::_validateTypeDeclaration($coltype, $size,
                                                                 $scope);
        if (PEAR::isError($validation)) {
            return $validation;
        }

        // map of MDB2 column types
        $map = $GLOBALS['_DB_TABLE']['mdb2_type'];
        
        // is it a recognized column type?
        $types = array_keys($map);
        if (! in_array($coltype, $types)) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_TYPE,
                "('$coltype')"
            );
        }

        // build declaration array
        $new_column = array(
            'type'    => $map[$coltype],
            'notnull' => $require
        );

        if ($size) {
            $new_column['length'] = $size;
        }

        // determine integer length to be used in MDB2
        if (in_array($coltype, array('smallint', 'integer', 'bigint'))) {
            switch ($coltype) {
                case 'smallint':
                    $new_column['length'] = 2;
                    break;
                case 'integer':
                    $new_column['length'] = 4;
                    break;
                case 'bigint':
                    $new_column['length'] = 5;
                    break;
            }
        }

        if ($scope) {
            $max_scope = max($max_scope, $scope);
        }

        if ($default) {
            $new_column['default'] = $default;
        }

        return $new_column;
    }


   /**
    * 
    * Get the index declaration string for a DB_Table index.
    * 
    * @static
    * 
    * @access public
    * 
    * @param string $phptype The DB phptype key.
    * 
    * @param string $type The index type.
    * 
    * @param string $idxname The index name.
    * 
    * @param string $table The table name.
    * 
    * @param mixed $cols Array with the column names for the index.
    * 
    * @return string A declaration string.
    * 
    */

    function getDeclareForIndex($phptype, $type, $idxname, $table, $cols)
    {
        // string of column names
        $colstring = implode(', ', $cols);

        switch ($type) {

            case 'primary':
                switch ($phptype) {
                    case 'ibase':
                    case 'oci8':
                    case 'pgsql':
                        $declare  = "ALTER TABLE $table ADD";
                        $declare .= " CONSTRAINT $idxname";
                        $declare .= " PRIMARY KEY ($colstring)";
                        break;
                    case 'mysql':
                    case 'mysqli':
                        $declare  = "ALTER TABLE $table ADD PRIMARY KEY";
                        $declare .= " ($colstring)";
                        break;
                    case 'sqlite':
                        // currently not possible
                        break;
                }
                break;

            case 'unique':
                $declare = "CREATE UNIQUE INDEX $idxname ON $table ($colstring)";
                break;

            case 'normal':
                $declare = "CREATE INDEX $idxname ON $table ($colstring)";
                break;

        }
        
        return $declare;
    }


   /**
    * 
    * Return the definition array for a column.
    * 
    * @access private
    * 
    * @param string $backend The name of the backend ('db' or 'mdb2').
    * 
    * @param string $phptype The DB/MDB2 phptype key.
    * 
    * @param mixed $column A single DB_Table column definition array.
    * 
    * @return mixed|object Declaration string (DB), declaration array (MDB2) or a
    * PEAR_Error with a description about the invalidity, otherwise.
    * 
    */

    function _getColumnDefinition($backend, $phptype, $column)
    {
        static $max_scope;

        // prepare variables
        $type    = (isset($column['type']))    ? $column['type']    : null;
        $size    = (isset($column['size']))    ? $column['size']    : null;
        $scope   = (isset($column['scope']))   ? $column['scope']   : null;
        $require = (isset($column['require'])) ? $column['require'] : null;
        $default = (isset($column['default'])) ? $column['default'] : null;

        if ($backend == 'db') {
            return DB_Table_Manager::getDeclare($phptype, $type,
                    $size, $scope, $require, $default);
        } else {
            return DB_Table_Manager::getDeclareMDB2($type,
                    $size, $scope, $require, $default, $max_scope);
        }
    }


   /**
    * 
    * Check char/varchar/decimal type declarations for validity.
    * 
    * @access private
    * 
    * @param string $coltype The DB_Table column type.
    * 
    * @param int $size The size for the column (needed for string and
    * decimal).
    * 
    * @param int $scope The scope for the column (needed for decimal).
    * 
    * @return bool|object Boolean true if the type declaration is valid or a
    * PEAR_Error with a description about the invalidity, otherwise.
    * 
    */

    function _validateTypeDeclaration($coltype, $size, $scope)
    {
        // validate char and varchar: does it have a size?
        if (($coltype == 'char' || $coltype == 'varchar') &&
            ($size < 1 || $size > 255) ) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_STRING,
                "(size='$size')"
            );
        }
        
        // validate decimal: does it have a size and scope?
        if ($coltype == 'decimal' &&
            ($size < 1 || $size > 255 || $scope < 0 || $scope > $size)) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_DECIMAL,
                "(size='$size' scope='$scope')"
            );
        }

        return true;
    }


   /**
    * 
    * Check a table name for validity.
    * 
    * @access private
    * 
    * @param string $tablename The table name.
    * 
    * @return bool|object Boolean true if the table name is valid or a
    * PEAR_Error with a description about the invalidity, otherwise.
    * 
    */

    function _validateTableName($tablename)
    {
        // is the table name too long?
        if (strlen($tablename) > 30) {
            return DB_Table::throwError(
                DB_TABLE_ERR_TABLE_STRLEN,
                " ('$tablename')"
            );
        }

        return true;
    }


   /**
    * 
    * Check a column name for validity.
    * 
    * @access private
    * 
    * @param string $colname The column name.
    * 
    * @return bool|object Boolean true if the column name is valid or a
    * PEAR_Error with a description about the invalidity, otherwise.
    * 
    */

    function _validateColumnName($colname)
    {
        // column name cannot be a reserved keyword
        $reserved = in_array(
            strtoupper($colname),
            $GLOBALS['_DB_TABLE']['reserved']
        );

        if ($reserved) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_COLNAME,
                " ('$colname')"
            );
        }
 
        // column name must be no longer than 30 chars
        if (strlen($colname) > 30) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_STRLEN,
                "('$colname')"
            );
        }

        return true;
    }


   /**
    * 
    * Check whether a column exists.
    * 
    * @access private
    * 
    * @param string $colname The column name.
    * 
    * @param mixed $tableInfoOrder Array with columns in the table (result
    * from tableInfo(), shortened to key 'order').
    * 
    * @param string $mode The name of the calling function, this can be either
    * 'verify' or 'alter'.
    * 
    * @return bool|object Boolean true if the column exists.
    * Otherwise, either boolean false (case 'alter') or a PEAR_Error
    * (case 'verify').
    * 
    */

    function _columnExists($colname, $tableInfoOrder, $mode)
    {
        if (array_key_exists($colname, $tableInfoOrder)) {
            return true;
        }

        switch ($mode) {

            case 'alter':
                return false;

            case 'verify':
                return DB_Table::throwError(
                    DB_TABLE_ERR_VER_COLUMN_MISSING,
                    "(column='$colname')"
                );

        }
    }


   /**
    * 
    * Check whether a column type is a known type.
    * 
    * @access private
    * 
    * @param string $phptype The DB/MDB2 phptype key.
    * 
    * @param string $type The column type.
    * 
    * @return bool|object Boolean true if the column type is a known type
    * or a PEAR_Error, otherwise.
    * 
    */

    function _validateColumnType($phptype, $type)
    {
        // map of valid types for the current RDBMS
        $map = $GLOBALS['_DB_TABLE']['valid_type'][$phptype];

        // is it a recognized column type?
        $types = array_keys($map);
        if (!in_array($type, $types)) {
            return DB_Table::throwError(
                DB_TABLE_ERR_DECLARE_TYPE,
                "('" . $type . "')"
            );
        }

        return true;
    }


   /**
    * 
    * Check whether a column has the right type.
    * 
    * @access private
    * 
    * @param string $phptype The DB/MDB2 phptype key.
    *
    * @param string $colname The column name.
    * 
    * @param string $coltype The column type.
    * 
    * @param mixed $tableInfoOrder Array with columns in the table (result
    * fro