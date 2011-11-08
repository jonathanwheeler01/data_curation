<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ByteStream
 *
 * @author Rob
 */
class ByteStream extends aXMLElement{
  protected $checksum;
  protected $fileContent;
  protected $fileLocations;
  protected $id;
  protected $mimeType;
  protected $size;
  
  public function __construct() {
    $this->fileLocations = array();
  }
  
  public function set_checksum(ChecksumInformation $checksum) {
    $this->checksum = $checksum;
  }
  
  public function get_checksum() {
    return $this->checksum;
  }
  
  public function isset_checksum() {
    return (isset($this->checksum) && !empty($this->checksum));
  }
  
  public function set_fileContent(FileContent $filecontent) {
    $this->fileContent = $filecontent;
  }
  
  public function get_fileContent() {
    return $this->fileContent;
  }
  
  public function isset_fileContent() {
    return (isset($this->fileContent) && !empty($this->fileContent));
  }
  
  public function add_fileLocation(Reference $fileLocation) {
    $this->fileLocations[] = $fileLocation;
  }
  
  public function get_fileLocations() {
    return $this->fileLocations;
  }
  
  public function isset_fileLocations() {
    return (isset($this->fileLocations) && !empty($this->fileLocations));
  }
  
  public function unset_fileLocations() {
    $this->fileLocations = array();
  }
  
  public function set_id($id) {
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new XFDUException('Invalid ID token: '.$id, 0);
    }
  }
  
  public function get_id() {
    return $this->id;
  }
  
  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }
  
  public function set_mimeType($mimeType) {
    $this->mimeType = $mimeType;
  }
  
  public function get_mimeType() {
    return $this->mimeType;
  }
  
  public function isset_mimeType() {
    return (isset($this->mimeType) && !empty($this->mimeType));
  }
  
  public function set_size($size) {
    if(is_int($size)) {
      $this->size = $size;
    }
    else {
      throw new XFDUException('Invalid size specified ('.$size.'). Expecting a Long or Integer.', 0);
    }
  }
  
  public function get_size() {
    return $this->size;
  }
  
  public function isset_size() {
    return (isset($this->size) && !empty($this->size));
  }
}

?>
