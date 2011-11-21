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
   * @var any 
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
    
    return $extension;
  }
//  public function get_as_DOM($prefix = NULL) {
//    if($this->isset_namespaces()) {
//    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
//    
//    return $dom->createElement('extension');
    
//    $extension = $dom->createElement($this->first_to_lower(get_class($this)));
//    
//    $namespace = new XMLNameSpace();
//    foreach($this->namepaces as $namespace) {
//      if($namespace->isset_prefix()) {
//        $extension->setAttribute('xmlns:'.$namespace->get_prefix(), $namespace->get_uri());
//      }
//      else {
//        $extension->setAttribute('xmlns', $namespace->get_uri());
//      }
//      
//      if($namespace->isset_location()) {
//        $extension->setAttribute('xsi:schemaLocation', 
//                $extension->getAttribute('xsi:schemaLocation').' '.
//                $namespace->get_uri().' '.$namespace->get_location());
//      }
//    }
//    
//    $extension->appendChild($dom->importNode($this->any));
//    
//    return $extension;
//    }
//    else {
//      throw new RequiredElementException('NameSpace');
//    }
//  }
}

?>
