<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MetaDataSection
 *
 * @author Rob
 */




class MetaDataSection extends aXMLElement{
  
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
  public function unset_metadataObject() {
    $this->metadataObjects = array();
  }
}

?>
