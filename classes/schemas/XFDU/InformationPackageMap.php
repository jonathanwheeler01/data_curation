<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

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
class InformationPackageMap extends aXFDUElement{
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
   *
   * @param ContentUnit $contentUnit 
   */
  public function add_contentUnit($contentUnit) {
    $this->contentUnits[] = $contentUnit;
  }
  
  /**
   *
   * @param array<ContentUnit> $contentUnitList 
   */
  public function add_contentUnitList(array $contentUnitList) {
    $this->contentUnits = array_merge($this->contentUnits, $contentUnitList);
  }
  
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
  
  /**
   * 
   */
  public function unset_contentUnits() {
    $this->contentUnits = array();
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $informationPackageMap = $dom->createElement('informationPackageMap');
    
    if($this->isset_contentUnits()) {
      $contentUnits = $this->get_ContentUnits();
      $contentUnit = new ContentUnit();
      foreach($contentUnits as $contentUnit) {
        $informationPackageMap->appendChild($dom->importNode($contentUnit->get_as_DOM()));
      }
    }
    // Removed this to allow incomplete packagemaps. Because we verify that 
    // a root has been sent previously this is probably not required.
//    else {
//      throw new RequiredElementException('contentUnit');
//    }
    
    if($this->isset_id()) {
      $informationPackageMap->setAttribute('ID', $this->get_id());
    }
    
    if($this->isset_packageType()) {
      $informationPackageMap->setAttribute('packageType', $this->get_packageType());
    }
    
    if($this->isset_textInfo()) {
      $informationPackageMap->setAttribute('textInfo', $this->get_textInfo());
    }
    
    return $informationPackageMap;
  }
}
?>
