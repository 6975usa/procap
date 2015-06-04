<?php

// vim: set et ts=4 sw=4 fdm=marker:

/**
 * DB_Table_Database relational database abstraction class
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
 * @author   David C. Morse <morse@php.net>
 * @license  http://opensource.org/licenses/bsd-license.php New BSD License
 * @version  CVS: $Id: Database.php,v 1.15 2007/12/13 16:52:14 wiesemann Exp $
 * @link     http://pear.php.net/package/DB_Table
 */

// {{{ Error code constants

/**
 * Parameter is not a DB/MDB2 object
 */
define('DB_TABLE_DATABASE_ERR_DB_OBJECT', -201);

/**
 * Error in addTable, parameter $table_obj is not a DB_Table object
 */
define('DB_TABLE_DATABASE_ERR_DBTABLE_OBJECT', -202);

/**
 * Error for table name that does not exist in the database
 */
define('DB_TABLE_DATABASE_ERR_NO_TBL', -203);

/**
 * Error for table name parameter that is not a string
 */
define('DB_TABLE_DATABASE_ERR_TBL_NOT_STRING', -204);

/**
 * Error in getCol for a non-existent column name
 */
define('DB_TABLE_DATABASE_ERR_NO_COL', -205);

/**
 * Error in getForeignCol for a non-existent foreign key column
 */
define('DB_TABLE_DATABASE_ERR_NO_FOREIGN_COL', -206);

/**
 * Error for column name that is not a string
 */
define('DB_TABLE_DATABASE_ERR_COL_NOT_STRING', -207);

/**
 * Error in addTable for multiple primary keys
 */
define('DB_TABLE_DATABASE_ERR_MULT_PKEY', -208);

/**
 * Error in addRef for a non-existent foreign key table
 */
define('DB_TABLE_DATABASE_ERR_NO_FTABLE', -209);

/**
 * Error in addRef for non-existence referenced table
 */
define('DB_TABLE_DATABASE_ERR_NO_RTABLE', -210);

/**
 * Error in addRef for null referenced key in a table with no primary key
 */
define('DB_TABLE_DATABASE_ERR_NO_PKEY', -211);

/**
 * Error in addRef for an invalid foreign key, neither string nor array
 */
define('DB_TABLE_DATABASE_ERR_FKEY', -212);

/**
 * Error in addRef for referenced key that is not a string, string foreign key
 */
define('DB_TABLE_DATABASE_ERR_RKEY_NOT_STRING', -213);

/**
 * Error in addRef for referenced key that is not an array, array foreign key
 */
define('DB_TABLE_DATABASE_ERR_RKEY_NOT_ARRAY', -214);

/**
 * Error in addRef for wrong number of columns in referenced key
 */
define('DB_TABLE_DATABASE_ERR_RKEY_COL_NUMBER', -215);

/**
 * Error in addRef for non-existence foreign key (referencing) column
 */
define('DB_TABLE_DATABASE_ERR_NO_FCOL', -216);

/**
 * Error in addRef for non-existence referenced column
 */
define('DB_TABLE_DATABASE_ERR_NO_RCOL', -217);

/**
 * Error in addRef for referencing and referenced columns of different types
 */
define('DB_TABLE_DATABASE_ERR_REF_TYPE', -218);

/**
 * Error in addRef for multiple references from one table to another
 */
define('DB_TABLE_DATABASE_ERR_MULT_REF', -219);

/**
 * Error due to invalid ON DELETE action name
 */
define('DB_TABLE_DATABASE_ERR_ON_DELETE_ACTION', -220);

/**
 * Error due to invalid ON UPDATE action name
 */
define('DB_TABLE_DATABASE_ERR_ON_UPDATE_ACTION', -221);

/**
 * Error in addLink due to missing required reference
 */
define('DB_TABLE_DATABASE_ERR_NO_REF_LINK', -222);

/**
 * Error in validCol for a column name that does not exist in the datase
 */
define('DB_TABLE_DATABASE_ERR_NO_COL_DB', -223);

/**
 * Error in validCol for column name that does not exist in the specified table
 */
define('DB_TABLE_DATABASE_ERR_NO_COL_TBL', -224);

/**
 * Error in a buildSQL or select* method for an undefined key of $this->sql
 */
define('DB_TABLE_DATABASE_ERR_SQL_UNDEF', -225);

/**
 * Error in a buildSQL or select* method for a key of $this->sql that is 
 * not a string
 */
define('DB_TABLE_DATABASE_ERR_SQL_NOT_STRING', -226);

/**
 * Error in buildFilter due to invalid match type 
 */
define('DB_TABLE_DATABASE_ERR_MATCH_TYPE', -227);

/**
 * Error in buildFilter due to invalid key for full match
 */
define('DB_TABLE_DATABASE_ERR_DATA_KEY', -228);

/**
 * Error in buildFilter due to invalid key for full match
 */
define('DB_TABLE_DATABASE_ERR_FILT_KEY', -229);

/**
 * Error in buildFilter due to invalid key for full match
 */
define('DB_TABLE_DATABASE_ERR_FULL_KEY', -230);

/**
 * Error in insert for a failed foreign key constraint
 */
define('DB_TABLE_DATABASE_ERR_FKEY_CONSTRAINT', -231);

/**
 * Error in delete due to a referentially triggered 'restrict' action
 */
define('DB_TABLE_DATABASE_ERR_RESTRICT_DELETE', -232);

/**
 * Error in update due to a referentially triggered 'restrict' action
 */
