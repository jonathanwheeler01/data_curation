<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Contains XFDU software related system information, including one mandatory 
 * element - specificationVersion, which specifies the version of the XFDU 
 * specification to which this manifest complies. Additionally it has one 
 * optional element -sequenceInformation that holds information about the 
 * sequence of XFDUs and the position of the current one in it.
 *
 * @author Rob Olendorf
 *
 */
class VolumeInfo extends aXFDUElement{
  /**
   * Storoes a SequenceInformation object that specifies the XFDU's position
   * in a series of XFDU packages.
   * @var SequenceInformation
   */
  protected $sequenceInformation;

  /**
   * The version of the XFDU schema used.
   * @var float
   */
  protected $specificationInformation;

  /**
   * Sets the default specification to the most current.
   */
  public function  __construct() {
    $this->specificationInformation = 1.0;
  }

  /**
   * @param SequenceInformation $sequenceInformation
   */
  public function set_sequenceInformation(SequenceInformation $sequenceInformation) {
    $this->sequenceInformation = $sequenceInformation;
  }

  /**
   *
   * @return SequenceInformation>
   */
  public function get_sequenceInformation() {
    return $this->sequenceInformation;
  }

  /**
   *
   * @return boolean
   */
  public function isset_sequenceInformation() {
    return (isset($this->sequenceInformation) &&
            !empty($this->sequenceInformation));
  }

  /**
   *
   * @param float $version
   */
  public function set_specificationVersion($version) {
    $this->specificationInformation = $version;
  }

  /**
   *
   * @return float
   */
  public function get_specificationVersion() {
    return $this->specificationInformation;
  }

  /**
   *
   * @return boolean
   */
  public function isset_specificationVersion() {
    return (isset($this->specificationInformation) &&
            !empty($this->specificationInformation));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
  
}
?>
