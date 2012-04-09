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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
//    if(!$this->isset_dataObjects()) {
//      throw new RequiredElementException('dataObjects');
//    }
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $dataObjectSection = $dom->createElement('dataObjectSection');
    
    $dataObject = new DataObject();
    foreach($this->dataObjects as $dataObject) {
      $dataObjectSection->appendChild($dom->importNode($dataObject->get_as_DOM(), TRUE));
    }
    
    return $dataObjectSection;
  }
}

?>
