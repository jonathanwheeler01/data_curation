<?php

require_once dirname(__FILE__) . '/../../curation_tool.inc';
/**
 * Description of aXMLElement
 *
 * @author Rob
 */
class aXMLElement {
  
  /**
   * An associative array of attributes.
   * @var array<string> 
   */
  protected $attributes;
  
  /**
   * an associative array of namespaces
   * @var array<NameSpace> 
   */
  protected $nameSpaces;
  
  /**
   * The name of the element. It is intended that derived classes will not need
   * this and be specific element types.
   * 
   * @var string
   */
  private $name;
  
  /**
   * Can be either a literal, or another XMLElement
   * 
   * @var mixed
   */
  private $value;
  
  /**
   *  @param string $id
   */
  public function validate_id($id) {
    return (preg_match('/^[_a-zA-Z][_a-zA-Z0-9]*/', $id) > 0);
  }
  
  public function __construct($name = NULL, $value = NULL, XMLNameSpace $namespace = NULL) {
    $this->name = $name;
    $this->value = $value;
    if($namespace !== NULL) {
      $this->nameSpaces = array();
    }
  }
}

?>
