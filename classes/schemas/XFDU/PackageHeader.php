<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
 * Description of PackageHeader
 *
 * @author olendorf
 *
 */



/**
 * Description of PackageHeader
 *
 * @author olendorf
 * 
 */
class PackageHeader {
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
    return (isset ($this->id) && !empty ($this->id));
  }
}
?>
