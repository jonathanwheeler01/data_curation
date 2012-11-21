<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MetsDocumentID extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $TYPE;
    
    /*
     * @var string
     */
    protected $value;
    
    /*
     * @param string $ID
     */
    public function set_ID($ID){
        if($this->validate_id($ID)){
            $this->ID = $ID;
        }
        else {
            throw new InvalidIDTokenException($ID);
        }
    }
    
    /*
     * @return string
     */
    public function get_ID() {
        return $this->ID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ID() {
        return (isset($this->ID) && !empty($this->ID));
    }
    
    /*
     * @param string $TYPE
     */
    public function set_TYPE($TYPE){
        $this->TYPE = $TYPE;
    }
    
    /*
     * @return string
     */
    public function get_TYPE() {
        return $this->TYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_TYPE() {
        return (isset($this->TYPE) && !empty($this->TYPE));
    }
    
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
            $metsDocumentID = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $metsDocumentID = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':metsDocumentID');
        }
      else {
            $metsDocumentID = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        if($this->isset_ID()) {$metsDocumentID->setAttribute('ID', $this->ID);}
        
        if($this->isset_TYPE()) {$metsDocumentID->setAttribute('TYPE', $this->TYPE);}
        
      if($this->isset_value()) {
      $metsDocumentID->appendChild($dom->createTextNode($this->value));
    }
    
    return $metsDocumentID;
  }
}
?>
