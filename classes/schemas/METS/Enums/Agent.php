<?php
require_once dirname(__FILE__).'/../../../curation_tool.inc';

/*
 * @author Jon Wheeler
 */

class Agent extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $ROLE;
    
    /*
     * @var string
     */
    protected $OTHERROLE;
    
    /*
     * @var string
     */
    protected $TYPE;
    
    /*@var string*/
    protected $OTHERTYPE;
    
    /*
     * @var name
     */
    protected $name;
    
    /*
     * @var note
     */
    protected $note;
    
    public function __construct() {
        $this->agent= array();
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
     * @param string $ROLE
     */
    public function set_ROLE($ROLE){
        $this->ROLE = $ROLE;
    }
    
    /*
     * @return string
     */
    public function get_ROLE() {
        return $this->ROLE;
    }
    
    /*
     * @return boolean
     */
    public function isset_ROLE() {
        return (isset($this->ROLE) && !empty($this->ROLE));
    }
    
    /*
     * @param string $OTHERROLE
     */
    public function set_OTHERROLE($OTHERROLE){
        $this->OTHERROLE = $OTHERROLE;
    }
    
    /*
     * @return string
     */
    public function get_OTHERROLE() {
        return $this->OTHERROLE;
    }
    
    /*
     * @return boolean
     */
    public function isset_OTHERROLE() {
        return (isset($this->OTHERROLE) && !empty($this->OTHERROLE));
    }
    
    /*
     * @param string $TYPE
     */
    public function set_TYPE($TYPE){
        $this->TYPE = $TYPE;
    }
    
    /*
     * @return string
     */
    public function get_TYPE() {
        return $this->TYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_TYPE() {
        return (isset($this->TYPE) && !empty($this->TYPE));
    }
    
    /*
     * @param string $OTHERTYPE
     */
    public function set_OTHERTYPE($OTHERTYPE){
        $this->TYPE = $OTHERTYPE;
    }
    
    /*
     * @return string
     */
    public function get_OTHERTYPE() {
        return $this->OTHERTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_OTHERTYPE() {
        return (isset($this->OTHERTYPE) && !empty($this->OTHERTYPE));
    }
    
    /*
     * @param Name $name
     */
    public function set_name(Name $name){
        $this->name = $name;
    }
    
    /*
     * @return string
     */
    public function get_name() {
        return $this->name;
    }
    
    /*
     * @return boolean
     */
    public function isset_name() {
        return (isset($this->name) && !empty($this->name));
    }
    
    /*
     * @param Note $note
     */
    public function set_note(Note $note){
        $this->note = $note;
    }
    
    /*
     * @return string
     */
    public function get_note() {
        return $this->note;
    }
    
    /*
     * @return boolean
     */
    public function isset_note() {
        return (isset($this->note) && !empty($this->note));
    }
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $agent = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $agent = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':agent');
        }
        else {
            $agent = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$agent->setAttribute('ID', $this->ID);}
        
        if($this->isset_ROLE()) {$agent->setAttribute('ROLE', $this->ROLE);}
        
        if($this->isset_OTHERROLE()) {$agent->setAttribute('OTHERROLE', $this->OTHERROLE);}
        
        if($this->isset_TYPE()) {$agent->setAttribute('TYPE', $this->TYPE);}
        
        if($this->isset_OTHERTYPE()) {$agent->setAttribute('OTHERTYPE', $this->OTHERTYPE);}
        
        if($this->isset_name()){
            $agent->appendChild($dom->importNode($this->name->get_as_DOM()));
            
        if($this->isset_note()){
            $agent->appendChild($dom->importNode($this->note->get_as_DOM()));
        }
        
        return $agent;
    
        }
    }

}
?>
