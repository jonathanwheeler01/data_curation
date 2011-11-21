<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Describes the inputs to be used with a behavior.
 *
 * @author Rob Olendorf
 */

class InputParameter extends aXFDUElement{
  /**
   *
   * @var DataObjectPointer
   */
  protected $content;
  
  /**
   *
   * @var string
   */
  protected $name;
  
  /**
   *
   * @var string
   */
  protected $value;
  
  /**
   *
   * @param DataObjectPointer $content 
   */
  public function set_content(DataObjectPointer $content) {
    $this->content = $content;
  }
  
  /**
   *
   * @return type 
   */
  public function get_content() {
    return $this->content;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_content() {
    return (isset($this->content) && !empty($this->content));
  }
  
  /**
   *
   * @param string $name 
   */
  public function set_name($name) {
    $this->name = $name;
  }
  
  /**
   *
   * @return string 
   */
  public function get_name() {
    return $this->name;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_name() {
    return (isset($this->name) && !empty($this->name));
  }
  
  /**
   *
   * @param string $value 
   */
  public function set_value($value) {
    $this->value = $value;
  }
  
  /**
   *
   * @return string
   */
  public function get_value() {
    return $this->value;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}
?>
