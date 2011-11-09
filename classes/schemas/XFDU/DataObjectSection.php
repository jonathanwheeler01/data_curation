<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 *  A container for one or more elements of dataObjectType
 *
 * @author Rob Olendorf
 */
class DataObjectSection extends aXMLElement{  
  /**
   * Holds the array of data objects.
   * @var array<DataObjects> 
   */
  protected $dataObjects;
  
  /**
   * 
   */
  public function __construct() {
    $this->dataObjects = array();
  }
    
  /**
   * Add to the array of dataobjects.
   * @param DataObject $dataObject 
   */
  public function add_dataObject(DataObject $dataObject) {
    $this->dataObjects[] = $dataObject;
  }
  
  /**
   *
   * @return array<DataObject>
   */
  public function get_dataObjects() {
    return $this->dataObjects;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_dataObjects() {
    return (isset($this->dataObjects) && !empty($this->dataObjects));
  }
  
  /**
   * 
   */
  public function unset_dataObjects() {
    $this->dataObjects = array();
  }
}

?>
