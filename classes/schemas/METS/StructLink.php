<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class StructLink extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var smLink
     */
    protected $smLink;
    
    /*
     * @var smLinkGrp
     */
    protected $smLinkGrp;
    
    protected function __construct() {
        $this->structMap = array();
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
     * @param SmLink $smLink
     */
    public function set_smLink($smLink){
        $this->smLink = $smLink;
    }
    
    /*
     * @return string
     */
    public function get_smLink() {
        return $this->smLink;
    }
    
    /*
     * @return boolean
     */
    public function isset_smLink() {
        return (isset($this->smLink) && !empty($this->smLink));
    }
    
    /*
     * @param SmLinkGrp $smLinkGrp
     */
    public function set_smLinkGrp($smLinkGrp){
        $this->smLink = $smLinkGrp;
    }
    
    /*
     * @return string
     */
    public function get_smLinkGrp() {
        return $this->smLinkGrp;
    }
    
    /*
     * @return boolean
     */
    public function isset_smLinkGrp() {
        return (isset($this->smLinkGrp) && !empty($this->smLinkGrp));
    }
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $structLink = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $structLink = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':structLink');
        }
        else {
            $structLink = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$structLink->setAttribute('ID', $this->ID);}
        
        if($this->isset_smLink()){
            $structLink->appendChild($dom->importNode($this->smLink->get_as_DOM()));
        }
        
        if($this->isset_smLinkGrp()){
            $structLink->appendChild($dom->importNode($this->smLinkGrp->get_as_DOM()));
        }    
        
        return $structLink;
    }
}
?>
