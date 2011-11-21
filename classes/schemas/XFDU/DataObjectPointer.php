<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of DataObjectPointer
 *
 * @author Rob Olendorf
 *
 */
class DataObjectPointer extends aXFDUElement{
  /**
   *
   * @var string 
   */
  protected $dataObjectID;
  
  /**
   *
   * @var string 
   */
  protected $id;
  
  /**
   *
   * @param string $dataObjectID 
   */
  public function set_dataObjectID($dataObjectID) {
    if($this->validate_id($dataObjectID)) {
      $this->dataObjectID = $dataObjectID;
    }
    else {
      throw new InvalidIDTokenException($dataObjectID);
    }
  }
  
  /**
   *
   * @return string
   */
  public function get_dataObjectID() {
    return $this->dataObjectID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectID() {
    return (isset($this->dataObjectID) && !empty($this->dataObjectID));
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
    return(isset($this->id) && !empty($this->id));
  }  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}
?>
