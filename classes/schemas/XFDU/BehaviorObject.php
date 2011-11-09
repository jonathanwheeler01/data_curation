<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of BehaviorObject
 *
 * @author Rob Olendorf
 */
class BehaviorObject extends aXMLElement{
  /**
   * Complex Type for Behaviors. A behavior object can be used to associate 
   * executable behaviors with content in the XFDU object. A behavior object 
   * has an interface definition element that represents an abstract definition 
   * of the set of behaviors represented by a particular behavior object. An 
   * behavior object may have the following attributes: 1. ID: an XML ID for the 
   * element 2. structID: IDREF Enables Behavior to point to Content Units or 
   * other Manifest types 3. behaviorType: a behavior type identifier for a 
   * given set of related behaviors. 4. created: date this behavior object of 
   * the XFDU object was created. 5. textInfo: a description of the type of 
   * behaviors this object represents. 6. groupID: an identifier that establishes 
   * a correspondence between this behavior object and other behavior Behavior 
   * object may also include another behavior object for chaining of behaviors. 
   * Concrete implementation of mechanism have to be used in the instance 
   * document.
   */
  protected $mechanisms;
  
  /**
   *
   * @var array<BehaviorObject>
   */
  protected $behaviorObjects;
  
  /**
   *
   * @var string 
   */
  protected $behaviorType;
  
  /**
   *
   * @var string 
   */
  protected $contentUnitID;
  
  /**
   * Can be either a date, datetime, or integer representing a Unix time
   * @var mixed 
   */
  protected $created;
  
  /**
   *
   * @var string
   */
  protected $groupID;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   *
   * @var InterfaceDefinition 
   */
  protected $interfaceDefinition;
  
  /**
   *
   * @var string
   */
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
      throw new InvalidIDTokenException($contentUnitID);
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
      throw new InvalidIDTokenException($groupID);
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
