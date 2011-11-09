<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * One of the 5 main XFDU sections. Contains metadataObjects.
 * @todo figure out why the metadatasection isn't testing.
 *
 * @author Rob Olendorf
 */
class MetaDataSection extends aXMLElement{
  
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
  public function unset_metadataObject() {
    $this->metadataObjects = array();
  }
}

?>
