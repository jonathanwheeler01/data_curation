<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * HTML type references. locator attribute allows finer granularity within location specified in href
 *
 * @author Rob Olendorf
 *
 */
class Reference extends aXMLElement{
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
   * @param string $locator 
   */
  public function set_locator($locator) {
    $enum = new Locator();
    if($enum->has_value($locator)) {
      $this->locator = $locator;
    }
    else {
      $message = 'Invalid locator given on '.
              __CLASS__.': '.__METHOD__.': line '.__LINE__.
              '. The locator must be one of '.  implode(', ', $enum->values()).'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
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
    $this->locatorType = $locatorType;
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
