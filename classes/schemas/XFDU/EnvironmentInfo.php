<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Environment info provides meta information related to the environment where 
 * the XFDU was created. Since environment information may be specific to a 
 * concrete XFDU producer, environment information can have only two optional 
 * elements: -xmlData - can hold application specific information. -wild card 
 * that serves as extension point for other applications
 *
 * @author Rob Olendorf
 *
 */

class EnvironmentInfo extends aXFDUElement{
  /**
   * Allows application specific extensions of the xfdu
   * @var any
   */
  protected $extension;

  /**
   * Freeform XML
   * array<Object>
   */
  protected  $xmlData;

  /**
   *
   * @param mixed $extension 
   */
  public function set_extension($extension) {
    $this->extension = $extension;
  }
  
  /**
   *
   * @return mixed
   */
  public function get_extension() {
    return $this->extension;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_extension() {
    return (isset($this->extension) && !empty($this->extension));
  }
  
  /**
   *
   * @param XML $xmlData 
   */
  public function set_xmlData($xmlData) {
    $this->xmlData = $xmlData;
  }
  
  /**
   * 
   * @return XML 
   */
  public function get_xmlData() {
    return $this->xmlData;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_xmlData() {
    return (isset($this->xmlData) && !empty($this->xmlData));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}
?>
