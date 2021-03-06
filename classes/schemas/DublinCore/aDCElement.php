<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * A wrapper element for Dublin Core element classes. 
 *
 * @author olendorf
 * 
 */
abstract class aDCElement extends aXMLElement{
  const DC_NAMESPACE = 'http://purl.org/dc/elements/1.1/';
  const DC_SCHEMA_LOCATION = 'http://dublincore.org/schemas/xmls/qdc/dc.xsd';
  
  /**
   *
   * @var string 
   */
  protected $prefix;
  
  /**
   *
   * @var string 
   */
  protected $value;
  
  /**
   * The xml:lang attribute which is optional and the only attribute allowed
   * in Dublin Core.
   * @var string 
   */
  protected $lang;
  
  /**
   *
   * @param string $prefix 
   */
  public function set_prefix($prefix) {
    $this->classNamePrefix = $prefix;
  }
  
  /**
   *
   * @return string 
   */
  public function get_prefix() {
    return $this->classNamePrefix;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_prefix() {
    return (isset($this->classNamePrefix) && !empty($this->classNamePrefix));
  }
  
  /**
   *
   * @param type $value 
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
   * Best practice is to use value defined in http://www.ietf.org/rfc/rfc4646.txt
   * @param string $lang 
   */
  public function set_lang($lang) {
    $this->lang = $lang;
  }
  
  /**
   *
   * @return string 
   */
  public function get_lang() {
    return $this->lang;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_lang() {
    return (isset($this->lang) && !empty($this->lang));
  }
  
  /**
   * Returns an DOM represenation of a DC element. If $includeNS is TRUE,
   * then each element will also have the associate namespace attributes. If
   * FALSE, then it is assumed the namespace is declared elsewhere in the 
   * containing document.
   * 
   * At the current time all of the elements are empty classes serving only as
   * to name the element with the class name. This allows extension in the future.
   * 
   * 
   * @param boolean $includeNS
   */
  public function get_as_DOM($prefix = 'dc') {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    // Add a prefix if one is set
    if(isset($this->classNamePrefix) && !empty($this->classNamePrefix)) {
      $element = $dom->createElement($this->classNamePrefix.':'.$this->first_to_lower(get_class($this)), 
              $this->value);
    }
    else {
      $element = $dom->createElement($this->first_to_lower(get_class($this)), 
              $this->value);
    }
    
    return $element;
  }
  
  /**
   * Takes a string and ensure the first character is lower case. This is useful
   * for some schemas such as Dublin core that use camel case, but where I used
   * CapitalCamel case in the classes. Yeah its a bit of extra code, but in the 
   * long run, I think it helps maintain a bit of clarity.
   * 
   * @param type $string
   * @return type 
   */
  protected function first_to_lower($string){
    return strtolower(substr($string, 0, 1)).  substr($string, 1);
  }
}

?>
