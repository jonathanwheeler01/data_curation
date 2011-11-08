<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for BehaviorObject.
 * Generated by PHPUnit on 2011-11-08 at 01:26:28.
 */
class BehaviorObjectTest extends PHPUnit_Framework_TestCase {

  /**
   * @var BehaviorObject
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new BehaviorObject;
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
  public function testBehaviorObjects() {
    $this->assertFalse($this->object->isset_behaviorObjects());
    
    $value = new BehaviorObject();
    $this->object->add_behaviorObject($value);
    $this->object->add_behaviorObject($value);
    $objs = $this->object->get_behaviorObjects();
    
    $this->assertTrue($this->object->isset_behaviorObjects());
    $this->assertEquals(2, sizeof($objs));
    $this->assertEquals(get_class($value), get_class($objs[0]));
    
    $this->object->unset_behaviorObjects();
    $this->assertFalse($this->object->isset_behaviorObjects());
  }
  
  /**
   * 
   */
  public function testMechanisms() {
    $this->assertFalse($this->object->isset_mechanisms());
    
    $value = new Mechanism();
    $this->object->add_mechanism($value);
    $this->object->add_mechanism($value);
    $objs = $this->object->get_mechanisms();
    
    $this->assertTrue($this->object->isset_mechanisms());
    $this->assertEquals(2, sizeof($objs));
    $this->assertEquals(get_class($value), get_class($objs[0]));
    
    $this->object->unset_mechanism();
    $this->assertFalse($this->object->isset_mechanisms());
  }
  
  /**
   * 
   */
  public function testBehaviorType() {
    $this->assertFalse($this->object->isset_behaviorType());
  
    $value = 'test';
    $this->object->set_behaviorType($value);
    
    $this->assertTrue($this->object->isset_behaviorType());
    $this->assertEquals($value, $this->object->get_behaviorType());
  }
  
  /**
   * 
   */
  public function testContentUnitID() {
    $this->assertFalse($this->object->isset_contentUnitID());
  
    $value = 'test';
    $this->object->set_contentUnitID($value);
    
    $this->assertTrue($this->object->isset_contentUnitID());
    $this->assertEquals($value, $this->object->get_contentUnitID());
  }
  
  /**
   * @expectedException XFDUException
   */
  public function testBadContentUnitID() {
    $this->object->set_contentUnitID('0badID');
  }
  
  /**
   * 
   */
  public function testGroupID() {
    $this->assertFalse($this->object->isset_groupID());
  
    $value = 'test';
    $this->object->set_groupID($value);
    
    $this->assertTrue($this->object->isset_groupID());
    $this->assertEquals($value, $this->object->get_groupID());
  }
  
  /**
   * @expectedException XFDUException
   */
  public function testBadGroupID() {
    $this->object->set_groupID('0badID');
  }
  
  /**
   * 
   */
  public function testID() {
    $this->assertFalse($this->object->isset_id());
  
    $value = 'test';
    $this->object->set_id($value);
    
    $this->assertTrue($this->object->isset_id());
    $this->assertEquals($value, $this->object->get_id());
  }
  
  /**
   * @expectedException XFDUException
   */
  public function testBadID() {
    $this->object->set_id('0badID');
  }
  
  /**
   * 
   */
  public function testCreated() {
    $this->assertFalse($this->object->isset_created());
  
    $value = 'test';
    $this->object->set_created($value);
    
    $this->assertTrue($this->object->isset_created());
    $this->assertEquals($value, $this->object->get_created());
  }
  
  /**
   * 
   */
  public function testTextInfo() {
    $this->assertFalse($this->object->isset_textInfo());
  
    $value = 'test';
    $this->object->set_textInfo($value);
    
    $this->assertTrue($this->object->isset_textInfo());
    $this->assertEquals($value, $this->object->get_textInfo());
  }
  
  /**
   * 
   */
  public function testInterfaceDefinition() {
    $this->assertFalse($this->object->isset_interfaceDefinition());
    
    $value = new InterfaceDefinition();
    $this->object->set_interfaceDefinition($value);
    
    $this->assertTrue($this->object->isset_interfaceDefinition());
    $this->assertEquals(get_class($value), get_class($this->object->get_interfaceDefinition()));
  }

}

?>
