<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 *  A container for one or more elements of dataObjectType
 *
 * @author Rob Olendorf
 */
class DataObjectSection extends aXFDUElement{  
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
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    return $dom->createElement('dataObjectSection');
  }
}

?>
