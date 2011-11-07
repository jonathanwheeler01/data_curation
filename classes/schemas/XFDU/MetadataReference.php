<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of MetadataReference
 *
 * @author Rob
 */
class MetadataReference extends Reference{
  protected $mimeType;
  protected $vocubularyName;
  
  public function set_mimeType($mimeType) {
    $this->mimeType = $mimeType;
  }
  
  public function get_mimeType() {
    return $this->mimeType;
  }
  
  public function isset_mimeType() {
    return (isset($this->mimeType) && !empty($this->mimeType));
  }
  
  public function set_vocubularyName($vocubularyName) {
    $this->vocubularyName = $vocubularyName;
  }
  
  public function get_vocabularyName() {
    return $this->vocubularyName;
  }
  
  public function isset_vocubularyName() {
    return (isset($this->vocubularyName) && !empty($this->vocubularyName));
  }
}

?>
