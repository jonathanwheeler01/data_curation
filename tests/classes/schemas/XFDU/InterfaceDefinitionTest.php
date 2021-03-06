<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for InterfaceDefinition.
 * Generated by PHPUnit on 2011-11-08 at 06:54:14.
 */
class InterfaceDefinitionTest extends PHPUnit_Framework_TestCase {

  /**
   * @var InterfaceDefinition
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new InterfaceDefinition;
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
  public function testInputParameter() {
    $this->assertFalse($this->object->isset_inputParameters());
    
    $value = new InputParameter();
    $this->object->add_inputParameter($value);
    $this->object->add_inputParameter($value);
    $objs = $this->object->get_inputParameters();
    
    $this->assertTrue($this->object->isset_inputParameters());
    $this->assertEquals(2, sizeof($objs));
    $this->assertEquals(get_class($value), get_class($objs[0]));
    
    $this->object->unset_inputParameters();
    $this->assertFalse($this->object->isset_inputParameters());
  }
  
  /**
   * 
   */
  public function testGet_as_DOM() {
    $dom = new DOMDocument('1.0', 'UTF-8');
    $locatorType = 'URL';
    $id = 'idID';
    $href = 'href';
    $locator = 'locator';
    $otherLocatorType = 'otherLocatorType';
    $textInfo = 'textInfo';
    $name = 'name';
    
    $expectedElement = $dom->createElement('interfaceDefinition');
    $expectedElement->setAttribute('locatorType', $locatorType);
    $expectedElement->setAttribute('ID', $id);
    $expectedElement->setAttribute('href', $href);
    $expectedElement->setAttribute('locator', $locator);
    $expectedElement->setAttribute('otherLocatorType', $otherLocatorType);
    $expectedElement->setAttribute('textInfo', $textInfo);
    $expectedElement->appendChild($ExpectedInputParameter1 = $dom->createElement('inputParameter'));
    $expectedElement->appendChild($ExpectedInputParameter2 = $dom->createElement('inputParameter'));
    $ExpectedInputParameter1->setAttribute('name', $name);
    $ExpectedInputParameter2->setAttribute('name', $name);
    
    $this->object->set_locatorType($locatorType);
    $this->object->set_id($id);
    $this->object->set_href($href);
    $this->object->set_locator($locator);
    $this->object->set_otherLocatorType($otherLocatorType);
    $this->object->set_textInfo($textInfo);
    
    $actualInputParameter = new InputParameter();
    $actualInputParameter->set_name($name);
    
    $this->object->add_inputParameter($actualInputParameter);
    $this->object->add_inputParameter($actualInputParameter);
    
    $actualElement = $dom->importNode($this->object->get_as_DOM(), TRUE);
    
    $this->assertEqualXMLStructure($expectedElement, $actualElement, TRUE);
    
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingLocatorType() {
    $this->object->get_as_DOM();
  }

}

?>
