<?php
/**
 * Description of Processes a data directy inserting a meta directory into each 
 * folder and creating xfdu files for each directory.
 *
 *
 * @author Rob Olendorf
 * 
 */


class DirectoryProcessor {
  
  /**
   *
   * @var XFDUBuilder 
   */
  protected $builder;
  
  /**
   * Settings for directory processing. This includes any extension, volume info
   * or metadata to be included across all objects.This would typically include
   * dublin core descriptive metadata.
   * @var XFDUSetup
   */
  protected $settings;
  
  /**
   * Files to exclude. This is not implemented yet.
   * @todo Impliment exclusion - should allow exclusion based on file type file name or partial file names. Most likely a dynamic implementation of regular expresssions.
   * @var type 
   */
  protected $exclude;     

  public function  __construct(XFDUSetup $settings) {
    $this->builder = new XFDUBuilder();
    
    $this->settings = $settings;

    $this->exclude = array('.', '..', 'meta');
    
    
  }

  /**
   *
   * @return <string>
   */
  public function get_root() {
    return $this->settings->root;
  }

  /**
   * Starts processing the data directory by ensuring the file or directory exists
   * and if it is a bare file enclosing it in a directory. 
   */
  public function process_dataset() {
//    $this->oldcwd = getcwd();

    /**
     *@todo test file or diretory exists. 
     */
    if($this->settings->root == '') {
      throw new PathNotFoundException('No path has been specified', E_ERROR);
    }

    // If it's a bare file, moves the file into a same named directory.
    // This provides a consistent structure across all data sets.
    if(is_file($this->settings->root)) {
      // Get the required info from the file
      $pathInfo = pathinfo($this->settings->root);
      $fileName = basename($this->settings->root, $pathInfo['extension']);

      mkdir($pathInfo['dirname'].DIRECTORY_SEPARATOR.$fileName);                // make the new directory
      rename($this->settings->root, $pathInfo['dirname'].                                 // Move the file into the new directory
                                     DIRECTORY_SEPARATOR.$fileName.
                                     DIRECTORY_SEPARATOR.$pathInfo['basename']);

      $this->settings->root = $pathInfo['dirname'].DIRECTORY_SEPARATOR.$pathInfo['filename']; // Set root to the directory not file
    }

    $this->process_path($$this->settings->root);                                           // Start processing the data.
  }

  /**
   * Processes a path. The function calls itself recursively to work
   * through the directory structure.
   * 
   * @param <string> $path
   */
  protected function process_path($path) {
    // Each directory gets meta directory.
    if(!file_exists($path.'/meta')) {
      mkdir($path.'/meta');
    }
      
    $package = new XFDUPackage($settings);
    
    if($path != $this->settings->root) {
      $parsedPath = explode('/', $path);
      
      $xfduPointer = new XFDUPointer();
      $xfduPointer->set_locatorType('URL');
      $xfduPointer->set_href('../meta/'.$parsedPath[sizeof($parsedPath) - 2].'_xfdu.xml');
      $xfduPointer->set_textInfo($parsedPath[sizeof($parsedPath) - 2]);
      
      $backLink = $this->
                   builder->
                    build_contentUnit($xfduPointer, 
                                       'backlink', 
                                        'backlink', 
                                        $parsedPath[sizeof($parsedPath) - 2]);
      $package->add($backLink);
    }

    $contents = scandir($path);
    $contents = array_diff($contents, $this->exclude);

    foreach($contents as $item) {
      if(is_file($path.DIRECTORY_SEPARATOR.$item)) {
        $this->handle_file($path.DIRECTORY_SEPARATOR.$item);
      }
      else if(is_dir($path.DIRECTORY_SEPARATOR.$item)) {
        $this->handle_directory($path.DIRECTORY_SEPARATOR.$item);
        $this->process_path($path.DIRECTORY_SEPARATOR.$item);                   // Recursive call
      }
    }
  }

  /**
   * @todo Implement handle file function
   * @param <string> $path
   */
  protected function handle_file($path) {
    print 'handling file '.$path;
  }

  /**
   * @todo Implement handle directory function
   * @param <type> $path
   */
  protected function handle_directory($path) {
    if(!is_dir($path.DIRECTORY_SEPARATOR.'meta')) {
      mkdir($path.DIRECTORY_SEPARATOR.'meta');
    }
  }
}
?>