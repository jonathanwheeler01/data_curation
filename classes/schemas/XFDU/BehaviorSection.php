<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Wrapper for behaviorObjects
 *
 * @author Rob Olendorf
 */
class BehaviorSection extends aXFDUElement{
  /**
   *
   * @var array<BehaviorObject>
   */
  protected $behaviorObjects;
  
  /**
   * 
   */
  public function __construct() {
    $this->behaviorObjects = array();
  }
  
  /**
   *
   * @param BehaviorObject $behaviorObject 
   */
  public function add_behaviorObject(BehaviorObject $behaviorObject) {
    $this->behaviorObjects[] = $behaviorObject;
  }
  
  /**
   *
   * @return array<BehaviorObject>
   */
  public function get_behaviorObjects() {
    return $this->behaviorObjects;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_behaviorObjects() {
    return (isset($this->behaviorObjects) && !empty($this->behaviorObjects));
  }
  
  /**
   * 
   */
  public function unset_behaviorObjects() {
    $this->behaviorObjects = array();
  }  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    return $dom->createElement('behaviorSection');
  }
}

?>
