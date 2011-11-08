<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataObject
 *
 * @author Rob
 */
class DataObject extends aXMLElement{  
  /**
   * Access to content of dataObjects.
   * @var ByteStream
   */
  protected $byteStreams;
  
  /**
   *
   * @var ChecksumInformation
   */
  protected $checksum;
  
  /**
   *
   * @var string 
   */
  protected $combinationName;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   *
   * @var string
   */
  protected $mimeType;
  
  /**
   *
   * @var string
   */
  protected $registeredID;
  
  /**
   *
   * @var string
   */
  protected $registrationAuthority;
  
  /**
   *
   * @var string
   */
  protected $repId;
  
  /**
   *
   * @var string
   */
  protected $size;
  
  /**
   *
   * @var TransformObject
   */
  protected $transformObject;
  
  /**
   * 
   */
  public function __construct() {
    $this->byteStreams = array();
  }
  
  /**
   *
   * @param ByteStream $bytestream 
   */
  public function add_bytstream(ByteStream $bytestream) {
    $this->byteStreams[] = $bytestream;
  }
  
  /**
   *
   * @return ByteStream
   */
  public function get_bytestreams() {
    return $this->byteStreams;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_bytestreams() {
    return (isset($this->byteStreams) && !empty($this->byteStreams));
  }
  
  /**
   *
   * @param ChecksumInformation $checksum
   */
  public function set_checksum(ChecksumInformation $checksum) {
    $this->checksum = $checksum;
  }
  
  /**
   *
   * @return ChecksumInformation
   */
  public function get_checksum() {
    return $this->checksum;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_checksum() {
    return (isset($this->checksum) && !empty($this->checksum));
  }
  
  /**
   * Should be drawn from the CombinationMethod enum class
   * @param string $combinationName 
   */
  public function set_combinationName($combinationName) {
    $this->combinationName =$combinationName;
  }
  
  /**
   *
   * @return string
   */
  public function get_combinationName() {
    return $this->combinationName;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_combinationName() {
    return (isset($this->combinationName) && !empty($this->combinationName));
  }

  /**
   *
   * @param string $id 
   */
  public function set_id($id) {
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new XFDUException('Invalid ID token specified.', 0);
    }
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
   * @return type boolean
   */
  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }

  /**
   *
   * @param string $mimeType 
   */
  public function set_mimeType($mimeType) {
    $this->mimeType = $mimeType;
  }
  
  /**
   *
   * @return string
   */
  public function get_mimeType() {
    return $this->mimeType;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_mimeType() {
    return (isset($this->mimeType) && !empty($this->mimeType));
  }
  
  /**
   *
   * @param string $registeredID 
   */
  public function set_registeredID($registeredID) {
    $this->registeredID = $registeredID;
  }
  
  /**
   *
   * @return string 
   */
  public function get_registeredID() {
    return $this->registeredID;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_registeredID() {
    return (isset($this->registeredID) && !empty($this->registeredID));
  }
  
  /**
   *
   * @param string $registrationAuthority 
   */
  public function set_registrationAuthority($registrationAuthority) {
    $this->registrationAuthority = $registrationAuthority;
  }
  
  /**
   *
   * @return string
   */
  public function get_registrationAuthority() {
    return $this->registrationAuthority;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_registrationAuthority() {
    return (isset($this->registrationAuthority) && !empty($this->registrationAuthority));
  }
  
  /**
   *
   * @param string $repId 
   */
  public function set_repID($repId) {
    if($this->validate_id($repId)) {
      $this->id = $repId;
    }
    else {
      throw new XFDUException('Invalid ID token specified.', 0);
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_repID() {
    return $this->repId;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_repID() {
    return (isset($this->repId) && !empty($this->repId));
  }
  
  /**
   *
   * @param long $size 
   */
  public function set_size($size) {
    if(is_int($size)) {
      $this->size = $size;
    }
    else {
      throw new XFDUException('Invalid size specified. Expected int or long.', $code, $previous);
    }
  }
  
  /**
   *
   * @return long 
   */
  public function get_size() {
    return $this->size;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_size() {
    return (isset($this->size) && !empty($this->size));
  }
  
  /**
   *
   * @param TransformObject $transformObject 
   */
  public function set_transformObject(TransformObject $transformObject) {
    $this->transformObject = $transformObject;
  }
  
  /**
   *
   * @return TransformObject 
   */
  public function get_transformObject() {
    return $this->transformObject;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_transformObject() {
    return (isset($this->transformObject) && !empty($this->transformObject));
  }
}

?>
