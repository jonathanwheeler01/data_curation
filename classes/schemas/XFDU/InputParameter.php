<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of InputParameter
 *
 * @author Rob
 */

class InputParameter extends aXMLElement{
  protected $content;
  protected $name;
  protected $value;
  
  public function set_content(DataObjectPointer $content) {
    $this->content = $content;
  }
  
  public function get_content() {
    return $this->content;
  }
  
  public function isset_content() {
    return (isset($this->content) && !empty($this->content));
  }
  
  public function set_name($name) {
    $this->name = $name;
  }
  
  public function get_name() {
    return $this->name;
  }
  
  public function isset_name() {
    return (isset($this->name) && !empty($this->name));
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
