<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * XFDUType Complex Type. A XFDU document consists of five possible subsidiary 
 * sections: packageHeader (XFDU document header), informationPackageMap 
 * (content unit section), metadataSection (container for metadata objects), 
 * dataObjectSection (data object section),behaviorSection (behavior section). 
 * It also has possible attributes: 1. ID (an XML ID); 2. objID: a primary 
 * identifier assigned to the original source document; 3. textInfo: a 
 * title/text string identifying the document for users; 4. version: version to 
 * which this XFDU document conforms
 *
 * @author Rob Olendorf
 * 
 */
class XFDU extends aXMLElement{
  /**
   * Id for the package
   * @var string
   */
  protected $id;

  /**
   * A primary identifier assigned to the original source documen
   * @var string
   */
  protected $objID;

  /**
   * Human readable text infor for the package
   * @var string
   */
  protected $textInfo;

  /**
   * XFDU version. The default is the most recent XFDU release, as of 11/3/2011
   * thats 1.0.
   * @var float
   */
  protected $version;

  /**
   * @var PackageHeader
   */
  protected $packageHeader;

  /**
   *
   * @var InformationPackageMap
   */
  protected $informationPackageMap;

  /**
   *
   * @var MetadataSection
   */
  protected $metadataSection;

  /**
   *
   * @var DataObjectSection
   */
  protected $dataObjectSection;

  /**
   *
   * @var DataObjectSection
   */
  protected $behaviorSection;

  /**
   * Sets default version to the most recent XFDU version
   */
  public function  __construct() {
    $this->version = 1.0;
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
   * @param string $objID
   */
  public function set_objID($objID) {
    $this->objID = $objID;
  }

  /**
   *
   * @return string
   */
  public function get_objID() {
    return $this->objID;
  }

  /**
   *
   * @return boolean
   */
  public function isset_objID() {
    return (isset($this->objID) && !empty($this->objID));
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
   * @param float $version
   */
  public function set_version($version) {
    $this->version = $version;
  }

  /**
   *
   * @return float
   */
  public function get_version() {
    return $this->version;
  }

  /**
   *
   * @return boolean
   */
  public function isset_version() {
    return (isset($this->version) && !empty($this->version));
  }

  /**
   *
   * @param PackageHeader $packageheader
   */
  public function set_packageHeader(PackageHeader $packageHeader) {
    $this->packageHeader = $packageHeader;
  }

  /**
   *
   * @return PackageHeader
   */
  public function get_packageHeader() {
    return $this->packageHeader;
  }

  /**
   *
   * @return boolean
   */
  public function isset_packageHeader() {
    return (isset($this->packageHeader) && !empty($this->packageHeader));
  }

  /**
   *
   * @param InformationPackageMap $informationPackageMap 
   */
  public function set_informationPackageMap(InformationPackageMap $informationPackageMap) {
    $this->informationPackageMap = $informationPackageMap;
  }

  /**
   *
   * @return InformationPackageMap
   */
  public function get_informationPackageMap() {
    return $this->informationPackageMap;
  }

  /**
   *
   * @return boolean
   */
  public function isset_informationPackageMap() {
    return (isset($this->informationPackageMap) && !empty($this->informationPackageMap));
  }
  
  /**
   *
   * @param MetaDataSection $metadataSection 
   */
  public function set_metadataSection(MetaDataSection $metadataSection) {
    $this->metadataSection = $metadataSection;
  }
  
  /**
   *
   * @return MetadataSection
   */
  public function get_metadataSection() {
    return $this->metadataSection;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_metadataSection() {
    return (isset($this->metadataSection) && !empty($this->metadataSection));
  }
  
  /**
   *
   * @param DataObjectSection $dataObjectSection 
   */
  public function set_dataObjectSection(DataObjectSection $dataObjectSection) {
    $this->dataObjectSection = $dataObjectSection;
  }
  
  /**
   *
   * @return DataObjectSection
   */
  public function get_dataObjectSection() {
    return $this->dataObjectSection;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectSection() {
    return (isset($this->dataObjectSection) && !empty($this->dataObjectSection));
  }
  
  /**
   *
   * @param BehaviorSection $behaviorSection 
   */
  public function set_behaviorSection(BehaviorSection $behaviorSection) {
    $this->behaviorSection = $behaviorSection;
  }
  
  /**
   *
   * @return BehaviorSection
   */
  public function get_behaviorSection() {
    return $this->behaviorSection;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_behaviorSection() {
    return (isset($this->behaviorSection) && !empty($this->behaviorSection));
  }
}
?>
