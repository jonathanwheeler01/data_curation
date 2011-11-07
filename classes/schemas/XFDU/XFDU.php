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
 * Description of XFDU
 *
 * @author olendorf
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
  protected $behaviorSections;

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

  public function set_informationPackageMap(InformationPackageMap $informationPackageMap) {
    $this->informationPackageMap = $informationPackageMap;
  }

  public function get_informationPackageMap() {
    return $this->informationPackageMap;
  }

  public function isset_informationPackageMap() {
    return (isset($this->informationPackageMap) && !empty($this->informationPackageMap));
  }
}
?>
