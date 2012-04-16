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
   * @param string $any XML as DOMElement or DOMNodeList
   */
  public function set_any($any) {
    if(get_class($any) != 'DOMElement' && get_class($any) != 'DOMNodeList') {
      $message = 'The XFDU Exception element must be an instance of a DOMNode, '.
                 'instance of '.  get_class($any).' given.';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);

    $xmlData = $dom->createElement('xmlData');

    if(get_class($this->any) == 'DOMNode' || get_class($this->any) == 'DOMElement' ) {
      $xmlData->appendChild($dom->importNode($this->any, TRUE));
    }
    else if(get_class($this->any) == 'DOMNodeList'){
      for($i = 0; $i < $this->any->length; $i++) {
        $xmlData->appendChild($dom->importNode($this->any->item($i), TRUE));
      }
    }

    return $xmlData;
  }
}

?>
