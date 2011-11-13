<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';
/**
 * Abstract class serving as an interface for descentent classes and also containing
 * core concrete functions.
 *
 * @author Rob Olendorf
 */
abstract class aXMLElement {
  /**
   * Associative array of attributes of the form attribute = > value 
   * @var array<string>
   */
  protected $attributes;
    
  /**
   * 
   * @var array<XMLNamespace>
   */
  protected $namespaces;
  
  public function __construct() {
    $this->attributes = array();
    $this->namespaces = array();
  }
  public function validate_id($id) {
    return (preg_match('/^[_a-zA-Z][_a-zA-Z0-9]*/', $id) > 0);
  }
  
  /**
   *
   * @param string $name
   * @param string $value 
   */
  public function add_attribute($name, $value) {
    $this->attributes[$name] = $value;
  }
  
  /**
   *
   * @return array<name=>value> 
   */
  public function get_attributes() {
    return $this->attributes;
  }
  
  /**
   * Returns the value of the specified attribute if it exists, otherwise returns
   * FALSE.
   * 
   * @param string $name
   * @return boolean 
   */
  public function get_attribute($name) {
    if(isset($this->attributes[$name]) && !empty($this->attributes[$name])) {
      return $this->attributes[$name];
    }
    else {
      return FALSE;
    }
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_attributes() {
    return (isset($this->attributes) && !empty($this->attributes));
  }
  
  /**
   * 
   */
  public function unset_attributes() {
    $this->attributes = array();
  }  
  
  /**
   *
   * @param XMLNamespace $namespace 
   */
  public function add_namespace(XMLNamespace $namespace) {
    if(isset($namespace->prefix) && !empty($namespace->prefix)) {
      $this->namespaces[$namespace->uri.':'.$namespace->prefix] = $namespace;
    }
    else {
      $this->namespaces[$namespace->uri] = $namespace;
    }
  }
  
  /**
   *
   * @return array<XMLNamespace>
   */
  public function get_namespaces() {
    return $this->namespaces;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_namespaces() {
    return (isset($this->namespaces) && !empty($this->namespaces));
  }
  
  /**
   * Abstract element intended to define an interface for all descendent classes.
   * 
   * @return DOMElement
   */
  //abstract public function get_as_DOM() {}
  
  /**
   * Helper function to add attributes to DOMElements. 
   * @param DOMElement $element
   * @return DOMElement 
   */
  protected function add_attributes_to_DOMElement(DOMElement $element) {
    // Add any attributes to the element.
    if($this->isset_attributes()) {
      foreach($this->attributes as $name => $value) {
        $element->setAttribute($name, $value);
      }
    }
    return $element;
  }
  
  /**
   * Helper function to add namespace attributes to an element. 
   * @param DOMElement $element
   * @return DOMElement 
   */
  protected function add_namespaces_to_DOMElement(DOMElement $element) {
    if($this->isset_namespaces()) {
      foreach($this->namespaces as $namespace) {
        if(isset($namespace->prefix) && !empty($namespace->prefix)) {           // handle qualified namespaces
          $element->setAttribute('xmlns:'.$namespace->prefix, $namespace->uri);
        }
        else {
          $element->setAttribute('xmlns', $namespace->uri);                     // handle default namespaces
        }
        
        // Handle any schema locations
        if(isset($namespace->location) && !empty($namespace->location)) {
          if(!$element->hasAttribute('xmlns:xsi')) {                            // ensure the XMLSchema-instance namespace is
                                                                                // to allow use of the schemaLocation attribute
            $element->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
          }
          
          // Add location by getting the old location attribute and appending the new location.
          // If no location attribute exists, just a space is added.
          $element->setAttribute('xsi:schemaLocation', 
                  $element->getAttribute('xsi:schemaLocation').
                  ' '.$namespace->uri.' '.$namespace->location);
        }
      }
    }
    
    return $element;
  }
}

?>
