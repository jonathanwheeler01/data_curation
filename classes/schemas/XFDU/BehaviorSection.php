<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Wrapper for behaviorObjects
 *
 * @author Rob Olendorf
 */
class BehaviorSection extends aXMLElement{
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
}

?>