define('DB_TABLE_DATABASE_ERR_RESTRICT_UPDATE', -233);

/**
 * Error in fromXML for table with multiple auto_increment columns
 */
define('DB_TABLE_DATABASE_ERR_XML_MULT_AUTO_INC', -234);

/**
 * Error in autoJoin, column and tables parameter both null
 */
define('DB_TABLE_DATABASE_ERR_NO_COL_NO_TBL', -235);

/**
 * Error in autoJoin for ambiguous column name
 */
define('DB_TABLE_DATABASE_ERR_COL_NOT_UNIQUE', -236);

/**
 * Error in autoJoin for non-unique set of join conditions
 */
define('DB_TABLE_DATABASE_ERR_AMBIG_JOIN', -237);

/**
 * Error in autoJoin for failed construction of join 
 */
define('DB_TABLE_DATABASE_ERR_FAIL_JOIN', -238);

/**
 * Error in fromXML for PHP 4 (this function requires PHP 5)
 */
define('DB_TABLE_DATABASE_ERR_PHP_VERSION', -239);

/**
 * Error parsing XML string in fromXML
 */
define('DB_TABLE_DATABASE_ERR_XML_PARSE', -240);

// }}}
// {{{ Includes

/**
 * DB_Table_Base base class
 */
require_once 'DB/Table/Base.php';

/**
 * DB_Table table abstraction class
 */
require_once 'DB/Table.php';

/**
 * The PEAR class for errors
 */
require_once 'PEAR.php';

// }}}
// {{{ Error messages

/** 
 * US-English default error messages. If you want to internationalize, you can
 * set the translated messages via $GLOBALS['_DB_TABLE_DATABASE']['error']. 
 * You can also use DB_Table_Database::setErrorMessage(). Examples:
 * 
 * <code>
 * (1) $GLOBALS['_DB_TABLE_DATABASE']['error'] = array(
 *                                           DB_TABLE_DATABASE_ERR_.. => '...',
 *                                           DB_TABLE_DATABASE_ERR_.. => '...');
 * (2) DB_Table_Database::setErrorMessage(DB_TABLE_DATABASE_ERR_.., '...');
 *     DB_Table_Database::setErrorMessage(DB_TABLE_DATABASE_ERR_.., '...');
 * (3) DB_Table_Database::setErrorMessage(array(
 *                                        DB_TABLE_DATABASE_ERR_.. => '...');
 *                                        DB_TABLE_DATABASE_ERR_.. => '...');
 * (4) $obj = new DB_Table();
 *     $obj->setErrorMessage(DB_TABLE_DATABASE_ERR_.., '...');
 *     $obj->setErrorMessage(DB_TABLE_DATABASE_ERR_.., '...');
 * (5) $obj = new DB_Table();
 *     $obj->setErrorMessage(array(DB_TABLE_DATABASE_ERR_.. => '...');
 *                                 DB_TABLE_DATABASE_ERR_.. => '...');
 * </code>
 * 
 * For errors that can occur with-in the constructor call (i.e. e.g. creating
 * or altering the database table), only the code from examples (1) to (3)
 * will alter the default error messages early enough. For errors that can
 * occur later, examples (4) and (5) are also valid.
 */
