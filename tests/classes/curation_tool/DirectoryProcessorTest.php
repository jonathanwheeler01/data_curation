<?php

require_once dirname(__FILE__) . '/../../../classes/curation_tool/DirectoryProcessor.php';
require_once '/../../../curation_tool.inc';

/**
 * Test class for DirectoryProcessor.
 * Generated by PHPUnit on 2012-03-19 at 17:12:49.
 * 
 */
class DirectoryProcessorTest extends PHPUnit_Framework_TestCase {

  /**
   * @var DirectoryProcessor
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $this->create_test_directory();
    $settings = new XFDUSetup();
    $settings->root = '/investigator/project';
    $this->object = new DirectoryProcessor($settings);
  }
  
  /**
   * creates a director system for testing. 
   */
  protected function create_test_directory() {
        
    // check the operating system to handle permissions correctly
    if(preg_match('/windows/i', php_uname('s'))) {
      $perms = 0;
    }
    else {
      $perms = 0755;
    }
    
    $currentDirectory = '/investigator/project/';
    mkdir($currentDirectory, $perms, TRUE);
    touch($currentDirectory.'data1.txt');
    touch($currentDirectory.'data2.csv');
    
    $dir1 = $currentDirectory.'images/';
    mkdir($dir1, $perms, TRUE);
    touch($dir1.'image1.png');
    touch($dir1.'image2.jpg');
    touch($dir1.'image3.gif');
    touch($dir1.'image4.tif');    
    
    $dir2 = $currentDirectory.'filetypes/';
    mkdir($dir2, $perms, TRUE);
    touch($dir2.'matlab.m');
    touch($dir2.'powerpoint.pptx');
    touch($dir2.'word.docx');
    touch($dir2.'xcel.xls');
    
    }
  
  protected function makeFile($filename, $contents) {
    $handle = fopen($filename, 'w');
    fwrite($handle, $contents);
    fclose($handle);
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {    
    $this->remove_test_directory();
  }
  
  /**
   * Remove the test directory.
   */
  protected function remove_test_directory() {
    
    // test the operating system to excecute the correct shell command
    if(preg_match('/windows/i', php_uname('s'))) {
      exec('rmdir "/investigator" /s /q');
    }
    else {
      exec('rm -r /investigator');
    }
  }
  
  /**
   * 
   */
  public function testRoot() {
    $path = '/investigator/project';
   
    $this->assertEquals($path, $this->object->get_root());
  }
  
  /**
   * @expectedException PathNotFoundException
   */
  public function testInvalidRoot() {
    $path = '/path1/path2';
    $settings = new XFDUSetup();
    $settings->root = $path;
    
    $this->object = new DirectoryProcessor($settings);
    
    $this->object->process_dataset();
  }
  
  /**
   * 
   */
  public function testProcessDataSet() {    
    $path = '/investigator/project';
    $this->object->process_dataset();
    
    $this->assertTrue(is_dir($path.DIRECTORY_SEPARATOR.'meta'));
    $this->assertTrue(is_dir($path.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'meta'));
    
    $this->assertFileExists('/investigator/project/meta/project_xfdu.xml');
    $this->assertFileExists('/investigator/project/images/meta/images_xfdu.xml');
  }
  
  public function testProcessDataSetBareFile() {
    $this->remove_test_directory();
    mkdir('/investigator');
    touch('/investigator/data.txt');
    
    $settings = new XFDUSetup();
    $settings->root = '/investigator/data.txt';
    $this->object = new DirectoryProcessor($settings);
    
    $this->object->process_dataset();
    
    $this->assertTrue(is_dir('/investigator/data'));
    $this->assertTrue(is_file('/investigator/data/data.txt'));
    $this->assertTrue(is_dir('/investigator/data/meta'));
  }
}

?>