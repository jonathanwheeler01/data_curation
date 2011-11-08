<?php
/**
 * Description of VolumeInfo. Stores the information for the VolumeInfo element
 * in an XFDU package.
 *
 * @author olendorf
 *
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

class VolumeInfo extends aXMLElement{
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
  
}
?>
