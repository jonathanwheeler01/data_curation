<?php
/* 
 *    This file is part of data_curation.

 *    data_curation is free software: you can redistribute it and/or modify
 *    it under the terms of the Apache License, Version 2.0 (See License at the
 *    top of the directory).

 *    data_curation is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

 *    You should have received a copy of the Apache License, Version 2.0
 *    along with data_curation.  If not, see <http://www.apache.org/licenses/LICENSE-2.0.html>.
 */

/**
 * Description of VolumeInfo. Stores the information for the VolumeInfo element
 * in an XFDU package.
 *
 * @author olendorf
 *
 */
class VolumeInfo {
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
