<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * @author Robert Olendorf
 */

class XFDUPackage {
  
  /**
   *
   * @var DomElement 
   */
  protected $xfdu;
  
  /**
   *
   * @var XFDUBuilder 
   */
  protected $builder;
  
  /**
   *
   * @param XFDUSetup $settings 
   */
  public function __construct(XFDUSetup $settings) {
    $this->builder = new XFDUBuilder();
    
    $this->xfdu = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $this->xfdu->appendChild($this->xfdu->importNode($this->builder->build_xfdu($settings)->get_as_DOM(), TRUE));
  }
  
  public function write($filename) {
    $this->xfdu->save($filename);
  }
  
  public function read($filename) {
    $dom = new DOMDocument('1.0', 'UTF-8');
    $this->xfdu = $dom->load($filename);
  }
  
  /**
   *
   * @param ContentUnit $contentUnit
   * @param string $parent
   * @return mixed ContentUnit on success, FALSE on failure.
   */
  private function ContentUnit(ContentUnit $contentUnit, $parent) {
    if($parent == NULL) {
      $ipmDOM = $this->xfdu->getElementsByTagName('informationPackageMap')->item(0);
       return $ipmDOM->appendChild($this->xfdu->importNode($contentUnit->get_as_DOM(), TRUE));
    }
    else {
      $xpath = new DOMXPath($this->xfdu);
      $query = '//xfdu:contentUnit[@ID="'.$parent.'"]';
      $xpath->registerNamespace('xfdu', 'urn:ccsds:schema:xfdu:1');
      $parentNode = $xpath->query($query)->item(0);
      if($parentNode == NULL) {
        return FALSE;
      }
      return $parentNode->appendChild($this->xfdu->importNode($contentUnit->get_as_DOM(), TRUE));
    }
  }
  
  /**
   *
   * @param DataObject $dataObject
   * @return type 
   */
  private function DataObject(DataObject $dataObject) {
    $xpath = new DOMXPath($this->xfdu);
    $query = '//dataObjectSection';
    $dataObjectSection = $xpath->query($query)->item(0);
    
    if($dataObjectSection == NULL) {
      $xpath->registerNamespace('xfdu', 'urn:ccsds:schema:xfdu:1');
      $query = '//xfdu:XFDU';
      $xfdu = $xpath->query($query)->item(0);
      
      $xfdu->appendChild($dataObjectSection = $this->xfdu->createElement('dataObjectSection'));
    }
    
    return $dataObjectSection->appendChild($this->xfdu->importNode($dataObject->get_as_DOM(), TRUE));
  }
  
  /**
   *
   * @param MetadataObject $metadataObject
   * @return type 
   */
  private function MetadataObject(MetadataObject $metadataObject) {
    $xpath = new DOMXPath($this->xfdu);
    $query = '//metadataSection';
    $metadataSection = $xpath->query($query)->item(0);
    
    if($metadataSection == NULL) {
      $xpath->registerNamespace('xfdu', 'urn:ccsds:schema:xfdu:1');
      $query = '//xfdu:XFDU';
      $xfdu = $xpath->query($query)->item(0);
      
      $xfdu->appendChild($metadataSection = $this->xfdu->createElement('metadataSection'));
    }
    
    return $metadataSection->appendChild($this->xfdu->importNode($metadataObject->get_as_DOM(), TRUE));
  }
  
  /**
   * Adds the object to the XFDU document.
   * @param aXFDUElement $xfduElement The element to be added
   * @param Mixed $parent Specify the parent element. If null, the highest allowable element is used.
   * @return mixed The object added. The object added is returned on success, false otherwise.
   * @throws InvalidArgumentException Thrown if adding the element is not supported, or the parent does not exist.
   */
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
