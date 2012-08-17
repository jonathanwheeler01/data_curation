<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DmdSec extends aMETSElement {
    
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $GROUPID;
    
     /*
     * @var string
     */
    protected $ADMID;
    
     /*
     * @var string
     */
    protected $CREATED;
    
     /*
     * @var string
     */
    protected $STATUS;
    
     /*
     * @var mdRef
     */
    protected $mdRef;
    
     /*
     * @var mdWrap
     */
    protected $mdWrap;
    
    protected function __construct() {
        $this->dmdSec = array();
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
     * @param string $GROUPID
     */
    public function set_GROUPID($GROUPID){
        $this->GROUPID = $GROUPID;
    }
    
    /*
     * @return string
     */
    public function get_GROUPID() {
        return $this->GROUPID;
    }
    
    /*
     * @return boolean
     */
    public function isset_GROUPID() {
        return (isset($this->GROUPID) && !empty($this->GROUPID));
    }
    
    /*
     * @param string $ADMID
     */
    public function set_ADMID($ADMID){
        $this->ADMID = $ADMID;
    }
    
    /*
     * @return string
     */
    public function get_ADMID() {
        return $this->ADMID;
    }
    
    /*
     * @return boolean
     */
    public function isset_ADMID() {
        return (isset($this->ADMID) && !empty($this->ADMID));
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
     * @param string $STATUS
     */
    public function set_STATUS($STATUS){
        $this->STATUS = $STATUS;
    }
    
    /*
     * @return string
     */
    public function get_STATUS() {
        return $this->STATUS;
    }
    
    /*
     * @return boolean
     */
    public function isset_STATUS() {
        return (isset($this->STATUS) && !empty($this->STATUS));
    }
    
    /*
     * @param MdRef $mdRef
     */
    public function set_mdRef($mdRef){
        $this->mdRef = $mdRef;
    }
    
    /*
     * @return string
     */
    public function get_mdRef() {
        return $this->mdRef;
    }
    
    /*
     * @return boolean
     */
    public function isset_mdRef() {
        return (isset($this->mdRef) && !empty($this->mdRef));
    }
    
    /*
     * @param MdWrap $mdWrap
     */
    public function set_mdWrap($mdWrap){
        $this->mdWrap = $mdWrap;
    }
    
    /*
     * @return string
     */
    public function get_mdWrap() {
        return $this->mdWrap;
    }
    
    /*
     * @return boolean
     */
    public function isset_mdWrap() {
        return (isset($this->mdWrap) && !empty($this->mdWrap));
    }
    
     public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $dmdSec = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $dmdSec = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':dmdSec');
        }
        else {
            $dmdSec = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$dmdSec->setAttribute('ID', $this->ID);}
        
        if($this->isset_GROUPID()) {$dmdSec->setAttribute('GROUPID', $this->GROUPID);}
        
        if($this->isset_ADMID()) {$dmdSec->setAttribute('ADMID', $this->ADMID);}
        
        if($this->isset_CREATED()) {$dmdSec->setAttribute('CREATED', $this->CREATED);}
        
        if($this->isset_mdRef()){
            $dmdSec->appendChild($dom->importNode($this->mdRef->get_as_DOM()));
        }
        
        if($this->isset_mdWrap()){
            $dmdSec->appendChild($dom->importNode($this->mdWrap->get_as_DOM()));
        }    
        
        return $dmdSec;
    }
    
}
?>
