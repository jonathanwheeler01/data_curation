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
    $this->any = $any;
  }
  
  public function get_any() {
    return $this->any;
  }
  
  public function isset_any() {
    return (isset($this->any) && !empty($this->any));
  }
  
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);

    $extension = $dom->createElement($this->first_to_lower(get_class($this)));

    $extension->appendChild($dom->importNode($this->any, TRUE));

    return $extension;
  }
}

?>
