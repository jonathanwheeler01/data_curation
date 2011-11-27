<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * An element of metadataWrapType is a generic element used throughout the XFDU 
 * schema to allow the encoder to place arbitrary metadata conforming to other 
 * standards/schema within a XFDU document. The metadataWrapType can have the 
 * following attributes: 1. ID: an XML ID for this element; 2. mimeType: the 
 * MIME type for the metadata contained in the element; 3. vocabularyName: the 
 * type of metadata contained (e.g., MARC, EAD, etc.); 4. textInfo: a label to 
 * display to the viewer of the XFDU document identifying the metadata.
 *
 * @author Rob Olendorf
 */
class MetadataWrap extends FileContent{
  /**
   * Mimetype of the metadata
   * @var string
   */
  protected $mimeType;
  
  /**
   * Human readable description
   * @var string
   */
  protected $textInfo;
  
  /**
   * Name of the vocabulary or schema. This is intended for display and not
   * setting of namespaces.
   * @var string
   */
  protected $vocabularyName;
 
  
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
   * @param string $textInfo 
   */
  public function set_textInfo($textInfo) {
    $this->textInfo = $textInfo;
  }
  
  /**
   *
   * @return string 
   */
  public function get_textInfo() {
    return $this->textInfo;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_textInfo() {
    return (isset($this->textInfo) && !empty($this->textInfo));
  }
  
  /**
   *
   * @param string $vocabularyName 
   */
  public function set_vocabularyName($vocabularyName) {
    $this->vocabularyName = $vocabularyName;
  }
  
  /**
   *
   * @return string
   */
  public function get_vocabularyName() {
    return $this->vocabularyName;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_vocabularyName() {
    return (isset($this->vocabularyName) && !empty($this->vocabularyName));
  } 
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if($this->isset_binaryData() && $this->isset_XMLData()) {
      $message = 'XMLData and binaryData and binary data cannot both be defined '.
              'in '.__FILE__.' line: '.__LINE__.'.';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $metadataWrap = $dom->createElement('metadataWrap');
    if($this->isset_mimeType()) {$metadataWrap->setAttribute('mimeType', $this->mimeType);}
    if($this->isset_textInfo()) {$metadataWrap->setAttribute('textInfo', $this->textInfo);}
    if($this->isset_vocabularyName()) {$metadataWrap->setAttribute('vocabularyName', $this->vocabularyName);}
    
    if($this->isset_XMLData()) {
      $metadataWrap->appendChild($dom->importNode($this->xmlData->get_as_DOM(), TRUE));
    }
    
    if($this->isset_binaryData()) {
      $metadataWrap->appendChild($binaryData = $dom->createElement('binaryData'));
      $binaryData->appendChild($dom->createTextNode($this->binaryData));
    }
    
    return $metadataWrap;
  }
}

?>
