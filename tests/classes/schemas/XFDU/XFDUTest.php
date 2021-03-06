<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for XFDU.
 * Generated by PHPUnit on 2011-11-04 at 17:35:47.
 */
class XFDUTest extends PHPUnit_Framework_TestCase {

  /**
   * @var XFDU
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new XFDU;
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
  public function testID() {
    $this->assertFalse($this->object->isset_id());

    $id = 'test';
    $this->object->set_id($id);
    $this->assertTrue($this->object->isset_id());
    $this->assertEquals($id, $this->object->get_id());
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
  public function testObjID() {
    $this->assertFalse($this->object->isset_objID());

    $objID = 'test';
    $this->object->set_objID($objID);
    $this->assertTrue($this->object->isset_objID());
    $this->assertEquals($objID , $this->object->get_objID());
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

//  /**
//   * 
//   */
//  public function testVersion() {
//    $this->assertTrue($this->object->isset_version());
//    $this->assertEquals(1.0, $this->object->get_version());
//
//    $version = 2.0;
//    $this->object->set_version($version);
//    $this->assertEquals($version, $this->object->get_version());
//  }

  /**
   * 
   */
  public function testPackageHeader() {
    $this->assertFalse($this->object->isset_packageHeader());

    $packageHeader = new PackageHeader();
    $this->object->set_packageHeader($packageHeader);
    $this->assertTrue($this->object->isset_packageHeader());
    $this->assertEquals('PackageHeader', get_class($this->object->get_packageHeader()));
  }

  /**
   * 
   */
  public function testInformationPackageMap() {
    $this->assertFalse($this->object->isset_informationPackageMap());

    $informationPackageMap = new InformationPackageMap();
    $this->object->set_informationPackageMap($informationPackageMap);
    $this->assertTrue($this->object->isset_informationPackageMap());
    $this->assertEquals('InformationPackageMap', get_class($this->object->get_informationPackageMap()));
  }
  
  /**
   * 
   */
  public function testMetadataSection() {
    $this->assertFalse($this->object->isset_metadataSection());

    $value = new MetaDataSection();
    $this->object->set_metadataSection($value);
    $this->assertTrue($this->object->isset_metadataSection());
    $this->assertEquals(get_class($value), get_class($this->object->get_metadataSection()));
  }
  
  /**
   * 
   */
  public function testDataObjectSection() {
    $this->assertFalse($this->object->isset_dataObjectSection());

    $value = new DataObjectSection();
    $this->object->set_dataObjectSection($value);
    $this->assertTrue($this->object->isset_dataObjectSection());
    $this->assertEquals(get_class($value), get_class($this->object->get_dataObjectSection()));
  }
  
  /**
   * 
   */
  public function testBehaviorSection() {
    $this->assertFalse($this->object->isset_behaviorSection());

    $value = new BehaviorSection();
    $this->object->set_behaviorSection($value);
    $this->assertTrue($this->object->isset_behaviorSection());
    $this->assertEquals(get_class($value), get_class($this->object->get_behaviorSection()));
  }
  
