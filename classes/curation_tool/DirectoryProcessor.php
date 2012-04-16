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
   *  Root directory for the data, or the data file itself.
   * @var type 
   */
  protected $root;
  
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

      $this->settings = $settings;
      
      if($settings->root != '') {
        $this->set_root($path);
      }

    $this->exclude = array('.', '..', 'meta');
  }

  /**
   * Sets the root directory to the data set.
   *
   * @param <string> $path Path to the root directory for the data set
   */
  public function set_root($path) {
    if(file_exists($path)) {
      $this->root = $path;
    }
    else {
      $message = 'Unable to find the path "'.$path.'". Check the path exists and try again.';
      throw new PathNotFoundException($message, E_WARNING);
    }
    return $this;
  }

  /**
   *
   * @return <string>
   */
  public function get_root() {
    return $this->root;
  }

  /**
   * Starts processing the data directory by ensuring the file or directory exists
   * and if it is a bare file enclosing it in a directory. 
   */
  public function process_dataset() {
//    $this->oldcwd = getcwd();

    if($this->root == '') {
      throw new PathNotFoundException('No path has been specified', E_ERROR);
    }

    // If it's a bare file, moves the file into a same named directory.
    // This provides a consistent structure across all data sets.
    if(is_file($this->root)) {
      // Get the required info from the file
      $pathInfo = pathinfo($this->root);
      $fileName = basename($this->root, $pathInfo['extension']);

      mkdir($pathInfo['dirname'].DIRECTORY_SEPARATOR.$fileName);                // make the new directory
      rename($this->root, $pathInfo['dirname'].                                 // Move the file into the new directory
                                     DIRECTORY_SEPARATOR.$fileName.
                                     DIRECTORY_SEPARATOR.$pathInfo['basename']);

      $this->root = $pathInfo['dirname'].DIRECTORY_SEPARATOR.$pathInfo['filename']; // Set root to the directory not file
    }

    $this->process_path($this->root);                                           // Start processing the data.
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
    
    // Create the xfdu package for this directory.
    $settings = new XFDUSetup();
    $settings->root = $path;
    $package = new XFDUPackage($settings);

    $contents = scandir($path);
    $contents = array_diff($contents, $this->exclude);
    
    //Used to create paths
    $parsedPath = explode('/', $path);
    
    
    
    

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
