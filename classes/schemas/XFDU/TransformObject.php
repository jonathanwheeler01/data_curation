<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

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
 * s for now unimplimented as there seems no place for it in the published schema.
 *
 * @author Rob Olendorf
 */
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

  /**
   * 
   */
  public function  __construct() {
    $this->keyDerivations = array();
  }

  /**
   *
   * @param KeyDerivation $keyDerivation 
   */
  public function add_keyDerivation(KeyDerivation $keyDerivation) {
    $this->keyDerivations[] = $keyDerivation;
  }

  /**
   *
   * @return array<KeyDerivation>
   */
  public function get_keyDerivations() {
    return $this->keyDerivations;
  }

  /**
   *
   * @return boolean
   */
  public function isset_keyDerivations() {
    return (isset($this->keyDerivations) && !empty($this->keyDerivations));
  }

  /**
   * 
   */
  public function unset_keyDerivations() {
    $this->keyDerivations = array();
  }

  /**
   *
   * @param string $algorithm 
   */
  public function set_algorithm($algorithm) {
    $this->algorithm = $algorithm;
  }

  /**
   *
   * @return string 
   */
  public function get_algorithm() {
    return $this->algorithm;
  }

  /**
   *
   * @return boolean 
   */
  public function isset_algorithm() {
    return (isset($this->algorithm) && !empty($this->algorithm));
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
   * @param type $transformType 
   */
  public function set_transformType($transformType) {
    $enum = new TransformType();
    if($enum->has_value($transformType)) {
      $this->transformType = $transformType;
    }
    else {
      $message = 'Invalid transformation type given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The transformation types must be one of '.  implode(', ', $enum->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }

  /**
   *
   * @return string 
   */
  public function get_transformType() {
    return $this->transformType;
  }

  /**
   *
   * @return boolean 
   */
  public function isset_transformType() {
    return (isset($this->transformType) && !empty($this->transformType));
  }  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    throw new UnimplementedMethodException(__CLASS__, __METHOD__);
  }
}

?>
