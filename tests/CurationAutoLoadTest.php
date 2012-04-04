<?php

require_once dirname(__FILE__) . '/../curation_tool.inc';

/**
 * Test class for CurationAutoLoad.
 * Generated by PHPUnit on 2011-10-25 at 19:06:53.
 */
class CurationAutoLoadTest extends PHPUnit_Framework_TestCase {

  /**
   * @var CurationAutoLoad
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new CurationAutoLoad;
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
  public function testAutoload() {
    $settings = new XFDUSetup();
    $ctool = new DirectoryProcessor($settings);
    $this->assertTrue(class_exists('DirectoryProcessor'), 'Autoload of CurationTool.');

    $xfdu = new XFDU();
    $this->assertTrue(class_exists('XFDU'), 'Autoload of XFDU.');


    $e= new PathNotFoundException('test', E_NOTICE);
    $this->assertTrue(class_exists('PathNotFoundException'), 'Autoload of PathNotFoundException.');

  }

  /**
   * @expectedException AutoloadException
   */
  public function testUnknownClassAutoload() {
    $class = new BadClass();
  }

}

?>
