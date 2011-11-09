<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for ContentUnit.
 * Generated by PHPUnit on 2011-11-04 at 21:48:51.
 */
class ContentUnitTest extends PHPUnit_Framework_TestCase {

  /**
   * @var ContentUnit
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new ContentUnit;
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
  public function testContentUnit() {
    $this->assertFalse($this->object->isset_contentUnits());
    
    $value = new ContentUnit();
    $this->object->add_contentUnit($value);
    $this->object->add_contentUnit($value);
    $objs = $this->object->get_contentUnits();
    
    $this->assertTrue($this->object->isset_contentUnits());
    $this->assertEquals(2, sizeof($objs));
    $this->assertEquals(get_class($value), get_class($objs[0]));
    
    $this->object->unset_contentUnits();
    
    $this->assertFalse($this->object->isset_contentUnits());
  }

  /**
   * 
   */
  public function testAnyMdID() {
    $this->assertFalse($this->object->isset_anyMdID());

    $anyMdID = 'test';
    $this->object->set_anyMdID($anyMdID);
    $this->assertTrue($this->object->isset_anyMdID());
    $this->assertEquals($anyMdID, $this->object->get_anyMdID());
  }
  
  /**
   * @expectedException InvalidIDTokenException
   */
  public function testInvalidAnyMdID() {
    $this->object->set_anyMdID('0invalid');
  }
  
  /**
   * 
   */
  public function testBehaviorID() {
    $this->assertFalse($this->object->isset_behaviorID());
    
    $behaviorID = 'test';
    $this->object->set_behaviorID($behaviorID);
    $this->assertTrue($this->object->isset_behaviorID());
    $this->assertEquals($behaviorID, $this->object->get_behaviorID());
  }
  
  /**
   * @expectedException InvalidIDTokenException
   */
  public function testInvalidBehaviorID() {
    $this->object->set_behaviorID('0invalid');
  }
  
  /**
   * 
   */
  public function testDataObjectPointer() {
    $this->assertFalse($this->object->isset_dataObjectPointer());
    
    $dataObjectPointer = new DataObjectPointer();
    $this->object->set_dataObjectPointer($dataObjectPointer);
    $this->assertTrue($this->object->isset_dataObjectPointer());
    $this->assertEquals('DataObjectPointer', get_class($this->object->get_dataObjectPointer()));
  }
  
  /**
   * 
   */
  public function testDmdID() {
    $this->assertFalse($this->object->isset_dmdID());
    
    $dmdID = 'test';
    $this->object->set_dmdID($dmdID);
    $this->assertTrue($this->object->isset_dmdID());
    $this->assertEquals($dmdID, $this->object->get_dmdID());
  }
  
  /**
   * @expectedException InvalidIDTokenException
   */
  public function testInvalidDmdID() {
    $this->object->set_dmdID('0invalid');
  }
  
  /**
   * 
   */
  public function testExtension() {
    $this->assertFalse($this->object->isset_extension());
    
    $dmdID = 'test';
    $this->object->set_extension($dmdID);
    $this->assertTrue($this->object->isset_extension());
    $this->assertEquals($dmdID, $this->object->get_extension());
  }
  
  /**
   * 
   */
  public function testID() {
    $this->assertFalse($this->object->isset_id());
    
    $id = 'test';
    $this->object->set_id($id);
    $this->assertTrue($this->object->isset_id());
    $this->assertEquals($id, $this->object->get_id());
  }
  
  /**
   * 
   */
  public function testOrder() {
    $this->assertFalse($this->object->isset_order());
    
    $order = 'test';
    $this->object->set_order($order);
    $this->assertTrue($this->object->isset_order());
    $this->assertEquals($order, $this->object->get_order());
  }
  
  /**
   * 
   */
  public function testPdiID() {
    $this->assertFalse($this->object->isset_pdiID());
    
    $pdiID = 'test';
    $this->object->set_pdiID($pdiID);
    $this->assertTrue($this->object->isset_pdiID());
    $this->assertEquals($pdiID, $this->object->get_pdiID());
  }
  
  /**
   * 
   */
  public function testRepID() {
    $this->assertFalse($this->object->isset_repID());
    
    $repID = 'test';
    $this->object->set_repID($repID);
    $this->assertTrue($this->object->isset_repID());
    $this->assertEquals($repID, $this->object->get_repID());
  }
  
  /**
   * 
   */
  public function testUnitType() {
    $this->assertFalse($this->object->isset_unitType());
    
    $value = 'test';
    $this->object->set_unitType($value);
    $this->assertTrue($this->object->isset_unitType());
    $this->assertEquals($value, $this->object->get_unitType());
  }
  
  /**
   * 
   */
  public function testTextInfo() {
    $this->assertFalse($this->object->isset_textInfo());
    
    $textInfo = 'test';
    $this->object->set_textInfo($textInfo);
    $this->assertTrue($this->object->isset_textInfo());
    $this->assertEquals($textInfo, $this->object->get_textInfo());
  }
  
  public function testXfduPointer() {
    $this->assertFalse($this->object->isset_xfduPointer());
    
    $value = new Reference();
    $this->object->set_xfduPointer($value);
    $this->assertEquals('Reference', get_class($this->object->get_xfduPointer()), 'Class '.get_class($this->object->get_xfduPointer()).' found.');
  }

}

?>
