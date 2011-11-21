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
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}

?>
