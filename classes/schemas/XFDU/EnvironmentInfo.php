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
   * @var Extension
   */
  protected $extension;

  /**
   * Freeform XML
   * @var XMLdata
   */
  protected  $xmlData;

  /**
   *
   * @param Extension $extension 
   */
  public function set_extension(Extension $extension) {
    $this->extension = $extension;
  }
  
  /**
   *
   * @return Extension
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
   * @param XMLData $xmlData 
   */
  public function set_xmlData($xmlData) {
    $this->xmlData = $xmlData;
  }
  
  /**
   * 
   * @return XMLData
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
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $environmentInfo = $dom->createElement($this->first_to_lower(get_class($this)));
    
    if($this->isset_xmlData()) {
      $environmentInfo->appendChild($dom->importNode($this->xmlData->get_as_DOM(), TRUE));
    }
    
    if($this->isset_extension()) {
      $environmentInfo->appendChild($dom->importNode($this->extension->get_as_DOM(), TRUE));
    }
    
    return $environmentInfo;
  }
}
?>
