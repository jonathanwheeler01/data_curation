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
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of DataObjectPointer
 *
 * @author olendorf
 *
 */
class DataObjectPointer extends aXMLElement{
  /**
   *
   * @var type 
   */
  protected $dataObjectID;
  protected $id;
  
  /**
   *
   * @param string $dataObjectID 
   */
  public function set_dataObjectID($dataObjectID) {
    $this->dataObjectID = $dataObjectID;
  }
  
  /**
   *
   * @return string
   */
  public function get_dataObjectID() {
    return $this->dataObjectID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectID() {
    return (isset($this->dataObjectID) && !empty($this->dataObjectID));
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
    return(isset($this->id) && !empty($this->id));
  }
}
?>
