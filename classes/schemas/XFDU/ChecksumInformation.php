<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of Checksum
 *
 * @author Rob
 */
class ChecksumInformation extends aXMLElement {
  protected $checksumName;
  protected $value;
  
  public function set_checksumName($checksumName) {
    $this->checksumName = $checksumName;
  }
  
  public function get_checksumName() {
    return $this->checksumName;
  }
  
  public function isset_checksumName() {
    return (isset($this->checksumName) && !empty ($this->checksumName));
  }
  
  public function set_value($value) {
    $this->value = $value;
  }
  
  public function get_value() {
    return $this->value;
  }
  
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }
}

?>
