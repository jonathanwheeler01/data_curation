<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Encapsulates and aggregates a type that can have a choice of either binary or xml data
 *
 * @author Rob Olendorf
 */
class FileContent extends aXMLElement{  
  /**
   * @todo yet to be implemented. Need to write a file stream wrapper 
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
   * @todo set_binaryData()
   */
  public function set_binaryData() {
    throw new UnimplementedMethodException(__METHOD__.' has not been implemented yet.', 0);
  }
  
  /**
   * @todo get_binaryData() 
   */
  public function get_binaryData() {
    throw new UnimplementedMethodException(__METHOD__.' has not been implemented yet.', 0);
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_binaryData() {
    return (isset($this->xmlData) && !empty($this->xmlData));
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
}

?>
