<?php

require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of MetadataWrap
 *
 * @author Rob
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
}

?>
