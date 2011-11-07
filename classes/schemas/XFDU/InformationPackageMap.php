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
 * Description of InformationPackageMap
 *
 * @author olendorf
 * 
 */
class InformationPackageMap extends aXMLElement{
  protected $abstractContentUnit;
  protected $id;
  protected $packageType;
  protected $textInfo;

  public function  __construct() {
    $this->abstractContentUnit = array();
  }

  public function set_id($id) {
    $this->id = $id;
  }

  public function get_id() {
    return $this->id;
  }

  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }

  public function set_packageType($packageType) {
    $this->packageType = $packageType;
  }

  public function get_packageType() {
    return $this->packageType;
  }

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

  public function get_abstractContentUnit() {
    return $this->abstractContentUnit;
  }

  public function isset_abstractContentUnit() {
    return (isset($this->abstractContentUnit) && !empty($this->abstractContentUnit));
  }
}
?>
