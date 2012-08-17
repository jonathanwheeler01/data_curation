<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class BehaviorSec extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $CREATED;
    
    /*
     * @var string
     */
    protected $LABEL;
    
    /*
     * @var behavior
     */
    protected $behavior;
    
    public function __construct() {
        $this->behaviorSecs = array();
    }
    
   /**
   *
   * @param BehaviorSec $behaviorSec 
   */
    public function add_behaviorSec(BehaviorSec $behaviorSec) {
        $this->behaviorSecs[] = $behaviorSec;
    }
    
    /*
     * @param string $ID
     */
    public function set_ID($ID){
        if($this->validate_id($ID)){
            $this->ID = $ID;
        }
        else {
            throw new InvalidIDTokenException($ID);
        }
    }
    
    /*
     * @return string
     */
    public function get_ID() {
        return $this->ID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ID() {
        return (isset($this->ID) && !empty($this->ID));
    }
    
    /*
     * @param string $CREATED
     */
    public function set_CREATED($CREATED){
        $this->CREATED = $CREATED;
    }
    
    /*
     * @return string
     */
    public function get_CREATED() {
        return $this->CREATED;
    }
    
    /*
     * @return boolean
     */
    public function isset_CREATED() {
        return (isset($this->CREATED) && !empty($this->CREATED));
    }
    
    /*
     * @param string $LABEL
     */
    public function set_LABEL($LABEL){
        $this->LABEL = $LABEL;
    }
    
    /*
     * @return string
     */
    public function get_LABEL() {
        return $this->LABEL;
    }
    
    /*
     * @return boolean
     */
    public function isset_LABEL() {
        return (isset($this->LABEL) && !empty($this->LABEL));
    }
    
    /*
     * @param Behavior $behavior
     */
    public function set_behavior($behavior){
        $this->behavior = $behavior;
    }
    
    /*
     * @return string
     */
    public function get_behavior() {
        return $this->behavior;
    }
    
    /*
     * @return boolean
     */
    public function isset_behavior() {
        return (isset($this->behavior) && !empty($this->behavior));
    }
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $behaviorSec = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $behaviorSec = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':dmdSec');
        }
        else {
            $behaviorSec = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$behaviorSec->setAttribute('ID', $this->ID);}
        
        if($this->isset_CREATED()) {$behaviorSec->setAttribute('CREATED', $this->CREATED);}
        
        if($this->isset_LABEL()) {$behaviorSec->setAttribute('LABEL', $this->LABEL);}
        
        if($this->isset_behavior()){
            $behaviorSec->appendChild($dom->importNode($this->behavior->get_as_DOM()));
        }
        
        $childBehaviorSec = new BehaviorSec();
        if($this->isset_behaviorSecs()) {
            foreach($this->behaviorSecs as $childBehaviorSec) {
                $behaviorSec->appendChild($dom->importNode($childBehaviorSec->get_as_DOM($prefix)));
            }
        
        return $behaviorSec;
    
        }
        
    }
    
}
?>