$GLOBALS['_DB_TABLE_DATABASE']['default_error'] = array(
        DB_TABLE_DATABASE_ERR_DB_OBJECT =>
        'Invalid DB/MDB2 object parameter. Function',
        DB_TABLE_DATABASE_ERR_NO_TBL =>
        'Table does not exist in database. Method, Table =',
        DB_TABLE_DATABASE_ERR_TBL_NOT_STRING =>
        'Table name parameter is not a string in method',
        DB_TABLE_DATABASE_ERR_NO_COL =>
        'In getCol, non-existent column name parameter',
        DB_TABLE_DATABASE_ERR_NO_FOREIGN_COL =>
        'In getForeignCol, non-existent column name parameter',
        DB_TABLE_DATABASE_ERR_COL_NOT_STRING =>
        'Column name parameter is not a string in method',
        DB_TABLE_DATABASE_ERR_DBTABLE_OBJECT =>
        'Parameter of addTable is not a DB_Table object',
        DB_TABLE_DATABASE_ERR_MULT_PKEY =>
        'Multiple primary keys in one table detected in addTable. Table',
        DB_TABLE_DATABASE_ERR_NO_FTABLE =>
        'Foreign key reference from non-existent table in addRef. Reference',
        DB_TABLE_DATABASE_ERR_NO_RTABLE =>
        'Reference to a non-existent referenced table in addRef. Reference',
        DB_TABLE_DATABASE_ERR_NO_PKEY =>
        'Missing primary key of referenced table in addRef. Reference',
        DB_TABLE_DATABASE_ERR_FKEY =>
        'Foreign / referencing key is not a string or array in addRef',
        DB_TABLE_DATABASE_ERR_RKEY_NOT_STRING =>
        'Foreign key is a string, referenced key is not a string in addRef',
        DB_TABLE_DATABASE_ERR_RKEY_NOT_ARRAY =>
        'Foreign key is an array, referenced key is not an array in addRef',
        DB_TABLE_DATABASE_ERR_RKEY_COL_NUMBER =>
        'Wrong number of columns in referencing key in addRef',
        DB_TABLE_DATABASE_ERR_NO_FCOL =>
        'Nonexistent foreign / referencing key column in addRef. Reference',
        DB_TABLE_DATABASE_ERR_NO_RCOL =>
        'Nonexistent referenced key column in addRef. Reference',
        DB_TABLE_DATABASE_ERR_REF_TYPE =>
        'Different referencing and referenced column types in addRef. Reference',
        DB_TABLE_DATABASE_ERR_MULT_REF =>
        'Multiple references between two tables in addRef. Reference',
        DB_TABLE_DATABASE_ERR_ON_DELETE_ACTION =>
        'Invalid ON DELETE action. Reference',
        DB_TABLE_DATABASE_ERR_ON_UPDATE_ACTION =>
        'Invalid ON UPDATE action. Reference',
        DB_TABLE_DATABASE_ERR_NO_REF_LINK =>
        'Error in addLink due to missing required reference(s)',
        DB_TABLE_DATABASE_ERR_NO_COL_DB =>
        'In validCol, column name does not exist in database. Column',
        DB_TABLE_DATABASE_ERR_NO_COL_TBL =>
        'In validCol, column does not exist in specified table. Column',
        DB_TABLE_DATABASE_ERR_SQL_UNDEF =>
        'Query string is not a key of $sql property array. Key is',
        DB_TABLE_DATABASE_ERR_SQL_NOT_STRING =>
        'Query is neither an array nor a string',
        DB_TABLE_DATABASE_ERR_MATCH_TYPE =>
        'Invalid match parameter of buildFilter',
        DB_TABLE_DATABASE_ERR_DATA_KEY =>
        'Invalid data_key in buildFilter, neither string nor array',
        DB_TABLE_DATABASE_ERR_FILT_KEY =>
        'Incompatible data_key and filter_key in buildFilter',
        DB_TABLE_DATABASE_ERR_FULL_KEY =>
        'Invalid key value in buildFilter: Mixed null and not null',
        DB_TABLE_DATABASE_ERR_FKEY_CONSTRAINT =>
        'Foreign key constraint failure: Key does not reference any rows',
        DB_TABLE_DATABASE_ERR_RESTRICT_DELETE =>
        'Referentially trigger restrict of delete from table',
        DB_TABLE_DATABASE_ERR_RESTRICT_UPDATE =>
        'Referentially trigger restrict of update of table',
        DB_TABLE_DATABASE_ERR_NO_COL_NO_TBL =>
        'No columns or tables provided as parameters to autoJoin',
        DB_TABLE_DATABASE_ERR_COL_NOT_UNIQUE =>
        'Ambiguous column name in autoJoin. Column',
        DB_TABLE_DATABASE_ERR_AMBIG_JOIN =>
        'Ambiguous join in autoJoin, during join of table',
        DB_TABLE_DATABASE_ERR_FAIL_JOIN =>
        'Failed join in autoJoin, failed to join table',
        DB_TABLE_DATABASE_ERR_PHP_VERSION =>
        'PHP 5 is required for fromXML method. Interpreter version is',
        DB_TABLE_DATABASE_ERR_XML_PARSE =>
        'Error parsing XML in fromXML method'
    );

// merge default and user-defined error messages
if (!isset($GLOBALS['_DB_TABLE_DATABASE']['error'])) {
    $GLOBALS['_DB_TABLE_DATABASE']['error'] = array();
}
foreach ($GLOBALS['_DB_TABLE_DATABASE']['default_error'] as $code => $message) {
    if (!array_key_exists($code, $GLOBALS['_DB_TABLE_DATABASE']['error'])) {
        $GLOBALS['_DB_TABLE_DATABASE']['error'][$code] = $message;
    }
}

// }}}
// {{{ DB_Table_Database

/**
 * Relational database abstraction class
 *
 * DB_Table_Database is an abstraction class for a relational database.
 * It is a layer built on top of DB_Table, in which each table in a
 * database is represented as an instance of DB_Table. It provides: 
 *
 *   - an object-oriented representation of the database schema
 *   - automated construction of SQL commands for simple joins
 *   - an API for insert, update, and select commands very similar
 *     to that of DB_Table, with optional emulation of standard SQL
 *     foreign key integrity checks and referential triggered actions
 *     such as cascading deletes.
 *   - Serialization and unserialization of the database schema via 
 *     either php serialization or XML, using the MDB2 XML schema. 
 *
 * @category Database
 * @package  DB_Table
 * @author   David C. Morse <morse@php.net>
 * @version  Release: 1.5.2
 * @link     http://pear.php.net/package/DB_Table
 */
class DB_Table_Database extends DB_Table_Base
{

    // {{{ properties

    /**
     * Name of the database
     *
     * @var    string
     * @access public
     */
    var $name   = null;

    /**
     * Associative array of DB_Table object references. Keys are table names.
     *
     * Associative array in which keys are table names, values are references to
     * DB_Table objects.  Each referenced DB_Table object represents one table in
     * the database.
     *
     * @var    array
     * @access private
     */
    var $_table = array();

    /**
     * Array in which keys are table names, values are DB_Table subclass names.
     *
     * See the getTableSubclass() method docblock for further details. 
     * 
     * @var    array
     * @access private
     */
    var $_table_subclass = array();

    /**
     * Path to directory containing DB_Table subclass declaration files
     *
     * See the setTableSubclassPath() method docblock for further details. 
     * 
     * @var    string
     * @access private
     */
    var $_table_subclass_path = '';

