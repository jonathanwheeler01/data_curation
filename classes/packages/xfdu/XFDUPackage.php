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
    
    // Because of some weirdness with the DOM, the namespaces in environmentalInfo
    // such as Dublin Core were being redeclared numerous times. It didn't really
    // hurt anything I could see, but just to be sure, I remove them here. Also
    // just makes a nicer document.
    $envInfo = $this->xfdu->getElementsByTagName('environmentInfo')->item(0);
    if($envInfo) {
      $envInfo->removeAttributeNS('http://purl.org/dc/elements/1.1/', 'dc');
      $envInfo->removeAttributeNS('http://purl.org/dc/terms/', 'dcterms');

      $xmlData = $this->xfdu->getElementsByTagName('xmlData');
      if($xmlData->length > 0)
      for($i = 0; $i < $xmlData->length; $i++) {
        $xmlData->item($i)->removeAttributeNS('http://purl.org/dc/elements/1.1/', 'dc');
        $xmlData->item($i)->removeAttributeNS('http://purl.org/dc/terms/', 'dcterms');
      }
    }
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
    $dataObjectSection = $this->xfdu->getElementsByTagName('dataObjectSection')->item(0);

    if($dataObjectSection == NULL) {
//      $xfdu = $this->xfdu->getElementsByTagName('xfdu:XFDU')->item(0);
      $xfdu = $this->xfdu->getElementsByTagName('XFDU')->item(0);
      $dataObjectSection = $this->xfdu->createElement('dataObjectSection');
      $behaviorSection = $this->xfdu->getElementsByTagName('behaviorSection')->item(0);
      
      $xfdu->insertBefore($dataObjectSection, $behaviorSection);
    }
    
    return $dataObjectSection->appendChild($this->xfdu->importNode($dataObject->get_as_DOM(), TRUE));
  }
  
  /**
   *
   * @param MetadataObject $metadataObject
   * @return DOMElement 
   */
  private function MetadataObject(MetadataObject $metadataObject) {
    $metadataSection = $this->xfdu->getElementsByTagName('metadataSection')->item(0);
    
    return $metadataSection->appendChild($this->xfdu->importNode($metadataObject->get_as_DOM(), TRUE));
  }
  
  private function EnvironmentInfo(EnvironmentInfo $environmentInfo) {
    $packageHeader = $this->xfdu->getElementsByTagName('packageHeader')->item(0);
    
    return $packageHeader->appendChild($this->xfdu->importNode($environmentInfo->get_as_DOM(), TRUE));
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
  
  /**
   * Add a namespace to the specified element(s) of the package. Not currently
   * unit tested.
   * 
   * @param XMLNameSpace $namespace
   * @param string $elementName
   * @return boolean 
   */
  public function addNamespace(XMLNameSpace $namespace, $elementName = 'xfdu:XFDU') {
    $elements = $this->xfdu->getElementsByTagName($elementName);
    
    if($elements->length == 0) {
      return FALSE;
    }
    $element = $this->xfdu->createElement(' ');
    for($i = 0; $i < $elements->length; $i++) {
      $element = $elements->item($i);
      
      $qualifiedName = $namespace->isset_prefix() ? 'xmlns:'.$namespace->get_prefix() : 'xmlns';
      
      $element->setAttributeNS('http://www.w3.org/2000/xmlns/', $qualifiedName, $namespace->get_uri());
      
      if($namespace->isset_location()) {
        $value = $element->getAttributeNS(
                'http://www.w3.org/2001/XMLSchema-instance', 
                'schemaLocation').
                  ' '.$namespace->get_uri().' '.$namespace->isset_location();
        $element->setAttributeNS('http://www.w3.org/2001/XMLSchema-instance', 'xsi:schemaLocation', $value);
      }
    }
  }
}

?>
