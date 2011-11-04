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
 * Description of ContentUnit
 *
 * @author olendorf
 * 
 */
class ContentUnit {
  /**
   * An array of the content units held in this contentn unit.
   * @var array
   */
  protected $abstractContentUnit;

  /**
   * Catch all metadata reference.
   * @var string
   */
  protected $anyMdID;
  protected $behaviorID;
  protected $dataObjectPointer;
  protected $dmdID;
  protected $extension;
  protected $id;
  protected $order;
  protected $pdiMD;
  protected $repID;
  protected $textInfo;
  protected $unitType;
  protected $xfduPointer;

  public function  __construct() {
    $this->abstractContentUnit = array();
  }

  /**
   *
   * @return array
   */
  public function get_abstractContentUnit() {
    return $this->abstractContentUnit;
  }

  /**
   *
   * @return boolean
   */
  public function isset_abstractContentUnit() {
    return (isset($this->abstractContentUnit) && !empty($this->abstractContentUnit));
  }

  /**
   *
   * @param string $anyMdID
   */
  public function set_anyMdID($anyMdID) {
    $this->anyMdID = $anyMdID;
  }

  /**
   *
   * @return string
   */
  public function get_anyMdID() {
    return $this->anyMdID;
  }

  /**
   *
   * @return boolean
   */
  public function isset_anyMdID() {
    return (isset($this->anyMdID) && !empty($this->anyMdID));
  }

  public function set_behaviorID($behaviorID) {
    $this->behaviorID = $behaviorID;
  }

  public function get_behaviorID() {
    return $this->behaviorID;
  }

  public function isset_behaviorID() {
    return (isset($this->behaviorID) && !empty($this->behaviorID));
  }

  /**
   * @todo implement dataobjectpoint
   * @todo dmdID
   * @todo extension
   * @todo id
   * @todo order
   * @todo pdiMD
   * @repID
   * @textInfo
   * @unitType
   * @xfduPointer
   */
}
?>
