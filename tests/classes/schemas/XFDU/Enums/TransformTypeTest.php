<?php

require_once dirname(__FILE__) . '/../../../../../classes/schemas/XFDU/Enums/TransformType.php';

/**
 * Test class for TransformType.
 * Generated by PHPUnit on 2011-11-10 at 06:18:06.
 */
class TransformTypeTest extends PHPUnit_Framework_TestCase {

  /**
   * @var TransformType
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->object = new TransformType;
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    
  }
  
  public function testTransformType() {
    $this->assertNotEmpty($this->object->values());
    
    $type = 'COMPRESSION';
    $this->assertEquals($type, $this->object->value_of($type));
    $type = 'AUTHENTICATION';
    $this->assertEquals($type, $this->object->value_of($type));
    
    $value = 'ENCRYPTION';
    $this->assertTrue($this->object->has_value($type));
    $this->assertFalse($this->object->has_value('invalid'));
  }

}

?>
