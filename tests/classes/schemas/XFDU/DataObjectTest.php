<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for DataObject.
 * Generated by PHPUnit on 2011-11-08 at 00:07:16.
 */
class DataObjectTest extends PHPUnit_Framework_TestCase {

  /**
   * @var DataObject
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new DataObject;
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
  public function testBytstream() {
    $this->assertFalse($this->object->isset_bytestreams());
    
    $value = new ByteStream();
    $this->object->add_bytstream($value);
    $this->object->add_bytstream($value);
    $bytestreams = $this->object->get_bytestreams();
    
    $this->assertEquals(2, sizeof($bytestreams));
    $this->assertTrue($this->object->isset_bytestreams());
    $this->assertEquals(get_class($value), get_class($bytestreams[0]));
    
    $this->object->unset_bytestreams();
    
    $this->assertFalse($this->object->isset_bytestreams());
  }

  /**
   * 
   */
  public function testChecksum() {
    $this->assertFalse($this->object->isset_checksum());
    
    $value = new ChecksumInformation();
    $this->object->set_checksum($value);
    $this->assertTrue($this->object->isset_checksum());
    $this->assertEquals(get_class($value), get_class($this->object->get_checksum()));
  }

  /**
   * 
   */
  public function testCombinationName() {
    
    $this->assertFalse($this->object->isset_combinationName());
    
    $value = 'concat';
    $this->object->set_combinationName($value);
    $this->assertTrue($this->object->isset_combinationName());
    $this->assertEquals($value, $this->object->get_combinationName());
  }
  
  /**
   * @expectedException InvalidArgumentException
   */
  public function testInvalidCombinationName() {
    $this->object->set_combinationName('invalid');
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
   * @expectedException InvalidIDTokenException
   */
  public function testInvalidID() {
  $this->object->set_id('0invalid');
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
  public function testRegisteredID() {
    $this->assertFalse($this->object->isset_registeredID());
    
    $value = 'test';
    $this->object->set_registeredID($value);
    $this->assertTrue($this->object->isset_registeredID());
    $this->assertEquals($value, $this->object->get_registeredID());
  }

  /**
   * 
   */
  public function testRegistrationAuthority() {
    $this->assertFalse($this->object->isset_registrationAuthority());
    
    $value = 'test';
    $this->object->set_registrationAuthority($value);
    $this->assertTrue($this->object->isset_registrationAuthority());
    $this->assertEquals($value, $this->object->get_registrationAuthority());
  }

  /**
   * 
   */
  public function testRepID() {
    $this->assertFalse($this->object->isset_repID());
    
    $value = 'test';
    $this->object->set_repID($value);
    $this->assertTrue($this->object->isset_repID());
    $this->assertEquals($value, $this->object->get_repID());
  }
  
  /**
   * @expectedException InvalidIDTokenException
   */
  public function testInvalidRepID() {
    $this->object->set_repID('0invalid');
  }

  /**
   * 
   */
  public function testSize() {
    $this->assertFalse($this->object->isset_size());
    
    $value = 120;
    $this->object->set_size($value);
    $this->assertTrue($this->object->isset_size());
    $this->assertEquals($value, $this->object->get_size());
  }
  
  /**
   * @expectedException InvalidArgumentException
   */
  public function testInvalidSize() {
    $this->object->set_size('invalid');
  }

  /**
   * 
   */
  public function testTransformObject() {
    $this->assertFalse($this->object->isset_transformObject());
    
    $value = new TransformObject();
    $this->object->set_transformObject($value);
    $this->assertTrue($this->object->isset_transformObject());
    $this->assertEquals(get_class($value), get_class($this->object->get_transformObject()));
  }
  
  public function testGet_as_DOM() {
    $id = 'doID';
    $mimeType = 'mimeType';
    $registeredID = 'regID';
    $registrationAuthority = 'regAuth';
    $repID = 'repID';
    $size = 1;
    $combinationName = 'concat';
    
    $dom = new DOMDocument('1.0', 'UTF-8');
    
    $expectedElement = $dom->createElement('dataObject');
    $expectedElement->setAttribute('ID', $id);
    $expectedElement->setAttribute('mimeType', $mimeType);
    $expectedElement->setAttribute('registeredID', $registeredID);
    $expectedElement->setAttribute('registrationAuthority', $registrationAuthority);
    $expectedElement->setAttribute('repID', $repID);
    $expectedElement->setAttribute('size', $size);
    $expectedElement->setAttribute('combinationName', $combinationName);
    
    $expectedElement->appendChild($expectedByteStream1 = $dom->createElement('byteStream'));
    $expectedElement->appendChild($expectedByteStream2 = $dom->createElement('byteStream'));
    
    $this->object->set_id($id);
    $this->object->set_mimeType($mimeType);
    $this->object->set_registeredID($registeredID);
    $this->object->set_registrationAuthority($registrationAuthority);
    $this->object->set_repID($repID);
    $this->object->set_size($size);
    $this->object->set_combinationName($combinationName);
    
    $byteStream1 = new ByteStream();
    $byteStream2 = new ByteStream();
    $this->object->add_bytstream($byteStream1);
    $this->object->add_bytstream($byteStream2);
    
    $this->assertEqualXMLStructure($expectedElement, $dom->importNode($this->object->get_as_DOM(), TRUE), TRUE);
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingID() {
    $this->object->get_as_DOM();
  }
  
  /**
   * @expectedException InvalidArgumentException
   */
  public function testInvalidCombinationMethod() {
    $this->object->set_id('doID');
    $this->object->set_combinationName('INVALID');
    $this->object->get_as_DOM();
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingByteStreams() {
    $this->object->set_id('doID');
    $this->object->get_as_DOM();
  }
}

?>
