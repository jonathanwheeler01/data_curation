<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for MetadataReference.
 * Generated by PHPUnit on 2011-11-07 at 05:43:20.
 */
class MetadataReferenceTest extends PHPUnit_Framework_TestCase {

  /**
   * @var MetadataReference
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new MetadataReference;
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
  public function testMimeType() {
    $this->assertFalse($this->object->isset_mimeType());
    
    $value = 'test';
    $this->object->set_mimeType($value);
    $this->assertTrue($this->object->isset_mimeType());
    $this->assertEquals($value, $this->object->get_mimeType());
  }
  
  

  /**
   * 
   */
  public function testVocabularyName() {
    $this->assertFalse($this->object->isset_vocubularyName());
    
    $value = 'test';
    $this->object->set_vocubularyName($value);
    $this->assertTrue($this->object->isset_vocubularyName());
    $this->assertEquals($value, $this->object->get_vocabularyName());
  }
  
   /**
   * 
   */
  public function testInheritedHREF() {
    $this->assertFalse($this->object->isset_href());
    
    $value = 'test';
    $this->object->set_href($value);
    $this->assertTrue($this->object->isset_href());
    $this->assertEquals($value, $this->object->get_href());
  }
  
  public function testGet_as_DOM() {
    $dom = new DOMDocument('1.0', 'UTF-8');
    
    $locatorType = 'URL';
    $locator = 'locator';
    $otherLocatorType = 'otherLocatorType';
    $href = 'href';
    $id = 'id';
    $textInfo = 'textInfo';
    $mimeType = 'mimetype';
    $vocabularyName = 'vocabulary';
    
    $expectedElement = $dom->createElement('metadataReference');
    $expectedElement->setAttribute('locatorType', $locatorType);
    $expectedElement->setAttribute('locator', $locator);
    $expectedElement->setAttribute('otherLocatorType', $otherLocatorType);
    $expectedElement->setAttribute('href', $href);
    $expectedElement->setAttribute('ID', $id);
    $expectedElement->setAttribute('textInfo', $textInfo);
    $expectedElement->setAttribute('mimeType', $mimeType);
    $expectedElement->setAttribute('vocabularyName', $vocabularyName);
    
    $this->object->set_locatorType($locatorType);
    $this->object->set_locator($locator);
    $this->object->set_otherLocatorType($otherLocatorType);
    $this->object->set_href($href);
    $this->object->set_id($id);
    $this->object->set_textInfo($textInfo);
    $this->object->set_mimeType($mimeType);
    $this->object->set_vocubularyName($vocabularyName);
    
    $this->assertEqualXMLStructure($expectedElement, $dom->importNode($this->object->get_as_DOM(), TRUE), TRUE);
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingLocatorType() {
    $this->object->get_as_DOM();
  }

}

?>
