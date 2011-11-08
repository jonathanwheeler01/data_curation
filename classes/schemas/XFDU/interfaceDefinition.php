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
 * @author Rob
 */
class InterfaceDefinition extends aXMLElement{
  /**
   *
   * @var array<InputParameter>
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
}

?>
