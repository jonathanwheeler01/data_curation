<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of MetadataObject
 * 
 * @author Rob Olendorf
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
class MetadataObject extends aXFDUElement{
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
    $categories = new MetadataCategory();
    if($categories->has_value($category)) {
      $this->category = $category;
    }
    else {
      $message = 'Invalid metadata category given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The category must be one of '.  implode(', ', $categories->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
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
    $classes = new MetadataClassification();
    if($classes->has_value($classification)) {
      $this->classification = $classification;
    }
    else {
      $message = 'Invalid metadata classification given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The classification must be one of '.  implode(', ', $classes->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
    return $this;
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
    return $this;
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
    return $this;
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
    return $this;
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
    return $this;
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
  
  /**
   *
   * @param MetadataWrap $metadataWrap 
   */
  public function set_metadataWrap(MetadataWrap $metadataWrap) {
    $this->metadataWrap = $metadataWrap;
    return $this;
  }
  
  /**
   *
   * @return MetadataWrap 
   */
  public function get_metadataWrap() {
    return $this->metadataWrap;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_metadataWrap() {
    return (isset($this->metadataWrap) && !empty($this->metadataWrap));
  }  
  
  /**
   *
   * @param MetadataReference $metadataReference 
   */
  public function set_metadataReference(MetadataReference $metadataReference) {
    $this->metadataReference = $metadataReference;
    return $this;
  }
  
  /**
   *
   * @return MetadataReference 
   */
  public function get_metadataReference() {
    return $this->metadataReference;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_metadataReference() {
    return (isset($this->metadataReference) && !empty($this->metadataReference));
  }
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    if(!$this->isset_id()) {
      throw new RequiredElementException('ID');
    }
    
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $metadataObject = $dom->createElement($this->first_to_lower(get_class($this)));
    $metadataObject->setAttribute('ID', $this->id);
    
    if($this->isset_category()) {
      $categories = new MetadataCategory();
      if($categories->has_value($this->category)) {
        $metadataObject->setAttribute('category', $this->category);
      }
      else {
        $message = 'Invalid metadata category given on '.
                __CLASS__.': '.__METHOD__.': line '.__LINE__.
                '. The locator must be one of '.  implode(', ', $categories->values()).'.';
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code, $previous);
      }  
    }
    
    if($this->isset_classification()) {
      $classifications = new MetadataClassification();
      if($classifications->has_value($this->classification)) {
        $metadataObject->setAttribute('classification', $this->classification);
      }
      else {
        $message = 'Invalid metadata classification given on '.
                __CLASS__.': '.__METHOD__.': line '.__LINE__.
                '. The locator must be one of '.  implode(', ', $classifications->values()).'.';
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code, $previous);
      }
    }
    
    if($this->isset_otherCategory()) {
      $metadataObject->setAttribute('otherCategory', $this->otherCategory);
    }
    
    if($this->isset_otherClass()) {
      $metadataObject->setAttribute('otherClass', $this->otherClass);
    }
    
    if($this->isset_metadataReference()) {
      $metadataObject->appendChild($dom->importNode($this->metadataReference->get_as_DOM(), TRUE));
    }
    
    if($this->isset_metadataWrap()) {
      $metadataObject->appendChild($dom->importNode($this->metadataWrap->get_as_DOM(), TRUE));
    }
    
    if($this->isset_dataObjectPointer()) {
      $metadataObject->appendChild($dom->importNode($this->dataObjectPointer->get_as_DOM(), TRUE));
    }

    return $metadataObject;
  }
}

?>
