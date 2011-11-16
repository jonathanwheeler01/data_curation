<?php

/**
 * Description of DCPackage
 *
 * @author Rob Olendorf
 * 
 */
class DCPackage {
  protected $prefix;
  
  protected $elements;
  
  public function __construct($prefix = NULL) {
    $this->prefix = $prefix;
    $this->elements = array();
  }
  /**
   * @todo implement public function addElement(); Functionality for handling
   * namespace and namespace location should be handled here as well.
   */
}

?>
