<?php
/**
 * The Information Package Map outlines a hierarchical structure for the 
 * original object being encoded, using a series of nested contentUnit elements. 
 * An element of informationPackageMapType has the following attributes: 
 * 1. ID: an XML ID for the element; 2. packageType: a type for the object. 
 * Typical values will be "AIP" for a map which describes a complete AIP obeying 
 * all constraints and cardinalities in the OAIS reference model. "SIP" for a 
 * map which describes a Submission Information Package. 3. textInfo: a string 
 * to describe the informationPackageMap to users. 4. anyAttribute - wild-carded 
 * attribute extension point Concrete implementations of abstractContentUnit 
 * (contentUnit etc.) must be used in the instance document.
 *
 * @author Rob Olendorf
 * 
 */
class InformationPackageMap extends aXMLElement{
  /**
   *
   * @var array<ContentUnit>
   */
  protected $contentUnits;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   *
   * @var string
   */
  protected $packageType;
  
  /**
   * 
   * @var string
   */
  protected $textInfo;

  /**
   * 
   */
  public function  __construct() {
    $this->contentUnits = array();
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

  /**
   *
   * @param string $packageType 
   */
  public function set_packageType($packageType) {
    $this->packageType = $packageType;
  }

  /**
   *
   * @return string 
   */
  public function get_packageType() {
    return $this->packageType;
  }

  /**
   *
   * @return boolean
   */
  public function isset_packageType() {
    return (isset($this->packageType) && !empty($this->packageType));
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
   * @todo add_contentUnit
   * @todo unset_contentUnits
   */
  /**
   *
   * @return array<ContentUnit> 
   */
  public function get_ContentUnits() {
    return $this->contentUnits;
  }

  /**
   *
   * @return boolean
   */
  public function isset_contentUnits() {
    return (isset($this->contentUnits) && !empty($this->contentUnits));
  }
}
?>
