<?php
// +----------------------------------------------------------------------+
// | PHP versions 4 and 5                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 1998-2006 Manuel Lemos, Paul Cooper                    |
// | All rights reserved.                                                 |
// +----------------------------------------------------------------------+
// | MDB2 is a merge of PEAR DB and Metabases that provides a unified DB  |
// | API as well as database abstraction for PHP applications.            |
// | This LICENSE is in the BSD license style.                            |
// |                                                                      |
// | Redistribution and use in source and binary forms, with or without   |
// | modification, are permitted provided that the following conditions   |
// | are met:                                                             |
// |                                                                      |
// | Redistributions of source code must retain the above copyright       |
// | notice, this list of conditions and the following disclaimer.        |
// |                                                                      |
// | Redistributions in binary form must reproduce the above copyright    |
// | notice, this list of conditions and the following disclaimer in the  |
// | documentation and/or other materials provided with the distribution. |
// |                                                                      |
// | Neither the name of Manuel Lemos, Tomas V.V.Cox, Stig. S. Bakken,    |
// | Lukas Smith nor the names of his contributors may be used to endorse |
// | or promote products derived from this software without specific prior|
// | written permission.                                                  |
// |                                                                      |
// | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  |
// | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT    |
// | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS    |
// | FOR A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE      |
// | REGENTS OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,          |
// | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, |
// | BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS|
// |  OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED  |
// | AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT          |
// | LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY|
// | WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE          |
// | POSSIBILITY OF SUCH DAMAGE.                                          |
// +----------------------------------------------------------------------+
// | Author: Paul Cooper <pgc@ucecom.com>                                 |
// +----------------------------------------------------------------------+
//
// $Id: MDB2_usage_testcase.php,v 1.100 2006/12/19 22:46:48 quipo Exp $

require_once 'MDB2_testcase.php';

