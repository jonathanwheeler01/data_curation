<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * An element of dataObjectType contains current byteStream content and any 
 * required data to restore them to the form intended for the original 
 * designated community. It has two possible subsidiary elements: The byteStream 
 * element provides access to the current content dataObjects for an XFDU 
 * document. An element of dataObjectType must contain 1 or many byteStream 
 * elements that may contain a fileLocation element, which provides a pointer 
 * to a content byteStream, and/or a fileContent element, which wraps an encoded 
 * version of the dataObject. An element of dataObjectType may contain one or 
 * more transformation elements that contain all of the information required to 
 * reverse each transformation applied to the dataObject and return the original 
 * binary data object. The dataObjectType has the following attributes: 
 * 1. ID: an XML ID 2. mimeType: the MIME type for the dataObject 
 * 3. size: the size of the dataObject in bytes 4. checksum: a checksum for 
 * dataObject. Checksum information provided via optional checksum element. 
 * 5. repID list of representation metadata IDREFs. NB: The size, checksum, and 
 * mime type are related to the original data before any transformations occurred. 
 * 6. combinationName - specifies how multiple byteStream objects in a single 
 * dataObject should be concatenated 7. registrationGroup attribute group that 
 * provides registration information
 *
 * @author Rob Olendorf
 */
class DataObject extends aXFDUElement{  
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
   */
  public function unset_bytestreams() {
    $this->byteStreams = array();
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
   * @param string $combinationName 
   */
  public function set_combinationName($combinationName) {
    $combinationMethods = new CombinationMethod();
    if($combinationMethods->has_value($combinationName)) {
      $this->combinationName =$combinationName;
    }
    else {
      $message = 'Invalid value for CombinationMethod found at'.__CLASS__.': '.
              __METHOD__.': '.__LINE__.'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
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
      throw new InvalidIDTokenException($id);
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
      $this->repId = $repId;
    }
    else {
      throw new InvalidIDTokenException($repId);
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
    if(is_int($size) && $size >= 0) {
      $this->size = $size;
    }
    else {
      $message = 'Expected integer for $size in '.__CLASS__.': '.__METHOD__.'('.__LINE__.').';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
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
