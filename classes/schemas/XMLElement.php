<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';

/**
 * Creates a datastructure for a basic XML element. 
 *
 * @author Rob Olendorf
 */
class XMLElement extends aXMLElement{
  protected $name;
  protected $value;
  
  public function __construct($name, $value = NULL, $attributes = array()) {
    parent::__construct();
    $this->name = $name;
    $this->value = $value;
    $this->attributes = $attributes;
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
   * @param string $name
   */
  public function set_value($value) {
    $this->value = $value;
  }
  
  /**
   *
   * @return string
   */
  public function get_value() {
    return $this->name;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }
  

  /**
   * Returns a DOMElement represenation of the XMLElement.
   * @return DOMElement
   */
  public function get_as_DOM() {
    $dom = new DOMDocument(1.0, 'UTF-8');                                       // Create a DOMDocument to access element creation.
    $element = $dom->createElement($this->name);                                // Create the element
    
    // If a value is set, create a textnode to hold the value and append it to
    // the output element.
    if($this->isset_value()) {                                              
      $element->appendChild($dom->createTextNode($this->value));
    }
    
    // Add any attributes to the element.
    $element = $this->add_attributes_to_DOMElement($element);
    
    // Add any namespaces
    $element = $this->add_namespaces_to_DOMElement($element);
//    if($this->isset_namespaces()) {
//      foreach($this->namespaces as $namespace) {
//        if(isset($namespace->prefix) && !empty($namespace->prefix)) {           // handle qualified namespaces
//          $element->setAttribute('xmlns:'.$namespace->prefix, $namespace->uri);
//        }
//        else {
//          $element->setAttribute('xmlns', $namespace->uri);                     // handle default namespaces
//        }
//        
//        // Handle any schema locations
//        if(isset($namespace->location) && !empty($namespace->location)) {
//          if(!$element->hasAttribute('xmlns:xsi')) {                            // ensure the XMLSchema-instance namespace is
//                                                                                // to allow use of the schemaLocation attribute
//            $element->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
//          }
//          
//          // Add location by getting the old location attribute and appending the new location.
//          // If no location attribute exists, just a space is added.
//          $element->setAttribute('xsi:schemaLocation', 
//                  $element->getAttribute('xsi:schemaLocation').
//                  ' '.$namespace->uri.' '.$namespace->location);
//        }
//      }
//    }
    
    return $element;
  }
}

?>
