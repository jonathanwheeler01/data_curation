<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * Description of BehaviorObject
 *
 * @author Rob
 */
class BehaviorObject extends aXMLElement{
  /**
   * An element of mechanismType contains a pointer to an executable code module that 
   * implements a set of behaviors defined by an interface definition
   * @var array<Mechanism>
   */
  protected $mechanisms;
  protected $behaviorObjects;
  protected $behaviorType;
  protected $contentUnitID;
  protected $created;
  protected $groupID;
  protected $id;
  protected $interfaceDefinition;
  protected $textInfo;
  
  /**
   * 
   */
  public function __construct() {
    $this->behaviorObjects = array();
    $this->mechanisms = array();
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
   * @return BehaviorObject 
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
   * @param Mechanism $mechanism 
   */
  public function add_mechanism(Mechanism $mechanism) {
    $this->mechanisms[] = $mechanism;
  }
  
  /**
   *
   * @return array<Mechanism> 
   */
  public function get_mechanisms() {
    return $this->mechanisms;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_mechanisms() {
    return (isset($this->mechanisms) && !empty($this->mechanisms));
  }
  
  /**
   * 
   */
  public function unset_mechanism() {
    $this->mechanisms = array();
  }
  
  /**
   *
   * @param string $behaviorType 
   */
  public function set_behaviorType($behaviorType) {
    $this->behaviorType = $behaviorType;
  }
  
  /**
   *
   * @return string 
   */
  public function get_behaviorType() {
    return $this->behaviorType;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_behaviorType() {
    return (isset($this->behaviorType) && !empty($this->behaviorType));
  }
  
  /**
   *
   * @param string $contentUnitID 
   */
  public function set_contentUnitID($contentUnitID) {
    if($this->validate_id($contentUnitID)) {
      $this->contentUnitID = $contentUnitID;
    }
    else {
      throw new XFDUException('Invalid ID token specified', 0);
    }
  }
  
  /**
   *
   * @return string
   */
  public function get_contentUnitID() {
    return $this->contentUnitID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_contentUnitID() {
    return (isset($this->contentUnitID) && !empty($this->contentUnitID));
  }
  
  /**
   *
   * @param string $groupID 
   */
  public function set_groupID($groupID) {
    if($this->validate_id($groupID)) {
      $this->groupID = $groupID;
    }
    else {
      throw new XFDUException('Invalid ID token specified', 0);
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_groupID() {
    return $this->groupID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_groupID() {
    return (isset($this->groupID) && !empty($this->groupID));
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
      throw new XFDUException('Invalid ID token specified', 0);
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
   * Supply a date or unix time
   * @param mixed $created 
   */
  public function set_created($created) {
    $this->created = $created;
  }
  
  /**
   * 
   * @return mixed
   */
  public function get_created() {
    return $this->created;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_created() {
    return (isset($this->created) && !empty($this->created));
  }
  
  /**
   *
   * @param string $textInfo 
   */
  public function set_textInfo($textInfo) {
    $this->textInfo = $textInfo;
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
   * @param InterfaceDefinition $interfaceDefinition 
   */
  public function set_interfaceDefinition(InterfaceDefinition $interfaceDefinition) {
    $this->interfaceDefinition = $interfaceDefinition;
  }
  
  /**
   *
   * @return InterfaceDefinition
   */
  public function get_interfaceDefinition() {
    return $this->interfaceDefinition;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_interfaceDefinition() {
    return (isset($this->interfaceDefinition) && !empty($this->interfaceDefinition));
  }
}

?>
