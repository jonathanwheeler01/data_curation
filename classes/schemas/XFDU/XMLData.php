<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * A wrapper to contain arbitrary XML content.
 *
 * @author Rob Olendorf
 */
class XMLData extends aXFDUElement{
  /**
   * Freeform or structured XML. May be stored an any format, String DOM etc.
   * @var mixed
   */
  protected $any;
  
  /**
   *
   * @param string $any 
   */
  public function set_any($any) {
    $this->any = $any;
  }
  
  /**
   *
   * @return string
   */
  public function get_any() {
    return $this->any;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_any() {
    return (isset($this->any) && !empty($this->any));
  }  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $xmlData = $dom->createElement('xmlData');
    $xmlData->appendChild($dom->importNode($this->any, TRUE));
    
    return $xmlData;
    
  }
}

?>
