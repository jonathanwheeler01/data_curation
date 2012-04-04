<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * allows third parties to define extensions to the XFDU from a namespace controlled by the third party
 *
 * @author Rob Olendorf
 */
class Extension extends aXFDUElement{
  /**
   *
   * @var XML 
   */
  protected $any;
  
  public function set_any($any) {
    $code = 0;
    $previous = null;
    if(!is_object($any)) {
      $message = "Invalid input into ".__METHOD__.". DOMElement or DOMNodeList ".
              " expected, ".  gettype($any)." found.";
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    if(get_class($any) != 'DOMElement' && get_class($any) != 'DOMNodeList') {
      $message = 'The XFDU Exception element must be an instance of a DOMNode, '.
                 'instance of '.  get_class($any).' given.';
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    $this->any = $any;
  }
  
  /**
   *
   * @return XML 
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
   * @param text $prefix
   * @return DOM Object 
   */
  public function get_as_DOM($prefix = NULL) {
    if(!isset($this->any)) {
      throw new RequiredElementException('anyXML');
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    $extension = $dom->createElement($this->first_to_lower(get_class($this)));
    
    if(get_class($this->any) == 'DOMNodeList') {
      for($i = 0; $i < $this->any->length; $i++) {
        $extension->appendChild($dom->importNode($this->any->item($i)));
      }
    }
    else {
      $extension->appendChild($dom->importNode($this->any, TRUE));
    }

    return $extension;
  }
}

?>
