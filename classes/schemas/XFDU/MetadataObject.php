<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of MetadataObject
 * @todo Figure out why MetdataObject isn't testing.
 * @author Rob
 */

/**
 * A generic framework for pointing to/including metadata within a XFDU 
 * document, a la Warwick Framework. An metadataObject element may have the 
 * following attributes: 1. ID: an XML ID for this element. 
 * 2. classification - concrete type of metadata represented by this element 
 * of metadataObjectType 3. category - type of metadata class to which this 
 * metadata belongs (e.g., DMD.REP, etc.) 4. otherClass - type of metadata in 
 * case classification contains value of "OTHER" 5. otherCategory - type of 
 * metadata class in case category contains value of "OTHER"
 */
class MetadataObject extends aXMLElement{
  /**
   * Should be defined from the MetadataCategory Object.
   * @var string
   */
  protected $category;
  
  /**
   * Should be defined from the MetadataClassification Object.
   * @var string 
   */
  protected $classification;
  
  /**
   * Allows use of data objects as metadata
   * @var DataObjectPointer
   */
  protected $dataObjectPointer;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   * Provide a pointer to metadata which resides outside the XFDU document.
   * @var MetadataReference 
   */
  protected $metadataReference;
  
  /**
   * Allows the encoder to place arbitrary metadata conforming to other standards/schema within a XFDU document.
   * @var MetadataWrap
   */
  protected $metadataWrap;
  
  /**
   * Allows encoders to specify other metadata categories.
   * 
   * @var string
   */
  protected $otherCategory;
  
  /**
   * Allows encoders to specify other metadata classifications.
   * @var string
   */
  protected $otherClass;
  
  /**
   * Should be derived from the metadata category class. Otherwise sets "other category" instead.
   * @param string $category 
   */
  public function set_category($category) {
    $this->category = $category;
  }
  
  /**
   *
   * @return string 
   */
  public function get_category() {
    return $this->category;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_category() {
    return (isset($this->category) && !empty($this->category));
  }
  
  /**
   * Should be drawn frm the MetadataClassification enum class. Otherwise
   * the otherClass attribute will be set instead.
   * @param string $classification 
   */
  public function set_classification($classification) {
    $this->classification = $classification;
  }
  
  /**
   *
   * @return string
   */
  public function get_classification() {
    return $this->classification;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_classification() {
    return (isset($this->classification) && !empty($this->classification));
  }
  
  /**
   *
   * @param string $otherCategory 
   */
  public function set_otherCategory($otherCategory) {
    $this->otherCategory = $otherCategory;
  }
  
  /**
   *
   * @return string 
   */
  public function get_otherCategory() {
    return $this->otherCategory;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_otherCategory() {
    return(isset($this->otherCategory) && !empty($this->otherCategory));
  }
  
  /**
   *
   * @param string $otherClass 
   */
  public function set_otherClass($otherClass) {
    $this->otherClass = $otherClass;
  }
  
  /**
   *
   * @return string 
   */
  public function get_otherClass() {
    return $this->otherClass;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_otherClass() {
    return (isset($this->otherClass) && !empty($this->otherClass));
  }
  
  /**
   *
   * @param DataObjectPointer $dataObjectPointer 
   */
  public function set_dataObjectPointer(DataObjectPointer $dataObjectPointer) {
    $this->dataObjectPointer = $dataObjectPointer;
  }
  
  /**
   *
   * @return DataObjectPointer 
   */
  public function get_dataObjectPointer() {
    return $this->dataObjectPointer;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectPointer() {
    return (isset($this->dataObjectPointer) && !empty($this->dataObjectPointer));
  }
  
  /**
   *
   * @param string $id 
   */
  public function set_id($id) {
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new InvalidIDTokenException($id);
    }
  }
  
  /**
   *
   * @return string
   */
  public function get_id() {
    return $this->id;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }
  
  public function set_metadataWrap(MetadataWrap $metadataWrap) {
    $this->metadataWrap = $metadataWrap;
  }
  
  public function get_metadataWrap() {
    return $this->metadataWrap;
  }
  
  public function isset_metadataWrap() {
    return (isset($this->metadataWrap) && !empty($this->metadataWrap));
  }
}

?>
