<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for InformationPackageMap.
 * Generated by PHPUnit on 2011-11-04 at 16:55:58.
 */
class InformationPackageMapTest extends PHPUnit_Framework_TestCase {

  /**
   * @var InformationPackageMap
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new InformationPackageMap;
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {

  }

  /**
   * Tests setters, getters and isset methods
   */
  public function testID() {
    $this->assertFalse($this->object->isset_id());

    $id = 'test';
    $this->object->set_id($id);
    $this->assertEquals($id, $this->object->get_id());
    $this->assertTrue($this->object->isset_id());
  }

  /**
   * Tests setters, getters and isset methods
   */
  public function testPackageType() {
    $this->assertFalse($this->object->isset_packageType());

    $packageType = 'test';
    $this->object->set_packageType($packageType);
    $this->assertTrue($this->object->isset_packageType());
    $this->assertEquals($packageType, $this->object->get_packageType());
  }

  /**
   * Tests setters, getters and isset methods
   */
  public function testTextInfo() {
    $this->assertFalse($this->object->isset_textInfo());

    $textInfo = 'test';
    $this->object->set_textInfo($textInfo);
    $this->assertTrue($this->object->isset_textInfo());
    $this->assertEquals($textInfo, $this->object->get_textInfo());
  }

   /**
   * Tests setters, getters and isset methods
   */
  public function testAabstractContentUnit() {
    $this->assertFalse($this->object->isset_abstractContentUnit());
    $this->assertEmpty($this->object->get_abstractContentUnit());
  }
}

?>
