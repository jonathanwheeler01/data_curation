<?php
/**
 * @author Robert Olendorf
 */

class XFDUPackage {
  
  /**
   *
   * @var DOMDocument 
   */
  protected $xfdu;
  
  /**
   *
   * @var XFDUBuilder 
   */
  protected $builder;
  
  
  /**
   * 
   */
  public function __construct() {
    $this->builder = new XFDUBuilder();
  }
  
  /**
   *
   * @return DOMDocument
   */
  public function get_document() {
    return $this->xfdu;
  }
  
  /**
   *
   * @param XFDUSetup $settings 
   */
  public function create_package(XFDUSetup $settings) {    
    $this->xfdu = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    
    $this->xfdu->appendChild($this->xfdu->importNode($this->builder->build_xfdu($settings)->get_as_DOM(), TRUE));
  }
  
  /**
   *
   * @param aXFDUElement $element
   * @param string $parentID
   * @return DOMNode
   * @throws XFDUException 
   */
  private function add_contentUnit(aXFDUElement $element, $parentID) {
    $cuDOM = $element->get_as_DOM();
    $parent = NULL;
    if($parentID == NULL) {
      $parent = $this->xfdu->getElementsByTagName('informationPackageMap')->item(0);
    }
    else {
      $xpath = new DOMXPath($this->xfdu);
      $xpath->registerNamespace('xfdu', 'urn:ccsds:schema:xfdu:1');
      $query = "//xfdu:contentUnit[@ID='".$parentID."']";
      $parent = $xpath->query($query)->item(0);
    }
    
    if($parent == NULL) {
      $message = 'Unable to find contentUnit ID '.$parentID;
      throw new XFDUException($message);
    }
    
    return $parent->appendChild($this->xfdu->importNode($cuDOM));
  }
  
  /**
   *
   * @param DataObject $dataObject
   * @return DOMElement 
   */
  private function add_DataObject(DataObject $dataObject) {
    $doDOM = $dataObject->get_as_DOM();
    $dataObjectSection = $this->xfdu->getElementsByTagName('dataObjectSection')->item(0);
    return $dataObjectSection->appendChild($this->xfdu->importNode($doDOM));
  }
  
  /**
   * Adds the element to the appropriate place in the xfdu document.
   * 
   * @param aXFDUElement $element
   * @param string $parentID
   * @throws InvalidArgumentException 
   * @return DOMNode
   * 
   */
  public function add_element(aXFDUElement $element, $parentID = NULL) {
    $return = NULL;
    switch(get_class($element)) {
      case 'ContentUnit':
        $return = $this->add_contentUnit($element, $parentID);
        break;
      case 'DataObject':
        $return = $this->add_DataObject($dataObject);
        break;
      default:
        $message = 'Invalid class "'.get_class($element).'. Argument must be one '.
              'of ContentUnit';
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code, $previous);
    }
    
    return $return;
  }
}

?>
