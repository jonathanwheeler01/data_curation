<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';

/**
 * A basic data structure for an XML element. 
 *
 * @author Rob Olendorf
 * 
 */
class XMLElement extends aXMLElement{
  
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
   * Sets the element name. Throws an InvalidArgumentException exceptoin if an invalid
   * XML element name is specifeid.
   * @param string $name 
   */
  public function set_name($name) {
    if($this->validate_element_name($name)) {
      $this->name = $name;
    }
    else {
      $message = 'Invalid XML Element name "'.$name.'" specified ';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
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
  
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    $element = new DOMElement($this->name, $this->value);
  }
}

?>