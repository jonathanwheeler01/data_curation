<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * The interface definition type contains a pointer to an abstract definition of
 *  a set of related behaviors. These abstract behaviors can be associated with 
 * the content of a XFDU object. The interface definition element will be a 
 * pointer to another object (an interface definition object). An interface 
 * definition object could be another XFDU object, or some other entity (e.g., 
 * a WSDL source). Ideally, an interface definition object should contain 
 * metadata that describes a set of behaviors or methods. It may also contain 
 * files that describe the intended usage of the behaviors, and possibly files 
 * that represent different expressions of the interface definition. 
 * InterfaceDefinition extends from referenceType and adds ability of specifying
 *  inputParameter that can be either just a string value or pointer to the 
 * content in this package
 *
 * @author Rob Olendorf
 */
class InterfaceDefinition extends Reference{
  /**
   *
   * @var array<inputParameter>
   */
  protected $inputParameters;
  
  /**
   * 
   */
  public function __construct() {
    $this->inputParameters = array();
  }

  /**
   *
   * @param InputParameter $inputParameter 
   */
  public function add_inputParameter(InputParameter $inputParameter) {
    $this->inputParameters[] = $inputParameter;
  }
  
  /**
   *
   * @return InputParameter
   */
  public function get_inputParameters() {
    return $this->inputParameters;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_inputParameters() {
    return (isset($this->inputParameters) && !empty($this->inputParameters));
  }
  
  /**
   * 
   */
  public function unset_inputParameters() {
    $this->inputParameters = array();
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    // Check for required elements
    if(!$this->isset_locatorType()) {
      throw new RequiredElementException('locatorType');
    }
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $interfaceDefinition = $dom->createElement('interfaceDefinition');
    
    // Handle Required elements
    $interfaceDefinition->setAttribute('locatorType', $this->locatorType);
    
    // Handle optional elements.
    if($this->isset_href()) {
      $interfaceDefinition->setAttribute('href', $this->href);
    }
    
    if($this->isset_id()) {
      $interfaceDefinition->setAttribute('ID', $this->id);
    }
    
    if($this->isset_locator()) {
      $interfaceDefinition->setAttribute('locator', $this->locator);
    }
    
    if($this->isset_otherLocatorType()) {
      $interfaceDefinition->setAttribute('otherLocatorType', $this->otherLocatorType);
    }
    
    if($this->isset_textInfo()) {
      $interfaceDefinition->setAttribute('textInfo', $this->textInfo);
    }
    
    if($this->isset_inputParameters()) {
      $inputParameter = new InputParameter();
      foreach($this->inputParameters as $inputParameter) {
        $interfaceDefinition->appendChild($dom->importNode($inputParameter->get_as_DOM(), TRUE));
      }
    }
    
    return $interfaceDefinition;
  }
}

?>
