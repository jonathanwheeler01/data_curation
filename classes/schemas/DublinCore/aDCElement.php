<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * A wrapper element for Dublin Core element classes. 
 *
 * @author olendorf
 * 
 */
abstract class aDCElement extends aXMLElement{
  const DC_NAMESPACE = '';
  
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
   * @param boolean $includeNS
   */
  public function get_element_as_DOM($includeNS = FALSE) {
    
  }
}

?>
