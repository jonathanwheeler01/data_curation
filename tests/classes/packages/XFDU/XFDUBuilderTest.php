<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for XFDUBuilder.
 * Generated by PHPUnit on 2011-11-14 at 18:52:00.
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
  public function testBuild_XFDU() {
    $packageHeader = new PackageHeader();
    $informationPackageMap = new InformationPackageMap();
    $metadataSection = new MetadataSection();
    $dataObjectSection = new DataObjectSection();
    $behaviorSection = new BehaviorSection();
    
    $xfdu = new XFDU();
    
    $xfdu = $this->object->build_XFDU($packageHeader, $informationPackageMap, $metadataSection, $dataObjectSection, $behaviorSection);
    $this->assertTrue($xfdu->isset_packageHeader());
    $this->assertTrue($xfdu->isset_informationPackageMap());
    $this->assertTrue($xfdu->isset_metadataSection());
    $this->assertTrue($xfdu->isset_dataObjectSection());
    $this->assertTrue($xfdu->isset_behaviorSection());
    
    
    $xfdu = $this->object->build_XFDU($packageHeader, $informationPackageMap, $metadataSection, $dataObjectSection);
    $this->assertTrue($xfdu->isset_packageHeader());
    $this->assertTrue($xfdu->isset_informationPackageMap());
    $this->assertTrue($xfdu->isset_metadataSection());
    $this->assertTrue($xfdu->isset_dataObjectSection());
    $this->assertFalse($xfdu->isset_behaviorSection());
    
    
    $xfdu = $this->object->build_XFDU($packageHeader, $informationPackageMap, $metadataSection);
    $this->assertTrue($xfdu->isset_packageHeader());
    $this->assertTrue($xfdu->isset_informationPackageMap());
    $this->assertTrue($xfdu->isset_metadataSection());
    $this->assertFalse($xfdu->isset_dataObjectSection());
    $this->assertFalse($xfdu->isset_behaviorSection());
    
    
    $xfdu = $this->object->build_XFDU($packageHeader, $informationPackageMap);
    $this->assertTrue($xfdu->isset_packageHeader());
    $this->assertTrue($xfdu->isset_informationPackageMap());
    $this->assertFalse($xfdu->isset_metadataSection());
    $this->assertFalse($xfdu->isset_dataObjectSection());
    $this->assertFalse($xfdu->isset_behaviorSection());
  }
  
  /**
   * 
   */
  public function testBuild_packageHeader() {
    $packageHeader = new PackageHeader();
    
    $id = 'id';
    $volumeInfo = new VolumeInfo();
    $environmentInfo = new EnvironmentInfo();
    
    $packageHeader = $this->object->build_packageHeader($id, $volumeInfo, $environmentInfo);
    $this->assertTrue($packageHeader->isset_id());
    $this->assertTrue($packageHeader->isset_volumeInfo());
    $this->assertTrue($packageHeader->isset_environmentInfo());
    
    $packageHeader = $this->object->build_packageHeader($id, $volumeInfo);
    $this->assertTrue($packageHeader->isset_id());
    $this->assertTrue($packageHeader->isset_volumeInfo());
    $this->assertFalse($packageHeader->isset_environmentInfo());
    
  }
  
  public function testBuild_informationPackageMap() {
    $contentUnitList = array(new ContentUnit(), new ContentUnit());
    
    $informationPackageMap = $this->object->build_InformationPackageMap($contentUnitList);
    $this->assertTrue($informationPackageMap->isset_contentUnits());
    $this->assertEquals(sizeof($contentUnitList), sizeof($informationPackageMap->get_ContentUnits()));
    $this->assertEquals('InformationPackageMap', get_class($informationPackageMap));
  }
  
  public function testBuild_volumeInfo() {
    $volumeInfo = new VolumeInfo();
    
    $version = 2.0;
    $sequenceInformation = new SequenceInformation();
    
    $volumeInfo = $this->object->build_volumeInfo($version, $sequenceInformation);
    $this->assertEquals($version, $volumeInfo->get_specificationVersion());
    $this->assertEquals(get_class($sequenceInformation), get_class($volumeInfo->get_sequenceInformation()));
    
    $volumeInfo = $this->object->build_volumeInfo($version);
    $this->assertEquals($version, $volumeInfo->get_specificationVersion());
    $this->assertFalse($volumeInfo->isset_sequenceInformation());
    
    $volumeInfo = $this->object->build_volumeInfo();
    $this->assertEquals(1.0, $volumeInfo->get_specificationVersion());
    $this->assertFalse($volumeInfo->isset_sequenceInformation());
    
  }

  /**
   * 
   */
  public function testBuild_sequenceInfo() {
    $sequencePosition = 2;
    $sequenceSize = 10;
    $value = 'test';
    
    $object = new SequenceInformation();
    $object = $this->object->build_SequenceInfo($sequencePosition, $sequenceSize, $value);
    $this->assertEquals('SequenceInformation', get_class($object));
    $this->assertEquals($sequencePosition, $object->get_sequencePosition());
    $this->assertEquals($sequenceSize, $object->get_sequenceSize());
    $this->assertEquals($value, $object->get_value());
  }
  
  /**
   * 
   */
  public function testBuild_environmentInfo() {
    $xmlData = new XMLData();
    $extension = 'test';
    
    $object = new EnvironmentInfo();
    $object = $this->object->build_environmentInfo($xmlData, $extension);
    $this->assertEquals(get_class($xmlData), get_class($object->get_xmlData()));
    $this->assertEquals($extension, $object->get_extension());
  }
  
  public function testBuild_XMLData() {
    $anyXML = 'test';
    
    $object = new XMLData();
    $object = $this->object->build_XMLData($anyXML);
    $this->assertEquals($anyXML, $object->get_any());
  }
}

?>