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
    // Extension requires that at least one namespace be define.
    if($this->isset_namespaces()) {
      $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);

      $extension = $dom->createElement($this->first_to_lower(get_class($this)));
      
      $namespace = new XMLNameSpace();
      $namespaces = $this->get_namespaces();
      foreach($namespaces as $namespace) {
        
        // A uri is required
        if(!$namespace->isset_uri()) {
          throw new RequiredElementException('Namespace URI');
        }
        
        // Extension requires a prefix too to avoid collisions with
        // the xfdu namespace
        if(!$namespace->isset_prefix()) {
          throw new RequiredElementException('Namespace Prefix');
        }
        
        $extension->setAttribute('xmlns:'.$namespace->get_prefix(), $namespace->get_uri());
        
        // A schema location is not required but can be added. 
        if($namespace->isset_location()) {
          $extension->setAttribute('xsi:schemaLocation', 
                  $extension->getAttribute('xsi:schemaLocation').' '.
                  $namespace->get_uri().' '.$namespace->get_location());
        }
      }
      
      $extension->appendChild($dom->importNode($this->any, TRUE));

      return $extension;
    }
    else {
      throw new RequiredElementException('Namespace');
    }
  }
}

?>
