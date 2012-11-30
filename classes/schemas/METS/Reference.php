<?php


/**
 * HTML type references. locator attribute allows finer granularity within location specified in href
 *
 * @author Rob Olendorf
 *
 */
class Reference extends aMetsElement{
  /**
   * Typically the HTTP URL
   * @var string
   */
  protected $href;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   *
   * @var string 
   */
  protected $locator;
  
  /**
   * Drawn from the LocatorType enum class
   * @var string
   */
  protected $locatorType;
  
  /**
   *
   * @var string 
   */
  protected $otherLocatorType;
  
  /**
   * Human readable description of the element data.
   * @var string
   */
  protected $textInfo;
  
  /**
   * 
   * @param string $href 
   */
  public function set_href($href) {
    $this->href = $href;
    return $this;
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
    if($this->validate_id($id)) {
      $this->id = $id;
    }
    else {
      throw new InvalidIDTokenException($id);
    }
    return $this;
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
    return $this;
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
    $enum = new Locator();
    if($enum->has_value($locatorType)) {
      $this->locatorType = $locatorType;
    }
    else {
      $message = 'Invalid locator given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The locator must be one of '.  implode(', ', $enum->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
    return $this;
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
    return $this;
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
  
  /**
   *
   * @param string $textInfo 
   */
  public function set_textInfo($textInfo) {
    $this->textInfo = $textInfo;
    return $this;
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
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    $reference = $dom->createElement($this->first_to_lower(get_class($this)));
    $this->set_DOM_attributes($reference);
    
    return $reference;
  }
  
  /**
   * Sets the attributes for the element in get_as_DOM().
   * 
   * @param DOMElement &$reference 
   */
  protected function set_DOM_attributes(DOMElement &$reference) {
    
    if(!$this->isset_locatorType()) {
      throw new RequiredElementException('locatorType');
    }
    
    $locatorTypes = new Locator();
    
    if(!$locatorTypes->has_value($this->locatorType)) {
      $message = 'Invalid locatorType given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The locator must be one of '.  implode(', ', $enum->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
    
    $reference->setAttribute('locatorType', $this->locatorType);
    
    if($this->isset_id()) {
      $reference->setAttribute('ID', $this->id);
    }
    
    if($this->isset_href()) {
      $reference->setAttribute('href', $this->href);
    }
    
    if($this->isset_locator()) {
      $reference->setAttribute('locator', $this->locator);
    }
    
    if($this->isset_otherLocatorType()) {
      $reference->setAttribute('otherLocatorType', $this->otherLocatorType);
    }
    
    if($this->isset_textInfo()) {
      $reference->setAttribute('textInfo', $this->textInfo);
    }
  }
}
?>
