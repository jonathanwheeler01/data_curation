<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * An element of byteStreamType provides access to the current content of 
 * dataObjects for a XFDU document. The byteStreamType: has the following four 
 * attributes: ID (an XML ID); mimeType: the MIME type for the dataObject; size: 
 * the size of the dataObject in bytes. Checksum information provided via 
 * optional checksum element. The data contained in these attributes is relevant 
 * to final state of the data object after all possible transformations of the 
 * original data.
 *
 * @author Rob Olendorf
 */
class ByteStream extends aXFDUElement{
  /**
   *
   * @var ChecksumInformation
   */
  protected $checksum;
  
  /**
   *
   * @var FileContent
   */
  protected $fileContent;
  
  /**
   *
   * @var array<Reference>
   */
  protected $fileLocations;
  
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
   * @var integer
   */
  protected $size;
  
  public function __construct() {
    $this->fileLocations = array();
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
   *
   * @param FileContent $filecontent 
   */
  public function set_fileContent(FileContent $filecontent) {
    $this->fileContent = $filecontent;
  }
  
  /**
   *
   * @return FileContent
   */
  public function get_fileContent() {
    return $this->fileContent;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_fileContent() {
    return (isset($this->fileContent) && !empty($this->fileContent));
  }
  
  /**
   *
   * @param Reference $fileLocation 
   */
  public function add_fileLocation(Reference $fileLocation) {
    $this->fileLocations[] = $fileLocation;
  }
  
  
  /**
   *
   * @return array<Reference> 
   */
  public function get_fileLocations() {
    return $this->fileLocations;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_fileLocations() {
    return (isset($this->fileLocations) && !empty($this->fileLocations));
  }
  
  /**
   * 
   */
  public function unset_fileLocations() {
    $this->fileLocations = array();
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
   * @return boolean 
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
   * @param integer $size 
   */
  public function set_size($size) {
    if(is_int($size)) {
      $this->size = $size;
    }
    else {
      $message = 'Expected integer for $size in '.__CLASS__.': '.__METHOD__.'(Line '.__LINE__.').';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }
  
  /**
   *
   * @return integer
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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}

?>
