<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * An element of metadataReferenceType is a generic element used throughout the 
 * XFDU schema to provide a pointer to metadata which resides outside the XFDU 
 * document. metadataReferenceType has the following attributes: 1. ID: an XML 
 * ID; 2. locatorType: the type of locator contained in the body of the element; 
 * 3. otherLocatorType: a string indicating an alternative type of locator when 
 * the locatorType attribute value is set to "OTHER."; 4. href: actual location 
 * (e.g., URL) 5. mimeType: the MIME type for the metadata being pointed at; 
 * 6. vocabularyName: the name of the well known metadata standard vocabulary 
 * used to being pointed at (e.g., FITS); 7. textInfo: a label to display to 
 * the viewer of the XFDU document identifying the metadata; and 
 * NB: metadataReference is an empty element. The location of the metadata
 *  must be recorded in the href attribute.
 *
 * @author Rob Olendorf
 */
class MetadataReference extends Reference{
  /**
   *
   * @var string
   */
  protected $mimeType;
  
  /**
   *
   * @var string
   */
  protected $vocubularyName;
  
  /**
   *
   * @param string $mimeType 
   */
  public function set_mimeType($mimeType) {
    $this->mimeType = $mimeType;
  }
  
  /**
   *
   * @return string 
   */
  public function get_mimeType() {
    return $this->mimeType;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_mimeType() {
    return (isset($this->mimeType) && !empty($this->mimeType));
  }
  
  /**
   *
   * @param string $vocubularyName 
   */
  public function set_vocubularyName($vocubularyName) {
    $this->vocubularyName = $vocubularyName;
  }
  
  /**
   *
   * @return string
   */
  public function get_vocabularyName() {
    return $this->vocubularyName;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_vocubularyName() {
    return (isset($this->vocubularyName) && !empty($this->vocubularyName));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if(!$this->isset_locatorType()) {
      throw new RequiredElementException('locatorType');
    }
    
    $locatorTypes = new Locator();
    
    if(!$locatorTypes->has_value($this->locatorType)) {
      $message = 'Invalid locatorType given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The locator must be one of '.  implode(', ', $enum->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $metadataReference = $dom->createElement('metadataReference');
    
    // Set a whole bunch of attributes
    $metadataReference->setAttribute('locatorType', $this->locatorType);
    if($this->isset_locator()) {$metadataReference->setAttribute('locator', $this->locator);}
    if($this->isset_otherLocatorType()) {$metadataReference->setAttribute('otherLocatorType', $this->otherLocatorType);}
    if($this->isset_href()) {$metadataReference->setAttribute('href', $this->href);}
    if($this->isset_id()) {$metadataReference->setAttribute('ID', $this->id);}
    if($this->isset_textInfo()) {$metadataReference->setAttribute('textInfo', $this->textInfo);}
    if($this->isset_mimeType()) {$metadataReference->setAttribute('mimeType', $this->mimeType);}
    if($this->isset_vocubularyName()) {$metadataReference->setAttribute('vocabularyName', $this->vocubularyName);}
    
    return $metadataReference;
  }
}

?>
