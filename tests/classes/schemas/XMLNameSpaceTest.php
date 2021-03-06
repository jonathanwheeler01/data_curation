<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Test class for XMLNameSpace.
 * Generated by PHPUnit on 2011-11-14 at 19:28:14.
 */
class XMLNameSpaceTest extends PHPUnit_Framework_TestCase {

  /**
   * @var XMLNameSpace
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new XMLNameSpace;
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    
  }

  /**
   * 
   */
  public function testUri() {
    $this->assertFalse($this->object->isset_uri());
    
    $value = 'test';
    
    $this->object->set_uri($value);
    $this->assertTrue($this->object->isset_uri());
    $this->assertEquals($value, $this->object->get_uri());
  }

  /**
   * 
   */
  public function testLocation() {
    $this->assertFalse($this->object->isset_location());
    
    $value = 'test';
    
    $this->object->set_location($value);
    $this->assertTrue($this->object->isset_location());
    $this->assertEquals($value, $this->object->get_location());
  }

  /**
   * 
   */
  public function testPrefix() {
    $this->assertFalse($this->object->isset_prefix());
    
    $value = 'test';
    
    $this->object->set_prefix($value);
    $this->assertTrue($this->object->isset_prefix());
    $this->assertEquals($value, $this->object->get_prefix());
  }

}

?>
