<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Complex Type for metadata about the mapping of the logical packages to the 
 * physical structures. The package header type has two elements: -volumeInfo ? 
 * contains XFDU volume related metadata (.i.e., XFDU specification version and 
 * sequence information - environmentInfo contains application specific 
 * information either defined by an extension of the XFDU Schema or by 
 * freeform XML. packageHeaderType has a single attribute, ID: an XML ID.
 *
 * @author Rob Olendorf
 *
 */
class PackageHeader extends aXFDUElement{
  /**
   *
   * @var VolumeInfo
   */
  protected $volumeInfo;

  /**
   *
   * @var EnvironmentInfo
   */
  protected $environmentInfo;

  /**
   *
   * @var string
   */
  protected $id;

  public function  __construct() {
  }

  /**
   *
   * @param EnvironmentInfo $environmentInfo
   */
  public function set_environmentInfo(EnvironmentInfo $environmentInfo) {
    $this->environmentInfo = $environmentInfo;
  }

  /**
   *
   * @return EnvironmentInfo
   */
  public function get_environmentInfo() {
    return $this->environmentInfo;
  }

  /**
   *
   * @return boolean
   */
  public function isset_environmentInfo() {
    return (isset($this->environmentInfo) && !empty($this->environmentInfo));
  }

  /**
   *
   * @param VolumeInfo $volumeInfo
   */
  public function set_volumeInfo(VolumeInfo $volumeInfo) {
    $this->volumeInfo = $volumeInfo;
  }

  /**
   *
   * @return VolumeInfo
   */
  public function get_volumeInfo() {
    return $this->volumeInfo;
  }

  /**
   *
   * @return boolean
   */
  public function isset_volumeInfo() {
    return (isset($this->volumeInfo) && !empty($this->volumeInfo));
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
    return (isset ($this->id) && !empty ($this->id));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}
?>
