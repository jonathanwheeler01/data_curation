<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';


/**
 * Description of SequenceInformation. Stores XDFU sequence information data.
 * Implemented as a Bean type data structure with public Class attributes.
 *
 * @author Rob Olendorf
 *
 */
class SequenceInformation extends aXFDUElement{
  /**
   * The XFDU's position in the sequence. The value should be zero if unknown.
   * @var integer
   */
  protected  $sequencePosition;

  /**
   * The total number of XFDU packages in the sequence. The value should be
   * zero if unknown.
   * @var integer
   */
  protected $sequenceSize;

  /**
   * A readable expression of the Sequence Information.
   * @var string
   */
  protected  $value;
  
  /**
   *
   * @param integer $sequencePosition 
   */
  public function set_sequencePosition($sequencePosition) {
    if(is_integer($sequencePosition) && $sequencePosition > 0) {
      $this->sequencePosition = $sequencePosition;
    }
    else {
      $message = 'Sequence Position must be a non-negative integer.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }
  
  /**
   *
   * @return integer 
   */
  public function get_sequencePosition() {
    return $this->sequencePosition;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_sequencePosition() {
    return (isset($this->sequencePosition) && !empty($this->sequencePosition));
  }
  
  /**
   *
   * @param integer $sequenceSize 
   */
  public function set_sequenceSize($sequenceSize) {
    if(is_integer($sequenceSize) && $sequenceSize > 0) {
      $this->sequenceSize = $sequenceSize;
    }
    else {
      $message = 'Sequence size must be a non-negative integer.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }
  
  /**
   *
   * @return integer 
   */
  public function get_sequenceSize() {
    return $this->sequenceSize;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_sequenceSize() {
    return (isset($this->sequenceSize) && !empty($this->sequenceSize));
  }
  
  /**
   *
   * @param string $value 
   */
  public function set_value($value) {
    $this->value = $value;
  }
  
  /**
   *
   * @return string 
   */
  public function get_value() {
    return $this->value;
  }
  
  /**
   *
   * @return string 
   */
  public function isset_value() {
    return (isset($this->value) && !empty($this->value));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $sequenceInformation = $dom->createElement($this->first_to_lower(get_class($this)));
    
    if($this->isset_sequenceSize()) {
      $sequenceInformation->setAttribute('sequenceSize', $this->sequenceSize);
    }
    else {
      throw new RequiredElementException('sequenceSize');
    }
    
    if($this->isset_sequencePosition()) {
      $sequenceInformation->setAttribute('sequencePosition', $this->sequencePosition);
    }
    else {
      throw new RequiredElementException('sequencePosition');
    }
    
    if($this->isset_value()) {
      $sequenceInformation->appendChild($dom->createTextNode($this->value));
    }
    
    return $sequenceInformation;
  }
}
?>
