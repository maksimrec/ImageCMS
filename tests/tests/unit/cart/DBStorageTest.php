<?php

namespace Cart;
require_once realpath(dirname(__FILE__) . '/../../..') . '/enviroment.php';
doLogin();

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-13 at 13:18:12.
 */
class DBStorageTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var DBStorage
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DBStorage;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Cart\DBStorage::getData
     * @todo   Implement testGetData().
     */
    public function testGetData() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Cart\DBStorage::setData
     * @todo   Implement testSetData().
     */
    public function testSetData() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Cart\DBStorage::remove
     * @todo   Implement testRemove().
     */
    public function testRemove() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}