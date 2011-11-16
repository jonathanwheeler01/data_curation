<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Wrapper for MetadataObjects
 *
 * @author Rob Olendorf
 */
class MetadataSection extends aXFDUElement{
  protected $metadataObjects;
  
  public function __construct() {
    $this->metadataObjects = array();
  }
  
  public function add_metadataObject(MetadataObject $metadataObject) {
    $this->metadataObjects[] = $metadataObject;
  }
  
  public function get_metadataObjects() {
    return $this->metadataObjects;
  }
  
  public function isset_metadataObjects() {
    return (isset($this->metadataObjects) && !empty($this->metadataObjects));
  }
  
  public function unset_metadataObjects() {
    $this->metadataObjects = array();
  }
}

?>
