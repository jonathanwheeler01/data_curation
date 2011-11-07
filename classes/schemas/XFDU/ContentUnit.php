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
class ContentUnit extends aXMLElement{
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

  /**
   *
   * @param string $behaviorID 
   */
  public function set_behaviorID($behaviorID) {
    $this->behaviorID = $behaviorID;
  }

  /**
   *
   * @return string
   */
  public function get_behaviorID() {
    return $this->behaviorID;
  }

  /**
   *
   * @return boolean
   */
  public function isset_behaviorID() {
    return (isset($this->behaviorID) && !empty($this->behaviorID));
  }
  
  /**
   *
   * @param DataObjectPointer $dataObjectPointer 
   */
  public function set_dataObjectPointer(DataObjectPointer $dataObjectPointer) {
    $this->dataObjectPointer = $dataObjectPointer;
  }
  
  /**
   *
   * @return DataObjectPointer
   */
  public function get_dataObjectPointer() {
    return $this->dataObjectPointer;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectPointer() {
    return (isset($this->dataObjectPointer) && !empty($this->dataObjectPointer));
  }
  
  /**
   *
   * @param string $dmdID 
   */
  public function set_dmdID($dmdID) {
    $this->dmdID = $dmdID;
  }
  
  /**
   *
   * @return string
   */
  public function get_dmdID() {
    return $this->dmdID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dmdID() {
    return (isset($this->dmdID) && !empty($this->dmdID));
  }
  
  /**
   *
   * @param any $extension 
   */
  public function set_extension($extension) {
    $this->extension = $extension;
  }
  
  /**
   *
   * @return any
   */
  public function get_extension() {
    return $this->extension;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_extension() {
    return (isset($this->extension) && !empty($this->extension));
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
   * @param string $order 
   */
  public function set_order($order) {
    $this->order = $order;
  }
  
  /**
   *
   * @return string 
   */
  public function get_order() {
    return $this->order;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_order() {
    return (isset($this->order) && !empty($this->order));
  }
  
  /**
   *
   * @param string $pdiID 
   */
  public function set_pdiID($pdiID) {
    $this->pdiMD = $pdiID;
  }
  
  /**
   *
   * @return string 
   */
  public function get_pdiID() {
    return $this->pdiMD;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_pdiID() {
    return (isset($this->pdiMD) && !empty($this->pdiMD));
  }
  
  /**
   *
   * @param string $repID 
   */
  public function set_repID($repID) {
    $this->repID = $repID;
  }
  
  /**
   *
   * @return string
   */
  public function get_repID() {
    return $this->repID;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_repID() {
    return (isset($this->repID) && !empty($this->repID));
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
   * @param string $unitType 
   */
  public function set_unitType($unitType) {
    $this->unitType = $unitType;
  }
  
  /**
   *
   * @return string
   */
  public function get_unitType() {
    return $this->unitType;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_unitType() {
    return (isset($this->unitType) && !empty($this->unitType));
  }
  
  public function set_xfduPointer (Reference $xfduPointer) {
    $this->xfduPointer = $xfduPointer;
  }
  
  public function get_xfduPointer() {
    return $this->xfduPointer;
  }
  
  public function isset_xfduPointer() {
    return (isset($this->xfduPointer) && !empty($this->xfduPointer));
  }
}
?>
