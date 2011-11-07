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
 * Description of Reference
 *
 * @author olendorf
 *
 */
class Reference extends aXMLElement{
  protected $href;
  protected $id;
  protected $locator;
  protected $locatorType;
  protected $otherLocatorType;
  protected $textInfo;
  
  /**
   *
   * @param string $href 
   */
  public function set_href($href) {
    $this->href = $href;
  }
  
  /**
   *
   * @return string 
   */
  public function get_href() {
    return $this->href;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_href() {
    return (isset($this->href) && !empty($this->href));
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
   * @param string $locator 
   */
  public function set_locator($locator) {
    $this->locator = $locator;
  }
  
  /**
   *
   * @return string
   */
  public function get_locator() {
    return $this->locator;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_locator() {
    return (isset($this->locator) && !empty($this->locator));
  }
  
  /**
   * If a specified locator type is not given, other locator type is used.
   * @param enum $locatorType 
   */
  public function set_locatorType($locatorType) {
    if(array_search($locatorType, Locator::values())) {
      $this->locatorType = $locatorType;
    }
    else {
      $this->locatorType = Locator::OTHER;
      $this->otherLocatorType = $locatorType;
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_locatorType() {
    return $this->locatorType;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_locatorType() {
    return (isset($this->locatorType) && !empty($this->locatorType));
  }
  
  /**
   *
   * @param string $otherLocatorType 
   */
  public function set_otherLocatorType($otherLocatorType) {
    $this->otherLocatorType = $otherLocatorType;
  }
  
  /**
   *
   * @return string 
   */
  public function get_otherLocatorType() {
    return $this->otherLocatorType;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_otherLocatorType() {
    return (isset($this->otherLocatorType) && !empty($this->otherLocatorType));
  }
  
  public function set_textInfo($textInfo) {
    $this->textInfo = $textInfo;
  }
  
  public function get_textInfo() {
    return $this->textInfo;
  }
  
  public function isset_textInfo() {
    return (isset($this->textInfo) && !empty($this->textInfo));
  }
}
?>