    /**
     * Array in which keys are table names, values are primary keys.
     *
     * Each primary key value may be a column name string, a sequential array of
     * column name strings, or null. 
     *
     * See the getPrimaryKey() method docblock for details. 
     *
     * @var    array
     * @access private
     */
    var $_primary_key = array();

    /**
     * Associative array that maps column names keys to table names.
     *
     * Each key is the name string of a column in the database. Each value
     * is a numerical array containing the names of all tables that contain 
     * a column with that name. 
     *
     * See the getCol() method docblock for details.
     *
     * @var    array
     * @access private
     */
    var $_col = array();

    /**
     * Associative array that maps names of foreign key columns to table names
     *
     * Each key is the name string of a foreign key column. Each value is a
     * sequential array containing the names of all tables that contain a 
     * foreign key column with that name. 
     *
     * See the getForeignCol() method docblock for further details. 
     *
     * @var    array
     * @access private
     */
    var $_foreign_col = array();

    /**
     * Two-dimensional associative array of foreign key references. 
     *
     * Keys are pairs of table names (referencing table first, referenced
     * table second). Each value is an array containing information about 
     * the referencing and referenced keys, and about any referentially 
     * triggered actions (e.g., cascading delete). 
     *
     * See the getRef() docblock for further details. 
     *
     * @var    array
     * @access private
     */
    var $_ref = array();

    /**
     * Array in which each key is the names of a referenced tables, each value 
     * an sequential array containing names of referencing tables.
     *
     * See the docblock for the getRefTo() method for further discussion. 
     * 
     * @var    array
     * @access private
     */
    var $_ref_to = array();

    /**
     * Two-dimensional associative array of linking tables. 
     *
     * Two-dimensional associative array in which pairs of keys are names
     * of pairs of tables that are linked by one or more linking/association 
     * table. Each value is an array containing the names of all table that
     * link the tables specified by the pair of keys. A linking table is a 
     * table that creates a many-to-many relationship between two linked
     * tables, via foreign key references from the linking table to the two
     * linked tables. The $_link property is used by the autoJoin() method 
     * to join tables that are related only through such a linking table. 
     * 
     * See the getLink() method docblock for further details. 
     *
     * @var    array
     * @access private
     */
    var $_link = array();

    /**
     * Take on_update actions if $_act_on_update is true
     *
     * By default, on_update actions are enabled ($_act_on_update = true)
     *
     * @var    boolean
     * @access private
     */
    var $_act_on_update = true;

    /**
     * Take on_delete actions if $_act_on_delete is true
     *
     * By default, on_delete actions are enabled ($_act_on_delete = true)
     *
     * @var    boolean
     * @access private
     */
    var $_act_on_delete = true;

    /**
     * Validate foreign keys before insert or update if $_check_fkey is true
     *
     * By default, validation is disabled ($_check_fkey = false)
     *
     * @var    boolean
     * @access private
     */
    var $_check_fkey = false;

    /**
     * If the column keys in associative array return sets are fixed case
     * (all upper or lower case) this property should be set true. 
     *
     * The column keys in rows of associative array return sets may either 
     * preserve capitalization of the column names or they may be fixed case,
     * depending on the options set in the backend (DB/MDB2) and on phptype.
     * If these column names are returned with a fixed case (either upper 
     * or lower), $_fix_case must be set true in order for php emulation of
     * ON DELETE and ON UPDATE actions to work correctly. Otherwise, the
     * $_fix_case property should be false (the default).
     *
     * The choice between mixed or fixed case column keys may be made by using
     * using the setFixCase() method, which resets both the behavior of the
     * backend and the $_fix_case property. It may also be changed by using the 
     * setOption() method of the DB or MDB2 backend object to directly set the 
     * DB_PORTABILITY_LOWERCASE or MDB2_PORTABILITY_FIX_CASE bits of the 
     * DB/MDB2 'portability' option.
     *
     * By default, DB returns mixed case and MDB2 returns lower case. 
     * 
     * @see DB_Table_Database::setFixCase()
     * @see DB::setOption()
     * @see MDB2::setOption()
     *
     * @var    boolean
     * @access private
     */
    var $_fix_case = false;

    // }}}
    // {{{ Methods

    // {{{ function DB_Table_Database(&$db, $name)

    /**
     * Constructor
     *
     * If an error is encountered during instantiation, the error
     * message is stored in the $this->error property of the resulting
     * object. See $error property docblock for a discussion of error
     * handling. 
     * 
     * @param  object &$db   DB/MDB2 database connection object
     * @param  string $name the database name
     * @return object DB_Table_Database
     * @access public
     */
    function DB_Table_Database(&$db, $name)
    {
        // Is $db an DB/MDB2 object or null?
        if (is_a($db, 'db_common')) {
            $this->backend = 'db';
            $this->fetchmode = DB_FETCHMODE_ORDERED;
        } elseif (is_a($db, 'mdb2_driver_common')) {
            $this->backend = 'mdb2';
            $this->fetchmode = MDB2_FETCHMODE_ORDERED;
        } else {
            $code = DB_TABLE_DATABASE_ERR_DB_OBJECT ;
            $text = $GLOBALS['_DB_TABLE_DATABASE']['error'][$code]
                  . ' DB_Table_Database';
            $this->error = PEAR::throwError($text, $code);
            return;
        }
        $this->db  = $db;
        $this->name = $name;

        $this->_primary_subclass = 'DB_TABLE_DATABASE';
        $this->setFixCase(false);
    }

    // }}}
    // {{{ function setDBconnection(&$db)

