<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 *    This file is part of data_curation.

 *    data_curation is free software: you can redistribute it and/or modify
 *    it under the terms of the Apache License, Version 2.0 (See License at the
 *    top of the directory).

 *    data_curation is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

 *    You should have received a copy of the Apache License, Version 2.0
 *    along with data_curation.  If not, see <http://www.apache.org/licenses/LICENSE-2.0.html>.
 */

/**
 * Description of CurationTool
 *
 * @author olendorf
 *
 */



/**
 * Description of CurationTool
 *
 *
 * @author olendorf
 * 
 */
class CurationTool {
  protected $root;                                                              // Root directory for the data, or the data file itself.
  protected $exclude;

  public function  __construct($path = '') {
    if($path != '') {
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
  }

  /**
   *
   * @return <string>
   */
  public function get_root() {
    return $this->root;
  }

  /**
   * Starts processing the data directory.
   */
  public function process_dataset() {
//    $this->oldcwd = getcwd();

    if($this->root == '') {
      throw new PathNotFoundException('No path has been specified', E_ERROR);
    }

    if(is_file($this->root)) {
      $pathInfo = pathinfo($this->root);
      $fileName = basename($this->root, $pathInfo['extension']);

      mkdir($pathInfo['dirname'].DIRECTORY_SEPARATOR.$fileName);
      rename($this->root, $pathInfo['dirname'].
                                     DIRECTORY_SEPARATOR.$fileName.
                                     DIRECTORY_SEPARATOR.$pathInfo['basename']);

      $this->root = $pathInfo['dirname'].DIRECTORY_SEPARATOR.$pathInfo['filename'];
    }

    $this->process_path($this->root);
  }

  /**
   * Processes a path. The function calls itself recursively to work
   * through the directory structure.
   * 
   * @param <string> $path
   */
  protected function process_path($path) {
    if(!file_exists($path.'/meta')) {
      mkdir($path.'/meta');
    }

    $contents = scandir($path);
    $contents = array_diff($contents, $this->exclude);

    foreach($contents as $item) {
      if(is_file($path.DIRECTORY_SEPARATOR.$item)) {
        $this->handle_file($path.DIRECTORY_SEPARATOR.$item);
      }
      else if(is_dir($path.DIRECTORY_SEPARATOR.$item)) {
        $this->handle_directory($path.DIRECTORY_SEPARATOR.$item);
        $this->process_path($path.DIRECTORY_SEPARATOR.$item);
      }
    }
  }

  /**
   * @todo Implement this function
   * @param <string> $path
   */
  protected function handle_file($path) {
    print 'file: '.$path.'\n';
  }

  /**
   * @todo Implement this function
   * @param <type> $path
   */
  protected function handle_directory($path) {

  }
}
?>
