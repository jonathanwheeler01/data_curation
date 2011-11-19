<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Encapsulates and aggregates a type that can have a choice of either binary or xml data
 *
 * @author Rob Olendorf
 */
class FileContent extends aXFDUElement{  
  /**
   * 
   * @var binary data
   */
  protected $binaryData;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   * Freeform XML. Can also be constrained by a schema.
   * @var XMLData
   */
  protected $xmlData;
  
  /**
   * 
   */
  public function set_binaryData($binaryData) {
    $this->binaryData = $binaryData;
  }
  
  /**
   * 
   */
  public function get_binaryData() {
    return $this->binaryData;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_binaryData() {
    return (isset($this->binaryData) && !empty($this->binaryData));
  }
  
  /**
   *
   * @param string $id 
   */
  public function set_id($id) {
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new InvalidIDTokenException($id);
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_id() {
    return $this->id;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }
  
  /**
   * 
   * @param XMLData $xmlData 
   */
  public function set_XMLData(XMLData $xmlData) {
    $this->xmlData = $xmlData;
  }
  
  /**
   *
   * @return XMLData 
   */
  public function get_XMLData() {
    return $this->xmlData;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_XMLData() {
    return (isset($this->xmlData) && !empty($this->xmlData));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}

?>