    /**
     * Set DB/MDB2 connection instance for database and all tables
     *
     * Assign a reference to the DB/MDB2 object $db to $this->db, set
     * $this->backend to 'db' or 'mdb2', and set the same pair of 
     * values for the $db and $backend properties of every DB_Table
     * object in the database.  
     *
     * @param  object  &$db DB/MDB2 connection object
     * @return boolean True on success (PEAR_Error on failure)
     *
     * @throws PEAR_Error if 
     *     $db is not a DB or MDB2 object(DB_TABLE_DATABASE_ERR_DB_OBJECT)
     *
     * @access public
     */
    function setDBconnection(&$db)
    {
        // Is the first argument a DB/MDB2 object ?
        if (is_subclass_of($db, 'DB_Common')) {
            $backend = 'db';
        } elseif (is_subclass_of($db, 'MDB2_Driver_Common')) {
            $backend = 'mdb2';
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_DB_OBJECT,
                      "setDBconnection");
        }

        // Set db and backend for database and all of its tables
        $this->db = $db;
        $this->backend = $backend;
        foreach ($this->_table as $name => $table) {
            $table->db = $db;
            $table->backend = $backend;
        }
        return true;
    }

    // }}}
    // {{{ function setActOnDelete($flag = true)

    /**
     * Turns on (or off) automatic php emulation of SQL ON DELETE actions
     *
     * @param  bool $flag True to enable action, false to disable
     * @return void
     * @access public
     */
    function setActOnDelete($flag = true)
    {
        if ($flag) {
            $this->_act_on_delete = true;
        } else {
            $this->_act_on_delete = false;
        }
    }
    
    // }}}
    // {{{ function setActOnUpdate($flag = true)

    /**
     * Turns on (or off) automatic php emulation of ON UPDATE actions
     *
     * @param  bool $flag True to enable action, false to disable
     * @return void
     * @access public
     */
    function setActOnUpdate($flag = true)
    {
        if ($flag) {
            $this->_act_on_update = true;
        } else {
            $this->_act_on_update = false;
        }
    }
    
    // }}}
    // {{{ function setCheckFKey($flag = true)

    /**
     * Turns on (or off) validation of foreign key values on insert and update
     *
     * @param  bool $flag True to enable foreign key validation, false to disable
     * @return void
     * @access public
     */
    function setCheckFKey($flag = true)
    {
        if ($flag) {
            $this->_check_fkey = true;
        } else {
            $this->_check_fkey = false;
        }
    }

    // }}}
    // {{{ function setFixCase($flag = false) 

    /**
     * Sets backend option such that column keys in associative array return
     * sets are converted to fixed case, if true, or mixed case, if false.
     * 
     * Sets the DB/MDB2 'portability' option, and sets $this->_fix_case = $flag.
     * Because it sets an option in the underlying DB/MDB2 connection object, 
     * this effects the behavior of all objects that share the connection.
     * 
     * @param  bool $flag True for fixed lower case, false for mixed
     * @return void
     * @access public
     */
    function setFixCase($flag = false) 
    {
        $flag = (bool) $flag;
        $option = $this->db->getOption('portability');
        if ($this->backend == 'db') {
            $option = $option | DB_PORTABILITY_LOWERCASE;
            if (!$flag) {
                $option = $option ^ DB_PORTABILITY_LOWERCASE;
            }
        } else {
            $option = $option | MDB2_PORTABILITY_FIX_CASE;
            if (!$flag) {
                $option = $option ^ MDB2_PORTABILITY_FIX_CASE;
            }
        } 
        $this->db->setOption('portability', $option);
        $this->_fix_case = $flag;
    }
    
    // }}}
    // {{{ function &getDBInstance() 

    /**
     * Return reference to $this->db DB/MDB2 object wrapped by $this
     *
     * @return object Reference to DB/MDB2 object
     * @access public
     */
    function &getDBInstance() 
    {
        return $this->db;
    }

    // }}}
    // {{{ function getTable($name = null) 

    /**
     * Returns all or part of $_table property array
     *
     * If $name is absent or null, return entire $_table property array.
     * If $name is a table name, return $this->_table[$name] DB_Table object
     * reference
     *
     * The $_table property is an associative array in which keys are table
     * name strings and values are references to DB_Table objects. Each of 
     * the referenced objects represents one table in the database.
     *
     * @param  string $name Name of table
     * @return mixed  $_table property, or one element of $_table 
     *                (PEAR_Error on failure)
     *
     * @throws PEAR_Error if:
     *    - $name is not a string ( DB_TABLE_DATABASE_ERR_TBL_NOT_STRING )
     *    - $name is not valid table name ( DB_TABLE_DATABASE_ERR_NO_TBL )
     * 
     * @access public
     */
    function getTable($name = null) 
    {
        if (is_null($name)) {
            return $this->_table;
        } elseif (is_string($name)) {
            if (isset($this->_table[$name])) {
                return $this->_table[$name];
            } else {
                return $this->throwError(
                          DB_TABLE_DATABASE_ERR_NO_TBL,
                          "getTable, $name");
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                      "getTable");
        }
    }

    // }}}
    // {{{ function getPrimaryKey($name = null) 

    /**
     * Returns all or part of the $_primary_key property array
     *
     * If $name is null, return the $this->_primary_key property array
     * If $name is a table name, return $this->_primary_key[$name]
     *
     * The $_primary_key property is an associative array in which each key
     * a table name, and each value is the primary key of that table. Each
     * primary key value may be a column name string, a sequential array of 
     * column name strings (for a multi-column key), or null (if no primary
     * key has been declared).
     *
     * @param  string $name Name of table
     * @return mixed  $this->primary_key array or $this->_primary_key[$name]
     *                (PEAR_Error on failure)
     *
     * @throws PEAR_Error if:
     *    - $name is not a string ( DB_TABLE_DATABASE_ERR_TBL_NOT_STRING )
     *    - $name is not valid table name ( DB_TABLE_DATABASE_ERR_NO_TBL )
     * 
     * @access public
     */
    function getPrimaryKey($name = null) 
    {
        if (is_null($name)) {
            return $this->_primary_key;
        } elseif (is_string($name)) {
            if (isset($this->_primary_key[$name])) {
                return $this->_primary_key[$name];
            } else {
                return $this->throwError(
                          DB_TABLE_DATABASE_ERR_NO_TBL,
                          "getPrimaryKey, $name");
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                      "getPrimaryKey");
        }
    }

    // }}}
    // {{{ function getTableSubclass($name = null) 

    /**
     * Returns all or part of the $_table_subclass property array
     *
     * If $name is null, return the $this->_table_subclass property array
     * If $name is a table name, return $this->_table_subclass[$name]
     *
     * The $_table_subclass property is an associative array in which each key
     * is a table name string, and each value is the name of the corresponding 
     * subclass of DB_Table. The value is null if the table is an instance of 
     * DB_Table itself. 
     *
     * Subclass names are set within the addTable method by applying the 
     * built in get_class() function to a DB_Table object. The class names 
     * returned by get_class() are stored unmodified. In PHP 4, get_class
     * converts all class names to lower case. In PHP 5, it preserves the 
     * capitalization of the name used in the class definition. 
     *
     * For autoloading of class definitions to work properly in the 
     * __wakeup() method, the base name of each subclass definition
     * file (excluding the .php extension) should thus be a identical
     * to the class name in PHP 5, and a lower case version of the 
     * class name in PHP 4 or 
     * 
     * @param  string $name Name of table
     * @return mixed  $_table_subclass array or $this->_table_subclass[$name]
     *                (PEAR_Error on failure)
     *
     * @throws PEAR_Error if:
     *    - $name is not a string ( DB_TABLE_DATABASE_TBL_NOT_STRING )
     *    - $name is not valid table name ( DB_TABLE_DATABASE_NO_TBL )
     *
     * @access public
     * 
     @ @see DB_Table_Database::__wakeup()
     */
    function getTableSubclass($name = null) 
    {
        if (is_null($name)) {
            return $this->_table_subclass;
        } elseif (is_string($name)) {
            if (isset($this->_table_subclass[$name])) {
                return $this->_table_subclass[$name];
            } else {
                return $this->throwError(
                          DB_TABLE_DATABASE_ERR_NO_TBL,
                          "getTableSubclass, $name");
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                      "getTableSubclass");
        }
    }

    // }}}
    // {{{ function getCol($column_name = null) 

    /**
     * Returns all or part of the $_col property array
     *
     * If $column_name is null, return $_col property array
     * If $column_name is valid, return $_col[$column_name] subarray
     *
     * The $_col property is an associative array in which each key is the
     * name of a column in the database, and each value is a numerical array 
     * containing the names of all tables that contain a column with that 
     * name.
     *
     * @param string $column_name a column name string
     * @return mixed $this->_col property array or $this->_col[$column_name]
     *               (PEAR_Error on failure)
     *
     * @throws PEAR_Error if:
     *    - $column_name is not a string (DB_TABLE_DATABASE_ERR_COL_NOT_STRING)
     *    - $column_name is not valid column name (DB_TABLE_DATABASE_NO_COL)
     *
     * @access public
     */
    function getCol($column_name = null) 
    {
        if (is_null($column_name)) {
            return $this->_col;
        } elseif (is_string($column_name)) {
            if (isset($this->_col[$column_name])) {
                return $this->_col[$column_name];
            } else {
                return $this->throwError(
                          DB_TABLE_DATABASE_ERR_NO_COL,
                          "'$column_name'");
            }
        } else {
            return $this->throwError(
                       DB_TABLE_DATABASE_ERR_COL_NOT_STRING,
                       'getCol');
        }
    }

    // }}}
    // {{{ function getForeignCol($column_name = null) 

    /**
     * Returns all or part of the $_foreign_col property array
     *
     * If $column_name is null, return $this->_foreign_col property array
     * If $column_name is valid, return $this->_foreign_col[$column_name] 
     *
     * The $_foreign_col property is an associative array in which each 
     * key is the name string of a foreign key column, and each value is a
     * sequential array containing the names of all tables that contain a 
     * foreign key column with that name. 
     *
     * If a column $column in a referencing table $ftable is part of the 
     * foreign key for references to two or more different referenced tables
     * tables, the name $ftable will also appear multiple times in the array 
     * $this->_foreign_col[$column].
     *
     * Returns a PEAR_Error with the following DB_TABLE_DATABASE_* error
     * codes if:
     *    - $column_name is not a string ( _COL_NOT_STRING )
     *    - $column_name is not valid foreign column name ( _NO_FOREIGN_COL )
     *
     * @param  string column name string for foreign key column
     * @return array  $_foreign_col property array
     * @access public
     */
    function getForeignCol($column_name = null) 
    {
        if (is_null($column_name)) {
            return $this->_foreign_col;
        } elseif (is_string($column_name)) {
            if (isset($this->_foreign_col[$column_name])) {
                return $this->_foreign_col[$column_name];
            } else {
                return $this->throwError(
                          DB_TABLE_DATABASE_ERR_NO_FOREIGN_COL,
                          $column_name);
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_COL_NOT_STRING,
                      'getForeignCol');
        }
    }

    // }}}
    // {{{ function getRef($table1 = null, $table2 = null) 

    /**
     * Returns all or part of the $_ref two-dimensional property array
     *
     * Returns $this->_ref 2D property array if $table1 and $table2 are null.
     * Returns $this->_ref[$table1] subarray if only $table2 is null.
     * Returns $this->_ref[$table1][$table2] if both parameters are present.
     *
     * Returns null if $table1 is a table that references no others, or 
     * if $table1 and $table2 are both valid table names, but there is no 
     * reference from $table1 to $table2.
     * 
     * The $_ref property is a two-dimensional associative array in which
     * the keys are pairs of table names, each value is an array containing 
     * information about referenced and referencing keys, and referentially
     * triggered actions (if any).  An element of the $_ref array is of the 
     * form $ref[$ftable][$rtable] = $reference, where $ftable is the name 
     * of a referencing (or foreign key) table and $rtable is the name of 
     * a corresponding referenced table. The value $reference is an array 
     * $reference = array($fkey, $rkey, $on_delete, $on_update) in which
     * $fkey and $rkey are the foreign (or referencing) and referenced 
     * keys, respectively: Foreign key $fkey of table $ftable references
     * key $rkey of table $rtable. The values of $fkey and $rkey must either 
     * both be valid column name strings for columns of the same type, or 
     * they may both be sequential arrays of column name names, with equal 
     * numbers of columns of corresponding types, for multi-column keys. The 
     * $on_delete and $on_update values may be either null or string values 
     * that indicate actions to be taken upon deletion or updating of a 
     * referenced row (e.g., cascading deletes). A null value of $on_delete
     * or $on_update indicates that no referentially triggered action will 
     * be taken. See addRef() for further details about allowed values of
     * these action strings. 
     *
     * @param  string $table1 name of referencing table
     * @param  string $table2 name of referenced table
     * @return mixed $ref property array, sub-array, or value
     * 
     * @throws a PEAR_Error if:
     *    - $table1 or $table2 is not a string (.._DATABASE_ERR_TBL_NOT_STRING)
     *    - $table1 or $table2 is not a table name (.._DATABASE_ERR_NO_TBL)
     *
     * @access public
     */
    function getRef($table1 = null, $table2 = null) 
    {
        if (is_null($table1)) {
            return $this->_ref;
        } elseif (is_string($table1)) {
            if (isset($this->_ref[$table1])) {
                if (is_null($table2)) {
                    return $this->_ref[$table1];
                } elseif (is_string($table2)) {
                    if (isset($this->_ref[$table1][$table2])) {
                        return $this->_ref[$table1][$table2];
                    } else {
                        if (isset($this->_table[$table2])) {
                            // Valid table names but no references to
                            return null;
                        } else {
                            // Invalid table name
                            return $this->throwError(
                                      DB_TABLE_DATABASE_ERR_NO_TBL,
                                      "getRef, $table2");
                        }
                    }
                } else {
                    return $this->throwError(
                              DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                              "getRef");
                }
            } else {
                if (isset($this->_table[$table1])) {
                    // Valid table name, but no references from
                    return null;
                } else {
                    // Invalid table name
                    return $this->throwError(
                              DB_TABLE_DATABASE_ERR_NO_TBL,
                              "getRef, $table1");
                }
            }
        } else {
            return $this->throwError(
                       DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                       "getRef");
        }

    }

    // }}}
    // {{{ function getRefTo($table_name = null)

    /**
     * Returns all or part of the $_ref_to property array
     *
     * Returns $this->_ref_to property array if $table_name is null.
     * Returns $this->_ref_to[$table_name] if $table_name is not null.
     *
     * The $_ref_to property is an associative array in which each key
     * is the name of a referenced table, and each value is a sequential
     * array containing the names of all tables that contain foreign keys
     * that reference that table. Each element is thus of the form
     * $_ref_to[$rtable] = array($ftable1, $ftable2,...), where
     * $ftable1, $ftable2, ... are the names of tables that reference 
     * the table named $rtable.
     *
     * @param string $table_name name of table
     * @return mixed $_ref_to property array or subarray 
     *               (PEAR_Error on failure)
     * 
     * @throws PEAR_Error if:
     *    - $table_name is not a string ( .._DATABASE_ERR_TBL_NOT_STRING )
     *    - $table_name is not a table name ( .._DATABASE_ERR_NO_TBL )
     *
     * @access public
     */
    function getRefTo($table_name = null)
    {
        if (is_null($table_name)) {
            return $this->_ref_to;
        } elseif (is_string($table_name)) {
            if (isset($this->_ref_to[$table_name])) {
                return $this->_ref_to[$table_name];
            } else {
                if (isset($this->_table[$table_name])) {
                    // Valid table name, but no references to
                    return null;
                } else {
                    // Invalid table name
                    return $this->throwError(
                              DB_TABLE_DATABASE_ERR_NO_TBL,
                              "getRefTo, $table_name");
                }
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                      "getRefTo");
        }
    }

    // }}}
    // {{{ function getLink($table1 = null, $table2 = null) 

    /**
     * Returns all or part of the $link two-dimensional property array
     *
     * Returns $this->_link 2D property array if $table1 and $table2 are null.
     * Returns $this->_link[$table1] subarray if only $table2 is null.
     * Returns $this->_link[$table1][$table2] if both parameters are present.
     *
     * Returns null if $table1 is a valid table with links to no others, or 
     * if $table1 and $table2 are both valid table names but there is no 
     * link between them.
     * 
     * The $_link property is a two-dimensional associative array with 
     * elements of the form $this->_link[$table1][$table2] = array($link1, ...), 
     * in which the value is an array containing the names of all tables 
     * that `link' tables named $table1 and $table2, and thereby create a
     * many-to-many relationship between these two tables. 
     *
     * The $_link property is used in the autoJoin method to join tables
     * that are related by a many-to-many relationship via a linking table,
     * rather than via a direct foreign key reference. A table that is
     * declared to be linking table for tables $table1 and $table2 must 
     * contain foreign keys that reference both of these tables. 
     *
     * Each binary link in a database is listed twice in $_link, in
     * $_link[$table1][$table2] and in $_link[$table2][$table1]. If a
     * linking table contains foreign key references to N tables, with
     * N > 2, each of the resulting binary links is listed separately.
     * For example, a table with references to 3 tables A, B, and C can 
     * create three binary links (AB, AC, and BC) and six entries in the 
     * link property array (i.e., in $_link[A][B], $_link[B][A], ... ).
     *
     * Linking tables may be added to the $_link property by using the 
     * addLink method or deleted using the delLink method. Alternatively, 
     * all possible linking tables can be identified and added to the 
     * $_link array at once by the addAllLinks() method.
     *
     * @param string $table1 name of linked table
     * @param string $table2 name of linked table
     * @return mixed $_link property array, sub-array, or value
     *
     * @throws PEAR_Error:
     *    - $table1 or $table2 is not a string (..DATABASE_ERR_TBL_NOT_STRING)
     *    - $table1 or $table2 is not a table name (..DATABASE_ERR_NO_TBL)
     *
     * @access public
     */
    function getLink($table1 = null, $table2 = null) 
    {
        if (is_null($table1)) {
            return $this->_link;
        } elseif (is_string($table1)) {
            if (isset($this->_link[$table1])) {
                if (is_null($table2)) {
                    return $this->_link[$table1];
                } elseif (is_string($table2)) {
                    if (isset($this->_link[$table1][$table2])) {
                        return $this->_link[$table1][$table2];
                    } else {
                        if (isset($this->_table[$table2])) {
                            // Valid table names, but no links
                            return null;
                        } else {
                            // Invalid 2nd table name string
                            return $this->throwError(
                                      DB_TABLE_DATABASE_ERR_NO_TBL,
                                      "getLink, $table2");
                        }
                    }
                } else {
                    return $this->throwError(
                              DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                              "getLink");
                }
            } else {
                if (isset($this->_table[$table1])) {
                    // Valid first table name, but no links
                    return null;
                } else {
                    // Invalid 1st table name string
                    return $this->throwError(
                              DB_TABLE_DATABASE_ERR_NO_TBL,
                              "getLink, $table1");
                }
            }
        } else {
            return $this->throwError(
                      DB_TABLE_DATABASE_ERR_TBL_NOT_STRING,
                      "getLink");
        }
    }

    // }}}
    // {{{ function setTableSubclassPath($path) 

    /**
     * Sets path to a directory containing DB_Table subclass definitions.
     *
     * This method sets the $_table_subclass_path string property. The value of
     * this property is the path to the directory containing DB_Table subclass 
     * definitions, without a trailing directory separator. 
     *  
     * This path may be used by the __wakeup(), if necessary, in an attempt to 
     * autoload class definitions when unserializing a DB_Table_Database object 
     * and its child DB_Table objects. If a DB_Table subclass $subclass_name
     * has not been defined when it is needed in DB_Table_Database::__wakeup(), 
     * to unserialize an instance of this class, the __wakeup() method attempts
     * to include a class definition file from this directory, as follows:
     * <code>
     *     $dir = $this->_table_subclass_path;
     *     require_once $dir . '/' . $subclass . '.php';
     * </code>
     * See the getTableSubclass() docblock for a discusion of capitalization
     * conventions in PHP 4 and 5 for subclass file names. 
     * 
     * @param string $path path to directory containing class definitions
     * @return void
     * @access public
     *
     * @see DB_Table_Database::getTableSubclass()
     */
    function setTableSubclassPath($path) 
    {
        $this->_table_subclass_path = $path; 
    }

    // }}}
    // {{{ function addTable(&$table_obj)

    /**
     * Adds a table to the database.
     *
     * Creates references between $this DB_Table_Database object and
     * the child DB_Table object, by adding a reference to $table_obj
     * to the $this->_table array, and setting $table_obj->database =
     * $this. 
     *
     * Adds the primary key to $this->_primary_key array. The relevant
     * element of $this->_primary_key is set to null if no primary key 
     * index is declared. Returns an error if more than one primary key
     * is declared.
     *
     * Returns true on success, and PEAR error on failure. Returns the
     * following DB_TABLE_DATABASE_ERR_* error codes if:
     *    - $table_obj is not a DB_Table ( _DBTABLE_OBJECT )
     *    - more than one primary key is defined  ( _ERR_MULT_PKEY )
     *
     * @param  object &$table_obj the DB_Table object (reference)
     * @return boolean true on success (PEAR_Error on failure)
     * @access public
     */