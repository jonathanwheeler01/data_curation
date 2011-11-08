<?php
/**
 * Description of TransformObject
 * An element of transformObjectType contains all of the information required 
 * to reverse the transformations applied to the original contents of the 
 * dataObject. It has two possible subsidiary elements: The algorithm element 
 * contains information about the algorithm used to encrypt the data. The 
 * key-derivation element contains the information that was used to derive the 
 * encryption key for this dataObject It has three attributes: 1. ID: an XML 
 * ID 2. transformType: one of n predefined transformations types. Current 
 * valid types are compression, encryption, authentication. 3. order: If there 
 * are more than one transformation elements in an dataObject this integer 
 * indicates the order in which the reversal transformations should be applied.
 *
 * @author Rob
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

class TransformObject extends aXMLElement{
  /**
   * Information used to derive the encryption key
   * @var array<KeyDerivations>
   */
  protected $keyDerivations;
  
  /**
   * Name of the transformation algorithm
   * @var string
   */
  protected $algorithm;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   * description of the order the transformations were applied if more than one
   * @var string 
   */
  protected $order;
  
  /**
   * Type of transformation
   * @var string
   */
  protected $transformType;

  public function  __construct() {
    $this->keyDerivations = array();
  }

  public function add_keyDerivation(KeyDerivation $keyDerivation) {
    $this->keyDerivations[] = $keyDerivation;
  }

  public function get_keyDerivations() {
    return $this->keyDerivations;
  }

  public function isset_keyDerivations() {
    return (isset($this->keyDerivations) && !empty($this->keyDerivations));
  }

  public function unset_keyDerivations() {
    $this->keyDerivations = array();
  }

  public function set_algorithm($algorithm) {
    $this->algorithm = $algorithm;
  }

  public function get_algorithm() {
    return $this->algorithm;
  }

  public function isset_algorithm() {
    return (isset($this->algorithm) && !empty($this->algorithm));
  }

  public function set_id($id) {
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new InvalidIDTokenException($id);
    }
  }

  public function get_id() {
    return $this->id;
  }

  public function isset_id() {
    return (isset($this->id) && !empty($this->id));
  }

  public function set_order($order) {
    $this->order = $order;
  }

  public function get_order() {
    return $this->order;
  }

  public function isset_order() {
    return (isset($this->order) && !empty($this->order));
  }

  public function set_transformType($transformType) {
    $this->transformType = $transformType;
  }

  public function get_transformType() {
    return $this->transformType;
  }

  public function isset_transformType() {
    return (isset($this->transformType) && !empty($this->transformType));
  }
}

?>
