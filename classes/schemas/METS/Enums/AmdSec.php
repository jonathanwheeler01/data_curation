<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AmdSec extends aMETSElement {
    
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var techMD
     */
    protected $techMD;
    
    /*
     * @var rightsMD
     */
    protected $rightsMD;
    
    /*
     * @var sourceMD
     */
    protected $sourceMD;
    
    /*
     * @var digiprovMD
     */
    protected $digiprovMD;
    
    protected function __construct() {
        $this->amdSec = array();
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
     * @param TechMD $techMD
     */
    public function set_techMD(TechMD $techMD){
        $this->techMD = $techMD;
    }
    
    /*
     * @return string
     */
    public function get_techMD() {
        return $this->techMD;
    }
    
    /*
     * @return boolean
     */
    public function isset_techMD() {
        return (isset($this->techMD) && !empty($this->techMD));
    }
    
    /*
     * @param RightMD $rightsMD
     */
    public function set_rightsMD(RightsMD $rightsMD){
        $this->rightsMD = $rightsMD;
    }
    
    /*
     * @return string
     */
    public function get_rightsMD() {
        return $this->rightsMD;
    }
    
    /*
     * @return boolean
     */
    public function isset_rightsMD() {
        return (isset($this->rightsMD) && !empty($this->rightsMD));
    }

    /*
     * @param SourceMD $sourceMD
     */
    public function set_sourceMD(SourceMD $sourceMD){
        $this->sourceMD = $sourceMD;
    }
    
    /*
     * @return string
     */
    public function get_sourceMD() {
        return $this->sourceMD;
    }
    
    /*
     * @return boolean
     */
    public function isset_sourceMD() {
        return (isset($this->sourceMD) && !empty($this->sourceMD));
    }
    
    /*
     * @param DigiprovMD $digiprovMD
     */
    public function set_digiprovMD(DigiprovMD $digiprovMD){
        $this->fileGrp = $digiprovMD;
    }
    
    /*
     * @return string
     */
    public function get_digiprovMD() {
        return $this->digiprovMD;
    }
    
    /*
     * @return boolean
     */
    public function isset_digiprovMD() {
        return (isset($this->digiprovMD) && !empty($this->digiprovMD));
    }
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $amdSec = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $amdSec = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':amdSec');
        }
        else {
            $amdSec = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$amdSec->setAttribute('ID', $this->ID);}
        
        if($this->isset_techMD()){
            $amdSec->appendChild($dom->importNode($this->techMD->get_as_DOM()));
        }
        
        if($this->isset_rightsMD()){
            $amdSec->appendChild($dom->importNode($this->rightsMD->get_as_DOM()));
        }
        
        if($this->isset_sourceMD()){
            $amdSec->appendChild($dom->importNode($this->sourceMD->get_as_DOM()));
        }
        
        if($this->isset_digiprovMD()){
            $amdSec->appendChild($dom->importNode($this->digiprovMD->get_as_DOM()));
        }        
        
        return $amdSec;
    }
    
}
?>
