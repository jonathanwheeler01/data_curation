<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Wrapper for MetadataObjects
 *
 * @author Rob Olendorf
 */
class MetadataSection extends aXFDUElement{
  /**
   *
   * @var array<MetadataObject> 
   */
  protected $metadataObjects;
  
  /**
   * 
   */
  public function __construct() {
    $this->metadataObjects = array();
  }
  
  /**
   *
   * @param MetadataObject $metadataObject 
   */
  public function add_metadataObject(MetadataObject $metadataObject) {
    $this->metadataObjects[] = $metadataObject;
  }
  
  /**
   *
   * @return array<MetadataObject> 
   */
  public function get_metadataObjects() {
    return $this->metadataObjects;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_metadataObjects() {
    return (isset($this->metadataObjects) && !empty($this->metadataObjects));
  }
  
  /**
   * 
   */
  public function unset_metadataObjects() {
    $this->metadataObjects = array();
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}

?>
