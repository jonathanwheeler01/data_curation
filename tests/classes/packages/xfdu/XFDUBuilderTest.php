<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for XFDUBuilder.
 * Generated by PHPUnit on 2012-04-04 at 21:30:31.
 */
class XFDUBuilderTest extends PHPUnit_Framework_TestCase {

  /**
   * @var XFDUBuilder
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new XFDUBuilder;
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
  public function testBuild_xfdu() {
    $settings = new XFDUSetup();
    $xfdu = new XFDU();
    $xfdu = $this->object->build_xfdu($settings);
    
    $this->assertTrue($xfdu->isset_packageHeader());
    $packageHeader = $xfdu->get_packageHeader();
    $this->assertTrue($packageHeader->isset_volumeInfo());
    $volumeInfo = $packageHeader->get_volumeInfo();
    $this->assertTrue($volumeInfo->isset_specificationVersion());
    $this->assertEquals('1.0', $volumeInfo->get_specificationVersion());
  }
  
  /**
   * 
   */
  public function testBuild_xfduWithSequence() {
    $settings = new XFDUSetup();
    $settings->sequenceSize = 3;
    $settings->sequencePosition = 2;
    $settings->sequenceInfoText = '2 of 3';
    $xfdu = new XFDU();
    $xfdu = $this->object->build_xfdu($settings);
    
    $this->assertEquals(
            $settings->sequenceSize,
            $xfdu->get_packageHeader()->get_volumeInfo()->get_sequenceInformation()->get_sequenceSize()
            );
    
    
    $this->assertEquals(
            $settings->sequencePosition,
            $xfdu->get_packageHeader()->get_volumeInfo()->get_sequenceInformation()->get_sequencePosition()
            );
    
    $this->assertEquals(
            $settings->sequenceInfoText, 
            $xfdu->get_packageHeader()->get_volumeInfo()->get_sequenceInformation()->get_value());
  }
  
  /**
   * 
   */
  public function testBuild_xfduWithExtension() {
    
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->appendChild($root = $dom->createElement('root'));
    $root->appendChild($dom->createElement('child1'));
    $root->appendChild($dom->createElement('child1'));
    $root->appendChild($dom->createElement('child1'));
    
    $settings = new XFDUSetup();
    $settings->extension = $dom->saveXML($root);
    $settings->extensionNamespace = 'example.com';
    
    $this->object->build_xfdu($settings);
  }
  
  /**
   * 
   */
  public function testBuild_xfduWithXMLData() {
    
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->appendChild($root = $dom->createElement('root'));
    $root->appendChild($dom->createElement('child1'));
    $root->appendChild($dom->createElement('child1'));
    $root->appendChild($dom->createElement('child1'));
    
    $settings = new XFDUSetup();
    $settings->xmlData = $dom->saveXML($root);
    
    $this->object->build_xfdu($settings);
  }
  
  /**
   * 
   */
  public function testBuild_XFDUPointerURL() {
    $locatorType = 'URL';
    $href = 'example.com';
    $id = 'id1';
    $textInfo = 'textInfo';
    
    $xfduPointer = new XFDUPointer();
    $xfduPointer = $this->object->build_XFDUPointer($locatorType, $href, $textInfo, NULL, $id);
//    $xfduPointer = $this->object->build_XDFUPointer($locatorType, $href, $textInfo, NULL, $id);
    
    $this->assertEquals($locatorType, $xfduPointer->get_locatorType());
    $this->assertEquals($href, $xfduPointer->get_href());
    $this->assertEquals($id, $xfduPointer->get_id());
    $this->assertEquals($textInfo, $xfduPointer->get_textInfo());
  }
  
  /**
   * @expectedException InvalidArgumentException
   */
  public function testBuild_XFDUPointerInvalidLocatorType() {
    $locatorType = 'INVALID';
    $href = 'example.com';
    $id = 'id1';
    $textInfo = 'textInfo';
    
    $xfduPointer = new XFDUPointer();
    $xfduPointer = $this->object->build_XFDUPointer($locatorType, $href, $textInfo, NULL, $id);
  }
  
