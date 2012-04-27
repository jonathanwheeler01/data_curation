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
  
  /**
   * The number of content units created for the project.
   * @var integer 
   */
  protected $contentUnitCount;
  
  /**
   * The number of data objects in the data set.
   * @var integer 
   */
  protected $dataObjectCount;
  
  /**
   *
   * @param XFDUSetup $settings 
   */

  public function  __construct(XFDUSetup $settings) {
    $this->builder = new XFDUBuilder();
    
    $this->settings = $settings;

    $this->exclude = array('.', '..', 'meta');
    
    $this->contentUnitCount = 0;
    $this->dataObjectCount = 0;
    
    
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
    
    if(!is_file($this->settings->root) && !is_dir($this->settings->root)) {
      throw new PathNotFoundException($this->settings->root.' was not found.', E_ERROR);
    }

    // If it's a bare file, moves the file into a same named directory.
    // This provides a consistent structure across all data sets.
    if(is_file($this->settings->root)) {
      // Get the required info from the file
      $pathInfo = pathinfo($this->settings->root);
      $fileName = basename($this->settings->root, $pathInfo['extension']);

      mkdir($pathInfo['dirname'].DIRECTORY_SEPARATOR.$fileName);                // make the new directory
      rename($this->settings->root, $pathInfo['dirname'].                       // Move the file into the new directory
                                     DIRECTORY_SEPARATOR.$fileName.
                                     DIRECTORY_SEPARATOR.$pathInfo['basename']);

      $this->settings->root = $pathInfo['dirname'].'/'.$pathInfo['filename']; // Set root to the directory not file
    }

    $this->process_path($this->settings->root);                                           // Start processing the data.
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
    
    // Sets up the basic XFDU package
    $package = new XFDUPackage($this->settings);
    $parsedPath = explode('/', $path);
    
    // For all content units but the first, there should be a backlink to the
    // previous directory's XFDU file.
    if($path != $this->settings->root) {
      
      $xfduPointerBackLink = new XFDUPointer();
      $xfduPointerBackLink->set_locatorType('URL');
      $xfduPointerBackLink->set_href('../meta/'.$parsedPath[sizeof($parsedPath) - 2].'_xfdu.xml');
      $xfduPointerBackLink->set_textInfo($parsedPath[sizeof($parsedPath) - 2]);
      
      $backLinkCU = $this->
                   builder->
                    build_contentUnit($xfduPointerBackLink, 
                                       'backlink', 
                                        'backlink', 
                                        $parsedPath[sizeof($parsedPath) - 2]);
      $package->add($backLinkCU);
      
    }
    
    // Set the id for the current content unit to allow the child content units
    // to reference and create the current directory's contentUnit.
    $currentID = 'cu'.$this->contentUnitCount;
    $currentCU = $this->builder->build_contentUnit(NULL, 
                                                   $currentID, 
                                                   'directory', 
                                                   $parsedPath[sizeof($parsedPath) -1]);
    $package->add($currentCU);

    // Get the contents of the directory then
    $contents = scandir($path);
    $contents = array_diff($contents, $this->exclude);
    
    // If the content item is a file, create a content unit containing a 
    // data object pointer that refers to a dataObject within this xfdu document. 
    // If its a directory create a contentUnit containing an XFDUPointer that
    // refers to the appropriate xfdu document in another subdirectory.
    foreach($contents as $item) {
      $this->contentUnitCount++;  
      if(is_file($path.DIRECTORY_SEPARATOR.$item)) {        
        $this->handle_file($path, $item, $package, $currentID);
      }
      else if(is_dir($path.DIRECTORY_SEPARATOR.$item)) {
        $this->handle_directory($path.DIRECTORY_SEPARATOR.$item, $package);
        $this->process_path($path.'/'.$item);                   // Recursive call
      }
    }
    
    // Write the package.
    $package->write($path.'/meta/'.$parsedPath[sizeof($parsedPath) -1].'_xfdu.xml');
  }

/**
 *
 * @param string $path path to the directory containing the file
 * @param string $file file name
 * @param XFDUPackage $package the package passed by reference
 * @param string $parent ID of the parent contentUnit
 */
  protected function handle_file($path, $item, XFDUPackage &$package, $parent) {
        $dataObjectID = 'do'.$this->dataObjectCount;
        $contentUnitID = 'cu'.  $this->contentUnitCount;
        
        $fileLocation = new FileLocation();
        $fileLocation->set_locatorType('URL')
                ->set_href($path.'/'.$item)
                ->set_textInfo($item);
        
        $dataObject = new DataObject();
        $dataObject->add_bytstream(
                $this->builder->build_byteStream_from_fileLocation(
                        $fileLocation, 
                        $path.DIRECTORY_SEPARATOR.$item
                        )
                )
                ->set_id($dataObjectID);
        
        $package->add($dataObject);
        
        $dataObjectPointer = new DataObjectPointer();
        $dataObjectPointer->set_dataObjectID($dataObjectID);
        
        $contentUnit = $this->builder->build_contentUnit(
                $dataObjectPointer, 
                $contentUnitID, 'directory', $item);
        $package->add($contentUnit, $parent);
        
        $this->dataObjectCount++;      
  }

  /**
   *
   * @param string $path Path to the directy to be handled.
   * @param XFDUPackage $package th epackage passed by reference.
   */
  protected function handle_directory($path, XFDUPackage &$package) {
    $contentUnitID = 'cu'.  $this->contentUnitCount;
    
    $parsedPath = explode('/', $path);
    $xfduPointer = $this->builder->build_XFDUPointer(
            'URL', 
            $path.'meta/'.$parsedPath[sizeof($parsedPath) - 1].'_xfdu.xml', 
            $parsedPath[sizeof($parsedPath) - 1]
            );
    
    $contentUnit = $this->builder->build_contentUnit(
                                          $xfduPointer, 
                                          $contentUnitID, 
                                          'directory', 
                                          $parsedPath[sizeof($parsedPath) - 1]);
    
    $package->add($contentUnit);
  }
}
?>