  /**
   * A really long test, that probably violates a lot of the rules of unit
   * testing, but ends up being a pretty good test of the overall 
   * document structure.
   */
  public function testDefault_get_as_DOM() {
    // Set the various parameters that will be needed.
    $id = 'test';
    $sequenceSize = 2;
    $sequencePosition = 1;
    $value = 'test';
    
    $dom = new DOMDocument('1.0', 'UTF-8');                                     // create the dom document
    
    //
    // BUILD THE EXPECTED DOCUMENT
    //
    
    // Child of volumeInfo
    $expectedSpecificationVersion = $dom->createElement('specificationVersion');
    $expectedSpecificationVersion->appendChild($dom->createTextNode('1.0'));
    
    // Child of volumeInfo
    $expectedSequenceInformation = $dom->createElement('sequenceInformation');
    $expectedSequenceInformation->setAttribute('sequencePosition', $sequencePosition);
    $expectedSequenceInformation->setAttribute('sequenceSize', $sequenceSize);
    $expectedSequenceInformation->appendChild($dom->createTextNode($value));
    
    // Child of environmentInfo
    $expectedXmlData = $dom->createElement('xmlData');
    $expectedXmlData->appendChild($dom->createElement('stuff'));
    
    // Child of packageHeader
    $expectedEnvironmentInfo = $dom->createElement('environmentInfo');
    $expectedEnvironmentInfo->appendChild($expectedXmlData);
    
    // Child of packageHeader
    $expectedVolumeInfo = $dom->createElement('volumeInfo');
    $expectedVolumeInfo->appendChild($expectedSpecificationVersion);
    $expectedVolumeInfo->appendChild($expectedSequenceInformation);
    
    // Child of xfdu
    $expectedPackageHeader = $dom->createElement('packageHeader');
    $expectedPackageHeader->setAttribute('ID', $id);
    $expectedPackageHeader->appendChild($expectedVolumeInfo);
    $expectedPackageHeader->appendChild($expectedEnvironmentInfo);
    
    // Child of xfdu
    $expectedInformationPackageMap = $dom->createElement('informationPackageMap');
    $expectedInformationPackageMap->appendChild($dom->createElement('xfdu:contentUnit'));
    
    // Child of xfdu
    $expectedMetadataSection = $dom->createElement('metadataSection');
    
    // Child of dataObject
    $expectedByteStream = $dom->createElement('byteStream');
    
    // Child of dataObjectSection
    $expectedDataObject = $dom->createElement('dataObject');
    $expectedDataObject->setAttribute('ID', $id);
    $expectedDataObject->appendChild($expectedByteStream);
    
    // Child of xfdu
    $expectedDataObjectSection = $dom->createElement('dataObjectSection');
    $expectedDataObjectSection->appendChild($expectedDataObject);
    
    // Child of xfdu
    $expectedBehaviorSection = $dom->createElement('behaviorSection');
    
    // Root xfdu element
    $expectedElement = $dom->createElement('xfdu:XFDU');
    $expectedElement->setAttribute('xmlns:xfdu', 'urn:ccsds:schema:xfdu:1');
    $expectedElement->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
    $expectedElement->setAttribute('xsi:schemaLocation', 'urn:ccsds:schema:xfdu:1 http://sindbad.gsfc.nasa.gov/xfdu/xsd-src/xfdu.xsd');
    $expectedElement->appendChild($expectedPackageHeader);
    $expectedElement->appendChild($expectedInformationPackageMap);
    $expectedElement->appendChild($expectedMetadataSection);
    $expectedElement->appendChild($expectedDataObjectSection);
    $expectedElement->appendChild($expectedBehaviorSection);
    
    //
    // BUILD THE ACTUAL DOCUMENT
    //
    //
    // Child of volumeInfo
    $specificationVersion = $dom->createElement('specificationVersion');
    $specificationVersion->appendChild($dom->createTextNode('1.0'));
    
    // Child of volumeInfo
    $sequenceInformation = new SequenceInformation();
    $sequenceInformation->set_sequencePosition($sequencePosition);
    $sequenceInformation->set_sequenceSize($sequenceSize);
    $sequenceInformation->set_value($value);
    
    // Child of packageHeader
    $volumeInfo = new VolumeInfo();
    $volumeInfo->set_sequenceInformation($sequenceInformation);
    
    //Child of environmentInfo
    $xmlData = new XMLData();
    $xmlData->set_any($dom->createElement('stuff'));
    
    //Child of packageHeader
    $environmentInfo = new EnvironmentInfo();
    $environmentInfo->set_xmlData($xmlData);
    
    // Child of XFDU
    $packageHeader = new PackageHeader();                                       
    $packageHeader->set_id($value);
    $packageHeader->set_volumeInfo($volumeInfo);
    $packageHeader->set_environmentInfo($environmentInfo);
    
    // Child of informationPackageMap
    $contentUnit = new ContentUnit();
    
    // Child of XFDU
    $informatinPackageMap = new InformationPackageMap;
    $informatinPackageMap->add_contentUnit($contentUnit);
    
    //Child of dataObject
    $bytestream = new ByteStream();
    
    // Child of dataObjectSection
    $dataObject = new DataObject();
    $dataObject->set_id($id);
    $dataObject->add_bytstream($bytestream);
    
    // Child of XFDU
    $dataObjectSection = new DataObjectSection();
    $dataObjectSection->add_dataObject($dataObject);
    
    // Root element (XFDU)
    $this->object->set_packageHeader($packageHeader);
    $this->object->set_informationPackageMap($informatinPackageMap);
    $this->object->set_metadataSection(new MetadataSection());
    $this->object->set_dataObjectSection($dataObjectSection);
    $this->object->set_behaviorSection(new BehaviorSection());
    
    $dom->appendChild( $dom->importNode($this->object->get_as_DOM(), TRUE) );
    
    $this->assertEqualXMLStructure($expectedElement, $dom->importNode($this->object->get_as_DOM(), TRUE), TRUE);
    
//    $this->assertXmlStringEqualsXmlFile(__DIR__.'/files/xfdu-xfdu-test.xml', $dom->saveXML());
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingPackageHeader() {
    $this->object->set_packageHeader(new PackageHeader());
    $this->object->get_as_DOM();
  }
  
  /**
   * @expectedException RequiredElementException
   */
  public function testMissingInformationPackageMap() {
    $this->object->get_as_DOM();
  }
}

?>