  /**
   * 
   */
  public function testBuild_XFDUPointerOTHER() {
    $locatorType = 'OTHER';
    $locator = 'example.com';
    $otherLocatorType = 'badone';
    $id = 'id1';
    $textInfo = 'textInfo';
    
    $xfduPointer = new XFDUPointer();
    $xfduPointer = $this->object->build_XFDUPointer($locatorType, $locator, $textInfo, $otherLocatorType, $id);
    
    $this->assertEquals($locatorType, $xfduPointer->get_locatorType());
    $this->assertEquals($locator, $xfduPointer->get_locator());
    $this->assertEquals($id, $xfduPointer->get_id());
    $this->assertEquals($textInfo, $xfduPointer->get_textInfo());
    $this->assertEquals($otherLocatorType, $xfduPointer->get_otherLocatorType());
  }
  
  
  /**
   * @expectedException InvalidArgumentException
   */
  public function testBuild_XFDUPointerOTHERMissingType() {
    $locatorType = 'OTHER';
    $locator = 'example.com';
    $id = 'id1';
    $textInfo = 'textInfo';
    
    $xfduPointer = new XFDUPointer();
    $xfduPointer = $this->object->build_XFDUPointer($locatorType, $locator, $textInfo, NULL, $id);
  }
  
  /**
   * 
   */
  public function testBuild_ContentUnitXFDUPointer() {
    $content = new XFDUPointer();
    $id = 'id';
    $textInfo = 'textInfo';
    $unitType = 'unitType';
    
    $contentUnit = $this->object->build_contentUnit($content, $id, $unitType, $textInfo);
    
    $this->assertEquals(get_class($content), get_class($contentUnit->get_XFDUPointer()));
    $this->assertEquals($id, $contentUnit->get_id());
    $this->assertEquals($textInfo, $contentUnit->get_textInfo());
    $this->assertEquals($unitType, $contentUnit->get_unitType());
  }
  
  
  /**
   * 
   */
  public function testBuild_ContentUnitDataObjectPointer() {
    $content = new DataObjectPointer();
    $id = NULL;
    $unitType = 'unitType';
    
    $contentUnit = $this->object->build_contentUnit($content, $id, $unitType);
    
    $this->assertEquals(get_class($content), get_class($contentUnit->get_dataObjectPointer()));
    $this->assertNull($contentUnit->get_id());
    $this->assertEquals($unitType, $contentUnit->get_unitType());
    $this->assertNULL($contentUnit->get_textInfo());
  }
  
  /**
   * 
   */
  public function testBuild_ContentUnitNoContent() {
    $content = NULL;
    $id = NULL;
    $unitType = 'unitType';
    
    $contentUnit = $this->object->build_contentUnit($content, $id, $unitType);
    
    $this->assertNull($contentUnit->get_dataObjectPointer());
    $this->assertNull($contentUnit->get_XFDUPointer());
    $this->assertNull($contentUnit->get_id());
    $this->assertEquals($unitType, $contentUnit->get_unitType());
    $this->assertNULL($contentUnit->get_textInfo());
  }
  
  /**
   *@expectedException InvalidArgumentException 
   */
  public function testBuild_ContentUnitInvalidContent() {
    $content = new XFDU();
    
    $this->object->build_contentUnit($content);
  }
  
  public function testBuild_byteStream_from_fileLocation() {
    $fileLocation = new FileLocation();
    
    $file = 'test.txt';
    $id = 'id';
    touch($file);
    
    $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    
    $byteStream = $this->object->build_byteStream_from_fileLocation($fileLocation, $file, $id);
    
    $this->assertEquals(0, $byteStream->get_size());
    $this->assertEquals($fileInfo->file($file), $byteStream->get_mimeType());
    $this->assertEquals(sha1_file($file), $byteStream->get_checksum()->get_value());
  }
  
}

?>
