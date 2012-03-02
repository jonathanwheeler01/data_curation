<?php

//require_once dirname(__FILE__) . '/../../../classes/curation_tool/DirectoryProcessor.php';
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Test class for DirectoryProcessor.
 * Generated by PHPUnit on 2012-03-02 at 20:21:40.
 */
class DirectoryProcessorTest extends PHPUnit_Framework_TestCase {

  /**
   * @var DirectoryProcessor
   */
  protected $object;
  
  protected function makeFile($filename, $contents) {
    $handle = fopen($filename, 'w');
    fwrite($handle, $contents);
    fclose($handle);
  }

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed. I found the mock directory 
   * structure extremely cumbersome, so i just create and tear down one.
   */
  protected function setUp() {
    $this->object = new DirectoryProcessor;
    
    // Create the directory structure
    $directory = 'testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_1';
    mkdir($directory, 0, TRUE);
    $directory = 'testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_2';
    mkdir($directory, 0, TRUE);
    $directory = 'testproj'.DIRECTORY_SEPARATOR.'datadir2';
    mkdir($directory, 0, TRUE);
           
    // add files
    $this->makeFile('barefile.txt', 'this is a bare file');
    
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'file1.txt', 'this is file 1');
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'file1.png', 'this is file 2');
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'file1.csv', 'this is file 3');
    
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_1'.DIRECTORY_SEPARATOR.'file1_1_1.txt', 'this is file 1 1 1');
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_1'.DIRECTORY_SEPARATOR.'file1_1_2.png', 'this is file 1 1 2');
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_1'.DIRECTORY_SEPARATOR.'file1_1_3.xsl', 'this is file 1 1 3');
    
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir1'.DIRECTORY_SEPARATOR.'datadir1_2'.DIRECTORY_SEPARATOR.'file1_2_1.txt', 'this is file 1 2 1');
    
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir2'.DIRECTORY_SEPARATOR.'file2_1.txt', 'this is file 2 1');
    $this->makeFile('testproj'.DIRECTORY_SEPARATOR.'datadir2'.DIRECTORY_SEPARATOR.'file2_2.txt', 'this is file 2 2');
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    // remove the directory structure and files
    exec('rmdir /s /q testproj');
    if(file_exists('barefile.txt')) {
      exec('DEL /q barefile.txt');
    }
    if(file_exists('barefile')) {
      exec('rmdir /s /q barefile');
    }
  }
  /**
   * Quick check that set and get for root works.
   */
  public function testRoot() {
    $root = 'testproj';
    $this->object->set_root($root);
    $this->assertEquals($root, $this->object->get_root());
  }
  
  /**
   * @expectedException PathNotFoundException
   */
  public function testInvalidRoot() {
    $root = 'invalidRoot';
    $this->object->set_root($root);
  }
  
  /**
   * Test exception is thrown if now path is specified.
   * @expectedException PathNotFoundException
   */
  public function testNoPath() {
    $this->object->process_dataset();
  }

  /**
   * 
   */
  public function testProcess_datasetBareFile() {
    $this->object->set_root('barefile.txt');
    $this->object->process_dataset();
    
    $this->assertFileExists('barefile'.DIRECTORY_SEPARATOR.'barefile.txt');
    $this->assertTrue(file_exists('barefile'.DIRECTORY_SEPARATOR.'meta'));
  }
  
  /**
   * 
   */
  public function testProcess_datasetDeepStructure() {
    $this->object->set_root('testproj');
    $this->object->process_dataset();
    
    $this->assertFileExists('testproj'.DIRECTORY_SEPARATOR.'meta');
    $this->assertFileExists('testproj'.DIRECTORY_SEPARATOR.
                            'datadir2'.DIRECTORY_SEPARATOR.'meta');
    $this->assertFileExists('testproj'.DIRECTORY_SEPARATOR.
                            'datadir1'.DIRECTORY_SEPARATOR.
                            'datadir1_2'.DIRECTORY_SEPARATOR.'meta');
  }
  
  /**
   * 
   */
  public function testPopulatedConstructor() {
    $root = 'testproj';
    $object = new DirectoryProcessor($root);
    $this->assertEquals($root, $object->get_root());
  }

}

?>
