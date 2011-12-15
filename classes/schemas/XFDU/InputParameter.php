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
    // The value can be a DataObjectPointer or any of the type primitives, which are
    // all treated as a string. Test that an invalid object is not passed.
    if(gettype($value) == 'object' && get_class($value) != 'DataObjectPointer') {
      $message = get_class($value).'is neither a type primitive castable to a string '.
              'or an instance of DataObjectPointer.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
    
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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if(!$this->isset_name()) {
      throw new RequiredElementException('name');
    }
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $inputParameter = $dom->createElement('inputParameter');
    
    // Handle required elements.
    $inputParameter->setAttribute('name', $this->name);
    
    // Handle optional elements.
    if($this->isset_value()) {
      // No need to worry about the correct class as it is checked when the
      // value is set.
      if(gettype($this->value) == 'object') {
        $dataObjectPointer = new DataObjectPointer();
        $dataObjectPointer = $this->value;
        $inputParameter->appendChild($dom->importNode($dataObjectPointer->get_as_DOM(), TRUE));
      }
      else {
        $inputParameter->appendChild($dom->createTextNode($this->value));
      }
    }
    
    return $inputParameter;
  }
}
?>
