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
    $code = 0;
    $previous = null;
    if(!is_object($any)) {
      $message = "Invalid input into ".__METHOD__.". DOMElement or DOMNodeList ".
              " expected, ".  gettype($any)." found.";
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    if(get_class($any) == 'DOMElement' || get_class($any) == 'DOMNodeList') {
      $this->any = $any;
    }
    else {
      $message = "Invalid input into ".__METHOD__.". DOMElement or DOMNodeList ".
              " expected, ".  get_class($any)." found.";
      throw new InvalidArgumentException($message, $code, $previous);
    }
  }
  
  /**
   *
   * @return Mixed
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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if(!$this->isset_any()) {
      throw new RequiredElementException('anyXML');
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    $xmlData = $dom->createElement('xmlData');
    
    if(get_class($this->any) == 'DOMElement') {
      $xmlData->appendChild($dom->importNode($this->any, TRUE));
    }
    else {
      for($i = 0; $i < $this->any->length; $i++) {
        $xmlData->appendChild($dom->importNode($this->any->item($i)));
      }
    }
    
    return $xmlData;
  }
}

?>
