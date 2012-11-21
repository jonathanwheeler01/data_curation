<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Note extends aMETSElement {
    /*
     * @var string
     */
    protected $value;
    
    /**
   *
   * @param string $value
   */
  public function set_value($value) {
    $this->value = $value;
    return $this;
  }
  
  /**
   *
   * @return string 
   */
  public function get_value() {
    return $this->value;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }
  
  public function get_as_DOM($prefix = NULL) {
      
      $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
      
      if($prefix !== NULL) {
            $note = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $note = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':note');
        }
      else {
            $note = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
      if($this->isset_value()) {
      $note->appendChild($dom->createTextNode($this->value));
    }
    
    return $note;
  }
}
?>
