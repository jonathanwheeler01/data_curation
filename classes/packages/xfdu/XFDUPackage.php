<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * @author Robert Olendorf
 */

class XFDUPackage {
  protected $xfdu;
  protected $builder;
  
  public function __construct(XFDUSetup $settings) {
    $this->builder = new XFDUBuilder();
    
    $this->xfdu = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $this->xfdu->appendChild($this->xfdu->importNode($this->builder->build_xfdu($settings)->get_as_DOM(), TRUE));
  }
  
  private function ContentUnit(ContentUnit $contentUnit, $parent) {
    if($parent == NULL) {
      $ipmDOM = $this->xfdu->getElementsByTagName('informationPackageMap')->item(0);
       return $ipmDOM->appendChild($this->xfdu->importNode($contentUnit->get_as_DOM(), TRUE));
    }
    else {
      $xpath = new DOMXPath($this->xfdu);
      $query = '//xfdu:contentUnit[@ID="'.$parent.'"]';
      print __FILE__.':'.__LINE__.' - '.$query;
      $xpath->registerNamespace('xfdu', 'urn:ccsds:schema:xfdu:1');
      $parentNode = $xpath->query($query)->item(0);
      return $parentNode->appendChild($this->xfdu->importNode($contentUnit->get_as_DOM(), TRUE));
    }
  }
  
  public function add(aXFDUElement $xfduElement, $parent = NULL) {
    if(method_exists($this, $methodName = get_class($xfduElement))) {
      return $this->$methodName($xfduElement, $parent);
    }
    else {
      $message = 'No add functionality has been implemented for the '.get_class($xfduElement);
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
  }
}

?>
