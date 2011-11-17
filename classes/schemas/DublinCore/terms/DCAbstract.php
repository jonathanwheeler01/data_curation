<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * A summary of the resource.
 *
 * @author Rob Olendorf
 * 
 */
class DCAbstract extends Description{
  
  /**
   * Need to override this to handle the special case of Abstract being
   * a key word in PHP
   */

  public function get_element_as_DOM() {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    // Add a prefix if one is set
    if(isset($this->prefix) && !empty($this->prefix)) {
      $element = $dom->createElement($this->prefix.':abstract', 
              $this->value);
    }
    else {
      $element = $dom->createElement('abstract', 
              $this->value);
    }
    
    return $element;
  }
  
}

?>
