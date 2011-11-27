<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * An element of this type would convey checksum information: The value of the 
 * checksum element is the result of the checksum The value of the checksumName 
 * attribute is the name of checksum algorithm used to compute the value
 *
 * @author Rob Olendorf
 */
class ChecksumInformation extends aXFDUElement {
  /**
   *
   * @var string
   */
  protected $checksumName;
  
  /**
   *
   * @var string
   */
  protected $value;
  
  /**
   *
   * @param string $checksumName 
   */
  public function set_checksumName($checksumName) {
    $this->checksumName = $checksumName;
  }
  
  /**
   *
   * @return string
   */
  public function get_checksumName() {
    return $this->checksumName;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_checksumName() {
    return (isset($this->checksumName) && !empty ($this->checksumName));
  }
  
  /**
   *
   * @param string $value
   */
  public function set_value($value) {
    $this->value = $value;
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
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if(!$this->isset_checksumName()) {
      throw new RequiredElementException('checksumName');
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $checksum = $dom->createElement('checksum');
    $checksum->setAttribute('checksumName', $this->checksumName);
    
    if($this->isset_value()) {
      $checksum->appendChild($dom->createTextNode($this->value));
    }
    
    return $checksum;
  }
}

?>
