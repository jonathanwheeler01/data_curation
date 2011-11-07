<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of FileContentType
 *
 * @author Rob
 */
class FileContent extends aXMLElement{  
  /**
   * @todo yet to be implemented. Need to write a file stream wrapper 
   * @var biary data
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
    $this->id = $id;
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
