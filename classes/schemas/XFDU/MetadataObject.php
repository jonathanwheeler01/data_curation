<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MetadataObject
 *
 * @author Rob
 */

abstract class MetadataCategory implements Enum{
  protected $category;
  
  const OTHER = 'OTHER';
  const ANY = 'ANY';
  const DMD = 'DMD';
  const PDI = 'PDI';
  const REP = 'REP';
  
  static public function values() {
    return array(self::ANY, self::DMD, self::OTHER, self::PDI, self::REP);
  }
}

abstract class MetadataClassification {
  protected $classification; 


  const OTHER = 'OTHER';
  const CONTEXT = 'CONTEXT';
  const DED = 'DED';
  const DESCRIPTION = 'DESCRIPTOIN';
  const FIXITY = 'FIXITY';
  const PROVENANCE = 'PROVENANCE';
  const REFERENCE = 'REFERENCE';
  const SYNTAX = 'SYNTAX';
  
  static public function values() {
    return array(self::CONTEXT,
        self::DED,
        self::DESCRIPTION,
        self::FIXITY,
        self::OTHER,
        self::PROVENANCE,
        self::REFERENCE,
        self::SYNTAX,
        );
  }
}

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
    if(array_search($category, MetadataCategory::values())) {
      $this->category = $category;
    }
    else {
      $this->otherCategory = $category;
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
    if(array_search($classification, MetadataClassification::values())) {
      $this->classification = $classification;
    }
    else {
      $this->otherClass = $classification;
    }
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
    $this->id = $id;
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
