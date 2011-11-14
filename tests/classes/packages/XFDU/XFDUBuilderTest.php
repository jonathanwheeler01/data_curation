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
  public function testBuildSequenceInfo() {
    $sequencePosition = 2;
    $sequenceSize = 10;
    $value = 'test';
    
    $object = new SequenceInformation();
    $object = $this->object->buildSequenceInfo($sequencePosition, $sequenceSize, $value);
    $this->assertEquals('SequenceInformation', get_class($object));
    $this->assertEquals($sequencePosition, $object->get_sequencePosition());
    $this->assertEquals($sequenceSize, $object->get_sequenceSize());
    $this->assertEquals($value, $object->get_value());
  }

  /**
   * @todo Implement testBuildVolumeInfo().
   */
  public function testBuildVolumeInfo() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testBuildPackageHeader().
   */
  public function testBuildPackageHeader() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

}

?>
