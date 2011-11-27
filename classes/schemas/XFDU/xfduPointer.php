<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';


/**
 * Subclass extending Reference only to keep track of the name difference.
 *
 * @author Rob
 */
class XFDUPointer extends Reference{  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $XFDUPointer = $dom->createElement(get_class($this));
    $this->set_DOM_attributes($XFDUPointer);
    
    return $XFDUPointer;
  }
}

?>