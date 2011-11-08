<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of interfaceDefinition
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
