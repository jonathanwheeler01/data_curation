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

}

?>