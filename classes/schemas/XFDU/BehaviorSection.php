<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of BehaviorSection
 *
 * @author Rob
 */
class BehaviorSection extends aXMLElement{
  protected $behaviorObjects;
  
  public function __construct() {
    $this->behaviorObjects = array();
  }
  
  public function add_behaviorObject(BehaviorObject $behaviorObject) {
    $this->behaviorObjects[] = $behaviorObject;
  }
  
  public function get_behaviorObjects() {
    return $this->behaviorObjects;
  }
  
  public function isset_behaviorObjects() {
    return (isset($this->behaviorObjects) && !empty($this->behaviorObjects));
  }
  
  public function unset_behaviorObjects() {
    $this->behaviorObjects = array();
  }
}

?>
