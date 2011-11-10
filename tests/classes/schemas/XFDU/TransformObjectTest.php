<?php

require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Test class for TransformObject.
 * Generated by PHPUnit on 2011-11-08 at 20:17:12.
 */
class TransformObjectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TransformObject
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TransformObject;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * 
     */
    public function testKeyDerivation()
    {
      $this->assertFalse($this->object->isset_keyDerivations());
      
      $value = new KeyDerivation();
      $this->object->add_keyDerivation($value);
      $this->object->add_keyDerivation($value);
      $objs = $this->object->get_keyDerivations();
      
      $this->assertTrue($this->object->isset_keyDerivations());
      $this->assertEquals(2, sizeof($objs));
      $this->assertEquals(get_class($value), get_class($objs[0]));
      
      $this->object->unset_keyDerivations();
      $this->assertFalse($this->object->isset_keyDerivations());
    }

    /**
     * 
     */
    public function testAlgorithm()
    {
      $this->assertFalse($this->object->isset_algorithm());
      
      $value = 'test';
      $this->object->set_algorithm($value);
      
      $this->assertTrue($this->object->isset_algorithm());
      $this->assertEquals($value, $this->object->get_algorithm());
    }    
    
    /**
     * 
     */
    public function testID()
    {
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
      $this->object->set_id('0bad');
    } 
    
    /**
     * 
     */
    public function testOrder()
    {
      $this->assertFalse($this->object->isset_order());
      
      $value = 'test';
      $this->object->set_order($value);
      
      $this->assertTrue($this->object->isset_order());
      $this->assertEquals($value, $this->object->get_order());
    }
    
    /**
     * 
     */
    public function testTransformType() {
      $this->assertFalse($this->object->isset_transformType());
      
      $value = 'AUTHENTICATION';
      $this->object->set_transformType($value);
      
      $this->assertTrue($this->object->isset_transformType());
      $this->assertEquals($value, $this->object->get_transformType());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidTransformType() {
      $this->object->set_transformType('invalid');
    }
}
?>
