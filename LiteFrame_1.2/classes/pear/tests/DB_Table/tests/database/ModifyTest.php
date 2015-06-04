<?php
require_once 'DatabaseTest.php';

/**
 * Tests methods needed to modify data in a database:
 * validForeignKeys(), insert(), delete(), and update() 
 *
 * Also uses setOnDelete() and setOnUpdate() to modify
 * referentially triggered actions
 */
class ModifyTest extends DatabaseTest {

    var $data_dir  = 'ModifyTest';
    var $data_mode = 'r';
    var $verbose   = 2;

    function testValidForeignKeys1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Test FKs of PersonPhone row (18,2) with valid FKs";
        }
        $data = array();
        $data['PersonID'] = 18;
        $data['PhoneID']  = 2;
        $result = $this->db->ValidForeignKeys('PersonPhone', $data);
        $this->assertNotError($result);
        $this->assertTrue($result);
    }

    function testValidForeignKeys2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Test FKs of Address with valid multi-column FK";
        }

        $data = array();
        $data['Building'] = '1357';
        $data['Street']   = 'NORMAN DR';
        $data['City']     = 'MINNETONKA';
        $data['StateAbb'] = 'MN';
        $data['ZipCode']  = '55345';
        $result = $this->db->ValidForeignKeys('Address', $data);

        // Check that $result is boolean true
        $this->assertNotError($result);
        $this->assertTrue($result);

    }

    function testValidForeignKeys3()
    {
        if ($this->verbose > 0) {
            print "\n" . "Test FKs of PersonPhone row (18,38) with invalid FK";
        }
        $data = array();
        $data['PersonID'] = 18;
        $data['PhoneID']  = 38;
        $result = $this->db->ValidForeignKeys('PersonPhone', $data);

        // Check that $result is a PEAR_Error object
        $this->assertIsError($result, 'No Error for invalid foreign key');
    }

    function testValidForeignKeys4()
    {
        if ($this->verbose > 0) {
            print "\n" . "Test FKs of Address with invalid multi-column FK";
        }

        $data = array();
        $data['Building'] = '1357';
        $data['Street']   = 'NORMAL DR'; // Invalid: Should be 'NORMAN DR'
        $data['City']     = 'MINNETONKA';
        $data['StateAbb'] = 'MN';
        $data['ZipCode']  = '55345';
        $result = $this->db->ValidForeignKeys('Address', $data);

        // Check that $result is a PEAR_Error object
        $this->assertIsError($result, 'No Error for invalid foreign key');
    }

    function testInsert1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Insert row with valid integer FKs in PersonPhone";
        }

        // Insert new row into PersonPhone
        $data = array();
        $data['PersonID'] = 18;
        $data['PhoneID']  =  2;
        $result = $this->db->insert('PersonPhone', $data);
        $this->assertNotError($result);
        $expect = true;
        $this->assertEquals($result, $expect);

        // Inspect PersonPhone
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);

        // Check number of items
        $this->assertEquals(count($result), count($this->PersonPhone)+1);

        // Search for added row
        $data['PersonID'] = '18';
        $data['PhoneID']  = '2';
        $found = false;
        foreach ($result as $row) {
            if ($row == $data) {
                $found = true;
            }
        }
        if (!$found) {
            print "\nError during search for missing row - not found";
            var_export($result);
        }
        $this->assertTrue($found);
    }

    function testInsert2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Insert row with valid multi-column FK into Address";
        }

        $data = array();
        $data['Building'] = '1357';
        $data['Street']   = 'NORMAN DR';
        $data['City']     = 'MINNETONKA';
        $data['StateAbb'] = 'MN';
        $data['ZipCode']  = '55345';
        $result = $this->db->insert('Address', $data);
        $this->assertNotError($result);
        $this->assertEquals($result, true);

        // Inspect Address 
        $report = array('select' => '*',
                        'from' => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);

        // Check number of items
        $this->assertEquals(count($result), count($this->Address)+1);

        // Search for added row
        $found = false;
        $newID = (string) count($this->Address)+1;
        foreach ($result as $row) {
            if ($row['AddressID'] == $newID) {
                $found = true;
                foreach ($data as $key => $value) {
                    if ($row[$key] != $value) {
                        $this->assertTrue(false);
                        return;
                    }
                }
            }
        }
        if (!$found) {
            print 'New row not found in testInsert';
        }
        $this->assertTrue($found);
    }

    function testInsertForeignKeyCheck1()
    {
        if ($this->verbose > 0) {
            print "\n" . 
            "Attempt insert with invalid FK integer PhoneID in PersonPhone";
        }

        $assoc = array();
        $assoc['PersonID'] = 17;
        $assoc['PhoneID']  = 28; // Beyond range available in Phone
        $result = $this->db->insert('PersonPhone', $assoc);
        $this->assertIsError($result, 'Successful insert with invalid FKey');
    }
        
    function testInsertForeignKeyCheck2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Attempt insert with invalid multi-column FK in Address";
        }

        $data = array();
        $data['Building'] = '1357';
        $data['Street']   = 'EASY ST';    // No such street in Street table
        $data['City']     = 'MINNETONKA';
        $data['StateAbb'] = 'MN';
        $data['ZipCode']  = '12345';
        $result = $this->db->insert('Address', $data);
        $this->assertIsError($result, 'Successful insert with invalid FKey');
    }
        
    function testDeleteCascade1()
    {
        if ($this->verbose > 0) {
            print "\n" . 
            'Cascading delete with integer referenced key from Person';
        }

        $where  = 'PersonID = 15';
        $result = $this->db->delete('Person', $where);
        $this->assertNotError($result);

        // Inspect PersonPhone
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);

        // Check number of items
        $this->assertEquals(count($result), count($this->PersonPhone)-1);

        // Check that no PersonID == '15' exists
        foreach ($result as $row) {
            if ($row['PersonID'] == '15') {
                $this->assertTrue(false);
                return;
            }
        }

        // Inspect PersonPhone
        $this->addData($result, 'PersonPhone');

        // Inspect PersonAddress
        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);

        // Check number of items
        $this->assertEquals(count($result),count($this->PersonAddress)-1);

        // Check that no row with PersonID2 == 15 still exists
        foreach ($result as $row) {
            if ($row['PersonID2'] == '15') {
                $this->assertTrue(false);
                return;
            }
        }
        $this->addData($result, 'PersonAddress');
    }
       
    function testDeleteCascade2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Cascading delete with multi-column referenced key from Street";
        }
        $where  = "Street = 'NORMAN DR'";
        $result = $this->db->delete('Street', $where);
        $this->assertNotError($result);

        // Inspect Street 
        $report = array('select' => '*',
                        'from'   => 'Street',
                        'fetchmode' => $this->fetchmode_assoc );
        $count = $this->db->selectCount($report);
        $this->assertEquals($count, '16');
        if ($this->verbose > 1) {
            print "\n" . "$count rows remaining in Street"; 
        }

        // Inspect Address 
        $report = array('select' => 'AddressID, Building, Street, City',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertEquals(count($result),count($this->Address)-2);
        $this->addData($result, 'Address');

        // Inspect PersonAddress 
        $report = array('select' => 'PersonID2, AddressID',
                        'from'   => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertEquals(count($result),count($this->PersonAddress)-2);
        $this->addData($result, 'PersonAddress');
    }

    function testDeleteNullify1()
    {
        if ($this->verbose > 0) {
            print "\n" . 
            'Nullifying delete with integer referenced key from Person';
        }

        $this->db->setOnDelete('PersonPhone', 'Person', 'set null');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'set null');

        $where  = 'PersonID = 15';
        $result = $this->db->delete('Person', $where);
        $this->assertNotError($result);

        // Inspect PersonPhone
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->assertEquals(count($result),count($this->PersonPhone));
        foreach ($result as $row) {
            if ($row['PhoneID'] == '13') {
                $this->assertEquals($row['PersonID'],null);
            }
        }
        $this->addData($result, 'PersonPhone');

        // Inspect PersonAddress
        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);

        // Check number of rows in PersonAddress
        $this->assertEquals(count($result), count($this->PersonAddress)-1);

        // Check for rows with PersonID2 == '15'
        foreach ($result as $row) {
            if ($row['PersonID2'] == '15') {
                $this->assertTrue(false);
                return;
            }
        }
        $this->addData($result, 'PersonAddress');
    }
        
    function testDeleteNullify2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Nullifying delete with multi-column referenced key from Street";
        }

        $this->db->setOnDelete('Address', 'Street', 'set null');
        $this->db->SetOnUpdate('Address', 'Street', 'set null');

        $where  = "Street = 'NORMAN DR'";
        $result = $this->db->delete('Street', $where);
        $this->assertNotError($result);

        // Inspect Street
        $report = array('select' => '*',
                        'from'   => 'Street',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->assertEquals(count($result), count($this->Street)-1);
        $this->addData($result, 'Street');

        // Inspect Address
        $report = array('select' => 'AddressID, Building, Street, City',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'Address');

        // Inspect PersonAddress
        $report = array('select' => 'PersonID2, AddressID',
                        'from'   => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 'PersonAddress');
    }

    function testDeleteDefault1()
    {
        if ($this->verbose > 0) {
            print "\n" . 
            'Nullifying delete with integer referenced key from Person';
        }

        $this->db->setOnDelete('PersonPhone', 'Person', 'set default');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'set default');

        $where  = 'PersonID = 15';
        $result = $this->db->delete('Person', $where);
        $this->assertNotError($result);

        // Inspect PersonPhone
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 'PersonPhone');

        // Inspect PersonAddress
        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 'PersonAddress');
    }

    function testDeleteDefault2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Delete multi-col key from Street with on default";
        }

        $this->db->setOnDelete('Address', 'Street', 'set default');
        $this->db->SetOnUpdate('Address', 'Street', 'set default');

        $where  = "Street = 'NORMAN DR'";
        $result = $this->db->delete('Street', $where);
        $this->assertNotError($result);

        // Inspect Street
        $report = array('select' => '*',
                        'from'   => 'Street',
                        'fetchmode' => $this->fetchmode_assoc );
        $count = $this->db->selectCount($report);
        print "\n" . "$count rows remaining in Street"; 

        // Inspect Address
        $report = array('select' => 'AddressID, Building, Street, City',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 
               "Address (ID, Building, Street, City):");

        // Inspect PersonAddress
        $report = array('select' => '*',
                        'from'   => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 'PersonAddress');

    }

    function testDeleteRestrict1()
    {
        if ($this->verbose > 0) {
            print "\n" . 
            'Restricted delete with integer referenced key from Person';
        }

        $this->db->setOnDelete('PersonPhone', 'Person', 'restrict');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'restrict');

        $where  = 'PersonID = 15';
        $result = $this->db->delete('Person', $where);
        $this->assertIsError($result, 'Success of restricted delete');
    }

    function testDeleteRestrict2()
    {
        if ($this->verbose > 0) {
            print "\n" . "Restricted delete with multi-col key from Street";
        }

        $this->db->setOnDelete('Address', 'Street', 'restrict');
        $this->db->SetOnUpdate('Address', 'Street', 'restrict');

        $where  = "Street = 'NORMAN DR'";
        $result = $this->db->delete('Street', $where);
        $this->assertIsError($result, 'Success of restricted delete');
    }

    function testUpdate()
    {
        if ($this->verbose > 0) {
            print "\n" . "Allowed update of integer foreign key of PersonPhone";
        }
        $assoc = array();
        $assoc['PhoneID'] = 9;
        $where = 'PhoneID = 18';
        $result = $this->db->update('PersonPhone', $assoc, $where);
        $this->assertNotError($result);
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonPhone');
    }

    function testUpdateForeignKeyCheck()
    {
        if ($this->verbose > 0) {
            print "\n" . "Attempt update with invalid integer foreign key";
        }
        $assoc = array();
        $assoc['PhoneID'] = 28;  // beyond range of valid values 
        $where = 'PhoneID = 18';
        $result = $this->db->update('PersonPhone', $assoc, $where);
        $this->assertIsError($result, 'Success of update with invalid FKey');
    }

    function testUpdateCascade1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Cascading update of integer primary key of Person";
        }
        $where = 'PersonID = 13';
        $assoc = array('PersonID' => 38);
        $result = $this->db->update('Person', $assoc, $where);
        $this->assertNotError($result);
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonPhone');
        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonAddress');
    }

    function testUpdateCascade2()
    {
        if ($this->verbose > 0) {
            print "\n" ."Cascading update of multi-column referenced key from Street";
        }
        $where = "Street = 'NORMAN DR'";
        $data  = array('Street' => 'NOX BOULEVARD', 'City' => 'ANYTOWN');
        $result = $this->db->update('Street', $data, $where);
        $this->assertNotError($result);
        $report = array('select' => 'AddressID, Building, Street, City',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->addData($result, 'Address(ID, Building, Street, City)');
    }

    function testUpdateNullify1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Nullifying update of integer primary key of Person";
        }
        $this->db->setOnDelete('PersonPhone', 'Person', 'set null');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'set null');

        $where = 'PersonID = 13';
        $assoc = array('PersonID' => 38);
        $result = $this->db->update('Person', $assoc, $where);
        $this->assertNotError($result);

        // Inspect PersonPhone
        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonPhone');
        // Inspect PersonAddress
        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonAddress');
    }

    function testUpdateNullify2()
    {
        if ($this->verbose > 0) {
            print "\n" ."Nullifying update of multi-column referenced key from Street";
        }

        $this->db->setOnDelete('Address', 'Street', 'set null');
        $this->db->SetOnUpdate('Address', 'Street', 'set null');

        $where = "Street = 'NORMAN DR'";
        $data  = array('Street' => 'NOX BOULEVARD', 'City' => 'ANYTOWN');
        $result = $this->db->update('Street', $data, $where);
        $this->assertNotError($result);

        $report = array('select' => 'AddressID, Building, Street, City',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 
               'Address (ID, Building, Street, City)');
    }

    function testUpdateDefault1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Set default on Update of integer primary key of Person";
        }

        $this->db->setOnDelete('PersonPhone', 'Person', 'set default');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'set default');

        $where = 'PersonID = 13';
        $assoc = array('PersonID' => 38);
        $result = $this->db->update('Person', $assoc, $where);
        $this->assertNotError($result);

        $report = array('select' => '*',
                        'from' => 'PersonPhone',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonPhone');

        $report = array('select' => '*',
                        'from' => 'PersonAddress',
                        'fetchmode' => $this->fetchmode_assoc );
        $result = $this->db->select($report);
        $this->assertNotError($result);
        $this->addData($result, 'PersonAddress');
    }

    function testUpdateDefault2()
    {
        if ($this->verbose > 0) {
            print "\n" ."Nullifying update of multi-column referenced key from Street";
        }
        $this->db->setOnDelete('Address', 'Street', 'set default');
        $this->db->SetOnUpdate('Address', 'Street', 'set default');

        $where = "Street = 'NORMAN DR'";
        $data  = array('Street' => 'NOX BOULEVARD', 'City' => 'ANYTOWN');
        $result = $this->db->update('Street', $data, $where);
        $this->assertNotError($result);
        $report = array('select' => 
                        'AddressID, Building, Street, City, StateAbb',
                        'from'   => 'Address',
                        'fetchmode' => $this->fetchmode_assoc );
        $this->assertNotError($result);
        $result = $this->db->select($report);
        $this->addData($result, 
               'Address(ID, Building, Street, City, StateAbb)');
    }

    function testUpdateRestrict1()
    {
        if ($this->verbose > 0) {
            print "\n" . "Restricted update of integer primary key of Person";
        }
        $this->db->setOnDelete('PersonPhone', 'Person', 'restrict');
        $this->db->SetOnUpdate('PersonPhone', 'Person', 'restrict');

        $where = 'PersonID = 13';
        $assoc = array('PersonID' => 38);
        $result = $this->db->update('Person', $assoc, $where);
        $this->assertIsError($result, 'Success of restricted update');
    }

    function testUpdateRestrict2()
    {
        if ($this->verbose > 0) {
            print "\n" ."Restricted update of multi-column referenced key from Street";
        }
        $this->db->setOnDelete('Address', 'Street', 'restrict');
        $this->db->SetOnUpdate('Address', 'Street', 'restrict');

        $where = "Street = 'NORMAN DR'";
        $data  = array('Street' => 'NOX BOULEVARD', 'City' => 'ANYTOWN');
        $result = $this->db->update('Street', $data, $where);
        $this->assertIsError($result, 'Success of restricted update');
    }

}

?>