class MDB2_Usage_TestCase extends MDB2_TestCase {
    /**
     * Test typed data storage and retrieval
     *
     * This tests typed data storage and retrieval by executing a single
     * prepared query and then selecting the data back from the database
     * and comparing the results
     */
    function testStorage() {
        $data = $this->getSampleData(1234);

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data));
        $stmt->free();

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
        }

        $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';
        $result = $this->db->query($query, $this->fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users'.$result->getMessage());
        }

        $this->verifyFetchedValues($result, 0, $data);
    }

    /**
     * Test fetchOne()
     *
     * This test bulk fetching of result data by using a prepared query to
     * insert an number of rows of data and then retrieving the data columns
     * one by one
     */
    function testFetchOne() {
        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }

        $stmt->free();

        foreach ($this->fields as $field => $type) {
            for ($row = 0; $row < $total_rows; $row++) {
                $result = $this->db->query('SELECT '.$field.' FROM users WHERE user_id='.$row, $type);
                $value = $result->fetchOne();
                if (PEAR::isError($value)) {
                    $this->assertTrue(false, 'Error fetching row '.$row.' for field '.$field.' of type '.$type);
                } else {
                    $this->assertEquals(strval($data[$row][$field]), strval(trim($value)), 'the query field '.$field.' of type '.$type.' for row '.$row);
                    $result->free();
                }
            }
        }
    }

    /**
     * Test fetchCol()
     *
     * Test fetching a column of result data. Two different columns are retrieved
     */
    function testFetchCol() {
        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }

        $stmt->free();

        $first_col = array();
        for ($row = 0; $row < $total_rows; $row++) {
            $first_col[$row] = "user_$row";
        }

        $second_col = array();
        for ($row = 0; $row < $total_rows; $row++) {
            $second_col[$row] = $row;
        }

        $query = 'SELECT user_name, user_id FROM users ORDER BY user_name';
        $result = $this->db->query($query, array('text', 'integer'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchCol(0);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching first column');
        } else {
            $this->assertEquals($first_col, $values);
        }
        $result->free();

        $query = 'SELECT user_name, user_id FROM users ORDER BY user_name';
        $result = $this->db->query($query, array('text', 'integer'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchCol(1);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching second column');
        } else {
            $this->assertEquals($second_col, $values);
        }
        $result->free();
    }

    /**
     * Test fetchAll()
     *
     * Test fetching an entire result set in one shot.
     */
    function testFetchAll() {
        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }
        $fields = array_keys($data[0]);
        $query = 'SELECT '. implode (', ', $fields). ' FROM users ORDER BY user_name';

        $stmt->free();

        $result = $this->db->query($query, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            for ($i=0; $i<$total_rows; $i++) {
                foreach ($data[$i] as $key => $val) {
                    $this->assertEquals(strval($val), strval($values[$i][$key]), 'Row #'.$i.' ['.$key.']');
                }
            }
        }
        $result->free();

        //test $rekey=true
        $result = $this->db->query('SELECT user_id, user_name FROM users ORDER BY user_id', $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            for ($i=0; $i<$total_rows; $i++) {
                list($id, $name) = each($values);
                $this->assertEquals($data[$i]['user_id'],   $id,   'Row #'.$i.' ["user_id"]');
                $this->assertEquals($data[$i]['user_name'], $name, 'Row #'.$i.' ["user_name"]');
            }
        }
        $result->free();


        //test $rekey=true, $force_array=true
        $result = $this->db->query('SELECT user_id, user_name FROM users ORDER BY user_id', $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC, true, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            for ($i=0; $i<$total_rows; $i++) {
                list($id, $value) = each($values);
                $this->assertEquals($data[$i]['user_id'],   $id,                 'Row #'.$i.' ["user_id"]');
                $this->assertEquals($data[$i]['user_name'], $value['user_name'], 'Row #'.$i.' ["user_name"]');
            }
        }
        $result->free();

        //test $rekey=true, $force_array=true, $group=true
        $result = $this->db->query('SELECT user_password, user_name FROM users ORDER BY user_name', $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC, true, true, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            //all the records have the same user_password value
            $this->assertEquals(1, count($values), 'Error: incorrect number of returned rows');
            $values = $values[$data[0]['user_password']];
            for ($i=0; $i<$total_rows; $i++) {
                $this->assertEquals($data[$i]['user_name'], $values[$i]['user_name'], 'Row #'.$i.' ["user_name"]');
            }
        }
        $result->free();

        //test $rekey=true, $force_array=true, $group=false (with non unique key)
        $result = $this->db->query('SELECT user_password, user_name FROM users ORDER BY user_name', $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error during query');
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC, true, true, false);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            //all the records have the same user_password value, they are overwritten
            $this->assertEquals(1, count($values), 'Error: incorrect number of returned rows');
            $key = $data[0]['user_password'];
            $this->assertEquals(1, count($values[$key]), 'Error: incorrect number of returned rows');
            $this->assertEquals($data[4]['user_name'], $values[$key]['user_name']);
        }
        $result->free();
    }

    /**
     * Test different fetch modes
     *
     * Test fetching results using different fetch modes
     * NOTE: several tests still missing
     */
    function testFetchModes() {
        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }

        $stmt->free();

        // test ASSOC
        $query = 'SELECT A.user_name FROM users A, users B WHERE A.user_id = B.user_id';
        $value = $this->db->queryRow($query, array($this->fields['user_name']), MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($value)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            $this->assertTrue(!empty($value['user_name']), 'Error fetching the associative result set from join');
        }
    }

    /**
     * Test multi_query option
     *
     * This test attempts to send multiple queries at once using the multi_query
     * option and then retrieves each result.
     */
    function testMultiQuery() {
        $multi_query_orig = $this->db->getOption('multi_query');
        if (PEAR::isError($multi_query_orig)) {
            $this->assertTrue(false, 'Error getting multi_query option value: '.$multi_query_orig->getMessage());
            return;
        }

        $this->db->setOption('multi_query', true);

        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }

        $stmt->free();

        $query = '';
        for ($row = 0; $row < $total_rows; $row++) {
            $query.= 'SELECT user_name FROM users WHERE user_id='.$row.';';
        }
        $result = $this->db->query($query, 'text');

        for ($row = 0; $row < $total_rows; $row++) {
            $value = $result->fetchOne();
            if (PEAR::isError($value)) {
                $this->assertTrue(false, 'Error fetching row '.$row);
            } else {
                $this->assertEquals(strval($data[$row]['user_name']), strval(trim($value)), 'the query field username of type "text" for row '.$row);
            }
            if (PEAR::isError($result->nextResult())) {
                $this->assertTrue(false, 'Error moving result pointer');
            }
        }

        $result->free();
        $this->db->setOption('multi_query', $multi_query_orig);
    }

    /**
     * Test prepared queries
     *
     * Tests prepared queries, making sure they correctly deal with ?, !, and '
     */
    function testPreparedQueries() {
        $data = array(
            array(
                'user_name' => 'Sure!',
                'user_password' => 'Do work?',
                'user_id' => 1,
            ),
            array(
                'user_name' => 'For Sure!',
                'user_password' => "Doesn't?",
                'user_id' => 2,
            ),
        );

        $query = "INSERT INTO users (user_name, user_password, user_id) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query, array('text', 'text', 'integer'), MDB2_PREPARE_MANIP);

        $text = $data[0]['user_name'];
        $question = $data[0]['user_password'];
        $userid = $data[0]['user_id'];

        // bind out of order
        $stmt->bindParam(0, $text);
        $stmt->bindParam(2, $userid);
        $stmt->bindParam(1, $question);

        $result = $stmt->execute();
        if (PEAR::isError($result)) {
            $this->assertTrue(true, 'Could not execute prepared query with question mark placeholders. Error: '.$error);
        }

        $text = $data[1]['user_name'];
        $question = $data[1]['user_password'];
        $userid = $data[1]['user_id'];

        $result = $stmt->execute();
        if (PEAR::isError($result)) {
            $this->assertTrue(true, 'Could not execute prepared query with bound parameters. Error: '.$error);
        }
        $stmt->free();
        $this->clearTables();

        $query = "INSERT INTO users (user_name, user_password, user_id) VALUES (:text, :question, :userid)";
        $stmt = $this->db->prepare($query, array('text', 'text', 'integer'), MDB2_PREPARE_MANIP);

        $stmt->bindValue('text', $data[0]['user_name']);
        $stmt->bindValue('question', $data[0]['user_password']);
        $stmt->bindValue('userid', $data[0]['user_id']);

        $result = $stmt->execute();
        if (PEAR::isError($result)) {
            $this->assertTrue(true, 'Could not execute prepared query with named placeholders. Error: '.$error);
        }
        $stmt->free();

        $query = "INSERT INTO users (user_name, user_password, user_id) VALUES (".$this->db->quote($data[1]['user_name'], 'text').", :question, :userid)";
        $stmt = $this->db->prepare($query, array('text', 'integer'), MDB2_PREPARE_MANIP);

        $stmt->bindValue('question', $data[1]['user_password']);
        $stmt->bindValue('userid', $data[1]['user_id']);

        $result = $stmt->execute();
        if (PEAR::isError($result)) {
            $this->assertTrue(true, 'Could not execute prepared query with named placeholders and a quoted text value in front. Error: '.$error);
        }
        $stmt->free();

        $query = 'SELECT user_name, user_password, user_id FROM users WHERE user_id=:user_id';
        $stmt = $this->db->prepare($query, array('integer'), array('text', 'text', 'integer'));
        foreach ($data as $row_data) {
            $result = $stmt->execute(array('user_id' => $row_data['user_id']));
            if (PEAR::isError($result)) {
                $this->assertTrue(!PEAR::isError($result), 'Could not execute prepared. Error: '.$result->getUserinfo());
                break;
            }
            $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
            if (!is_array($row)) {
                $this->assertTrue(false, 'Prepared SELECT failed');
            } else {
                $diff = (array)array_diff($row, $row_data);
                $this->assertTrue(empty($diff), 'Prepared SELECT failed for fields: '.implode(', ', array_keys($diff)));
            }
        }
        $stmt->free();

        $row_data = reset($data);
        $query = 'SELECT user_name, user_password, user_id FROM users WHERE user_id='.$this->db->quote($row_data['user_id'], 'integer');
        $stmt = $this->db->prepare($query, null, array('text', 'text', 'integer'));
        $result = $stmt->execute(array());
        if (PEAR::isError($result)) {
            $this->assertTrue(!PEAR::isError($result), 'Could not execute prepared statement with no placeholders. Error: '.$result->getUserinfo());
            break;
        }
        $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
        if (!is_array($row)) {
            $this->assertTrue(false, 'Prepared SELECT failed');
        } else {
            $diff = (array)array_diff($row, $row_data);
            $this->assertTrue(empty($diff), 'Prepared SELECT failed for fields: '.implode(', ', array_keys($diff)));
        }
        $stmt->free();

        $row_data = reset($data);
        $query = 'SELECT user_name, user_password, user_id FROM users WHERE user_name='.$this->db->quote($row_data['user_name'], 'text').' AND user_id = ? AND user_password='.$this->db->quote($row_data['user_password'], 'text');
        $stmt = $this->db->prepare($query, array('integer'), array('text', 'text', 'integer'));
        $result = $stmt->execute(array($row_data['user_id']));
        if (PEAR::isError($result)) {
            $this->assertTrue(!PEAR::isError($result), 'Could not execute prepared with quoted text fields around a placeholder. Error: '.$result->getUserinfo());
            break;
        }
        $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
        if (!is_array($row)) {
            $this->assertTrue(false, 'Prepared SELECT failed');
        } else {
            $diff = (array)array_diff($row, $row_data);
            $this->assertTrue(empty($diff), 'Prepared SELECT failed for fields: '.implode(', ', array_keys($diff)));
        }
        $stmt->free();

        foreach ($this->db->sql_comments as $comment) {
            $query = 'SELECT user_name, user_password, user_id FROM users WHERE '.$comment['start'].' maps to class::foo() '.$comment['end'].' user_name=:username';
            $row_data = reset($data);
            $stmt = $this->db->prepare($query, array('text'), array('text', 'text', 'integer'));
            $result = $stmt->execute(array('username' => $row_data['user_name']));
            if (PEAR::isError($result)) {
                $this->assertTrue(!PEAR::isError($result), 'Could not execute prepared where a name parameter is contained in an SQL comment ('.$comment['start'].'). Error: '.$result->getUserinfo());
                break;
            }
            $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
            if (!is_array($row)) {
                $this->assertTrue(false, 'Prepared SELECT failed');
            } else {
                $diff = (array)array_diff($row, $row_data);
                $this->assertTrue(empty($diff), 'Prepared SELECT failed for fields: '.implode(', ', array_keys($diff)));
            }
            $stmt->free();
        }

        $row_data = reset($data);
        $query = 'SELECT user_name, user_password, user_id FROM users WHERE user_name=:username OR user_password=:username';
        $stmt = $this->db->prepare($query, array('text'), array('text', 'text', 'integer'));
        $result = $stmt->execute(array('username' => $row_data['user_name']));
        if (PEAR::isError($result)) {
            $this->assertTrue(!PEAR::isError($result), 'Could not execute prepared where the same named parameter is used twice. Error: '.$result->getUserinfo());
            break;
        }
        $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
        if (!is_array($row)) {
            $this->assertTrue(false, 'Prepared SELECT failed');
        } else {
            $diff = (array)array_diff($row, $row_data);
            $this->assertTrue(empty($diff), 'Prepared SELECT failed for fields: '.implode(', ', array_keys($diff)));
        }
        $stmt->free();
    }

    /**
     * Test _skipDelimitedStrings(), used by prepare()
     *
     * If the placeholder is contained within a delimited string, it must be skipped,
     * and the cursor position must be advanced
     */
    function testSkipDelimitedStrings() {
        //test correct placeholder
        $query = 'SELECT what FROM tbl WHERE x = ?';
        $position = 0;
        $p_position = strpos($query, '?');
        $this->assertEquals($position, $this->db->_skipDelimitedStrings($query, $position, $p_position), 'Error: the cursor position has changed');

        //test placeholder within a quoted string
        $query = 'SELECT what FROM tbl WHERE x = '. $this->db->string_quoting['start'] .'blah?blah'. $this->db->string_quoting['end'] .' AND y = ?';
        $position = 0;
        $p_position = strpos($query, '?');
        $new_pos = $this->db->_skipDelimitedStrings($query, $position, $p_position);
        $this->assertTrue($position != $new_pos, 'Error: the cursor position was not advanced');

        //test placeholder within a comment
        foreach ($this->db->sql_comments as $comment) {
            $query = 'SELECT what FROM tbl WHERE x = '. $comment['start'] .'blah?blah'. $comment['end'] .' AND y = ?';
            $position = 0;
            $p_position = strpos($query, '?');
            $new_pos = $this->db->_skipDelimitedStrings($query, $position, $p_position);
            $this->assertTrue($position != $new_pos, 'Error: the cursor position was not advanced');
        }

        //add some tests for named placeholders and for identifier_quoting
    }

    /**
     * Test retrieval of result metadata
     *
     * This tests the result metadata by executing a prepared query and
     * select the data, and checking the result contains the correct
     * number of columns and that the column names are in the correct order
     */
    function testMetadata() {
        $data = $this->getSampleData(1234);

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        $result = $stmt->execute(array_values($data));
        $stmt->free();

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
        }

        $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';
        $result = $this->db->query($query, $this->fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users'.$result->getMessage());
        }

        $numcols = $result->numCols();

        $this->assertEquals(count($this->fields), $numcols, "The query result returned an incorrect number of columns unlike expected");

        $column_names = $result->getColumnNames();
        $fields = array_keys($this->fields);
        for ($column = 0; $column < $numcols; $column++) {
            $this->assertEquals($column, $column_names[$fields[$column]], "The query result column \"".$fields[$column]."\" was returned in an incorrect position");
        }

    }

    /**
     * Test storage and retrieval of nulls
     *
     * This tests null storage and retrieval by successively inserting,
     * selecting, and testing a number of null / not null values
     */
    function testNulls() {
        $portability = $this->db->getOption('portability');
        if ($portability & MDB2_PORTABILITY_EMPTY_TO_NULL) {
            $nullisempty = true;
        } else {
            $nullisempty = false;
        }
        $test_values = array(
            array('test', false),
            array('NULL', false),
            array('null', false),
            array('', $nullisempty),
            array(null, true)
        );

        for ($test_value = 0; $test_value <= count($test_values); $test_value++) {
            if ($test_value == count($test_values)) {
                $value = 'NULL';
                $is_null = true;
            } else {
                $value = $this->db->quote($test_values[$test_value][0], 'text');
                $is_null = $test_values[$test_value][1];
            }

            $this->clearTables();

            $result = $this->db->exec("INSERT INTO users (user_name,user_password,user_id) VALUES ($value,$value,0)");

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing insert query'.$result->getMessage());
            }

            $result = $this->db->query('SELECT user_name,user_password FROM users', array('text', 'text'));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing select query'.$result->getMessage());
            }

            if ($is_null) {
                $error_message = 'A query result column is not NULL unlike what was expected';
            } else {
                $error_message = 'A query result column is NULL even though it was expected to be differnt';
            }

            $row = $result->fetchRow();
            $this->assertTrue((is_null($row[0]) == $is_null), $error_message);
            $this->assertTrue((is_null($row[1]) == $is_null), $error_message);

            $result->free();
        }

        $methods = array('fetchOne', 'fetchRow');

        foreach ($methods as $method) {
            $result = $this->db->query('SELECT user_name FROM users WHERE user_id=123', array('text'));
            $value = $result->$method();
            if (PEAR::isError($value)) {
                $this->assertTrue(false, 'Error fetching non existant row');
            } else {
                $this->assertNull($value, 'selecting non existant row with "'.$method.'()" did not return NULL');
                $result->free();
            }
        }

        $methods = array('fetchCol', 'fetchAll');

        foreach ($methods as $method) {
            $result = $this->db->query('SELECT user_name FROM users WHERE user_id=123', array('text'));
            $value = $result->$method();
            if (PEAR::isError($value)) {
                $this->assertTrue(false, 'Error fetching non existant row');
            } else {
                $this->assertTrue((is_array($value) && empty($value)), 'selecting non existant row with "'.$method.'()" did not return empty array');
                $result->free();
            }
        }

        $methods = array('queryOne', 'queryRow');

        foreach ($methods as $method) {
            $value = $this->db->$method('SELECT user_name FROM users WHERE user_id=123', array('text'));
            if (PEAR::isError($value)) {
                $this->assertTrue(false, 'Error fetching non existant row');
            } else {
                $this->assertNull($value, 'selecting non existant row with "'.$method.'()" did not return NULL');
                $result->free();
            }
        }

        $methods = array('queryCol', 'queryAll');

        foreach ($methods as $method) {
            $value = $this->db->$method('SELECT user_name FROM users WHERE user_id=123', array('text'));
            if (PEAR::isError($value)) {
                $this->assertTrue(false, 'Error fetching non existant row');
            } else {
                $this->assertTrue((is_array($value) && empty($value)), 'selecting non existant row with "'.$method.'()" did not return empty array');
                $result->free();
            }
        }
    }

    /**
     * Test paged queries
     *
     * Test the use of setLimit to return paged queries
     */
    function testRanges() {
        if (!$this->supported('limit_queries')) {
            return;
        }

        $data = array();
        $total_rows = 5;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }
        }

        $stmt->free();

        for ($rows = 2, $start_row = 0; $start_row < $total_rows; $start_row += $rows) {

            $this->db->setLimit($rows, $start_row);

            $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users ORDER BY user_name';
            $result = $this->db->query($query, $this->fields);

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing select query'.$result->getMessage());
            }

            for ($row = 0; $row < $rows && ($row + $start_row < $total_rows); $row++) {
                $this->verifyFetchedValues($result, $row, $data[$row + $start_row]);
            }
        }

        $this->assertTrue(!$result->valid(), "The query result did not seem to have reached the end of result as expected starting row $start_row after fetching upto row $row");

        $result->free();

        for ($rows = 2, $start_row = 0; $start_row < $total_rows; $start_row += $rows) {

            $this->db->setLimit($rows, $start_row);

            $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users ORDER BY user_name';
            $result = $this->db->query($query, $this->fields);

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing select query'.$result->getMessage());
            }

            $result_rows = $result->numRows();

            $this->assertTrue(($result_rows <= $rows), 'expected a result of no more than '.$rows.' but the returned number of rows is '.$result_rows);

            for ($row = 0; $row < $result_rows; $row++) {
                $this->assertTrue($result->valid(), 'The query result seem to have reached the end of result at row '.$row.' that is before '.$result_rows.' as expected');

                $this->verifyFetchedValues($result, $row, $data[$row + $start_row]);
            }
        }

        $this->assertTrue(!$result->valid(), "The query result did not seem to have reached the end of result as expected starting row $start_row after fetching upto row $row");

        $result->free();
    }

    /**
     * Test the handling of sequences
     */
    function testSequences() {
        if (!$this->supported('sequences')) {
           return;
        }

        $this->db->loadModule('Manager', null, true);

        for ($start_value = 1; $start_value < 4; $start_value++) {
            $sequence_name = "test_sequence_$start_value";

            $result = $this->db->manager->createSequence($sequence_name, $start_value);
            if (PEAR::isError($result)) {
                $this->assertTrue(false, "Error creating sequence $sequence_name with start value $start_value: ".$result->getMessage());
            } else {
                for ($sequence_value = $start_value; $sequence_value < ($start_value + 4); $sequence_value++) {
                    $value = $this->db->nextId($sequence_name, false);

                    $this->assertEquals($sequence_value, $value, "The returned sequence value is not expected with sequence start value with $start_value");
                }

                $result = $this->db->manager->dropSequence($sequence_name);

                if (PEAR::isError($result)) {
                    $this->assertTrue(false, "Error dropping sequence $sequence_name : ".$result->getMessage());
                }
            }
        }

        // Test ondemand creation of sequences
        $sequence_name = 'test_ondemand';
        $this->db->expectError(MDB2_ERROR_NOSUCHTABLE);
        $this->db->manager->dropSequence($sequence_name);
        $this->db->popExpect();

        for ($sequence_value = 1; $sequence_value < 4; $sequence_value++) {
            $value = $this->db->nextId($sequence_name);

            if (PEAR::isError($result)) {
                $this->assertTrue(false, "Error creating with ondemand sequence: ".$result->getMessage());
            } else {
                $this->assertEquals($sequence_value, $value, "Error in ondemand sequences. The returned sequence value is not expected value");
            }
        }

        $result = $this->db->manager->dropSequence($sequence_name);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, "Error dropping sequence $sequence_name : ".$result->getMessage());
        }

        // Test currId()
        $sequence_name = 'test_currid';

        $next = $this->db->nextId($sequence_name);
        $curr = $this->db->currId($sequence_name);

        if (PEAR::isError($curr)) {
            $this->assertTrue(false, "Error getting the current value of sequence $sequence_name : ".$curr->getMessage());
        } else {
            if ($next != $curr) {
                if ($next+1 == $curr) {
                    $this->assertTrue(false, "Warning: currId() is using nextId() instead of a native implementation");
                } else {
                    $this->assertEquals($next, $curr, "return value if currId() does not match the previous call to nextId()");
                }
            }
        }
        $result = $this->db->manager->dropSequence($sequence_name);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, "Error dropping sequence $sequence_name : ".$result->getMessage());
        }

        // Test lastInsertid()
        if (!$this->supported('new_link')) {
           return;
        }

        $sequence_name = 'test_lastinsertid';

        $dsn = MDB2::parseDSN($this->dsn);
        $dsn['new_link'] = true;
        $dsn['database'] = $this->database;
        $db = MDB2::connect($dsn, $this->options);

        $next = $this->db->nextId($sequence_name);
        $next2 = $db->nextId($sequence_name);
        $last = $this->db->lastInsertId($sequence_name);

        if (PEAR::isError($last)) {
            $this->assertTrue(false, "Error getting the last value of sequence $sequence_name : ".$last->getMessage());
        } else {
            $this->assertEquals($next, $last, "return value if lastInsertId() does not match the previous call to nextId()");
        }
        $result = $this->db->manager->dropSequence($sequence_name);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, "Error dropping sequence $sequence_name : ".$result->getMessage());
        }
    }

    /**
     * Test replace query
     *
     * The replace method emulates the replace query of mysql
     */
    function testReplace() {
        if (!$this->supported('replace')) {
            return;
        }

        $row = 1234;
        $data = $this->getSampleData($row);

        $fields = array(
            'user_name' => array(
                'value' => "user_$row",
                'type' => 'text'
            ),
            'user_password' => array(
                'value' => $data['user_password'],
                'type' => 'text'
            ),
            'subscribed' => array(
                'value' => $data['subscribed'],
                'type' => 'boolean'
            ),
            'user_id' => array(
                'value' => $data['user_id'],
                'type' => 'integer',
                'key' => 1
            ),
            'quota' => array(
                'value' => $data['quota'],
                'type' => 'decimal'
            ),
            'weight' => array(
                'value' => $data['weight'],
                'type' => 'float'
            ),
            'access_date' => array(
                'value' => $data['access_date'],
                'type' => 'date'
            ),
            'access_time' => array(
                'value' => $data['access_time'],
                'type' => 'time'
            ),
            'approved' => array(
                'value' => $data['approved'],
                'type' => 'timestamp'
            )
        );

        $result = $this->db->replace('users', $fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Replace failed');
        }

        if ($this->db->supports('affected_rows')) {
            $affected_rows = $result;

            $this->assertEquals(1, $result, "replacing a row in an empty table returned incorrect value");
        } else {
            $this->assertTrue(false, '"affected_rows" is not supported');
        }

        $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';
        $result = $this->db->query($query, $this->fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users'.$result->getMessage());
        }

        $this->verifyFetchedValues($result, 0, $data);

        $row = 4321;
        $fields['user_name']['value']     = $data['user_name']     = 'user_'.$row;
        $fields['user_password']['value'] = $data['user_password'] = 'somepass';
        $fields['subscribed']['value']    = $data['subscribed']    = $row % 2 ? true : false;
        $fields['quota']['value']         = $data['quota']         = strval($row/100);
        $fields['weight']['value']        = $data['weight']        = sqrt($row);
        $fields['access_date']['value']   = $data['access_date']   = MDB2_Date::mdbToday();
        $fields['access_time']['value']   = $data['access_time']   = MDB2_Date::mdbTime();
        $fields['approved']['value']      = $data['approved']      = MDB2_Date::mdbNow();

        $result = $this->db->replace('users', $fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Replace failed');
        }
        if ($this->db->supports('affected_rows')) {
            $this->assertEquals(2, $result, "replacing a row returned incorrect result");
        }

        $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';
        $result = $this->db->query($query, $this->fields);

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users'.$result->getMessage());
        }

        $this->verifyFetchedValues($result, 0, $data);

        $this->assertTrue(!$result->valid(), 'the query result did not seem to have reached the end of result as expected');

        $result->free();
    }

    /**
     * Test affected rows methods
     */
    function testAffectedRows() {
        if (!$this->supported('affected_rows')) {
            return;
        }

        $data = array();
        $total_rows = 7;

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));

            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query'.$result->getMessage());
            }

            $this->assertEquals(1, $result, "Inserting the row $row returned incorrect affected row count");
        }

        $stmt->free();

        $query = 'UPDATE users SET user_password=? WHERE user_id < ?';
        $stmt = $this->db->prepare($query, array('text', 'integer'), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $password = "pass_$row";
            if ($row == 0) {
                $stmt->bindParam(0, $password);
  