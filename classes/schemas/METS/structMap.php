<?php

require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class StructMap extends aMetsElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $TYPE;
    
    /*
     * @var string
     */
    protected $LABEL;
    
    /*
     * @var div
     */
    protected $div;
    
    public function __construct() {
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
     * @param Div $div
     */
    public function set_div(Div $div){
        $this->div = $div;
    }
    
    /*
     * @return metsHdr
     */
    public function get_div(){
        return $this->div;
    }
    
    /*
     * @return boolean
     */
    public function isset_div(){
        return (isset($this->div) && !empty($this->div));
    }
    
    /*
     * @param type $prefix
     * @return DOMElement;
     */
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $structMap = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $structMap = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':structMap');
        }
        else {
            $structMap = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$structMap->setAttribute('ID', $this->ID);}
        if($this->isset_LABEL()) {$structMap->setAttribute('LABEL', $this->LABEL);}
        if($this->isset_TYPE()) {$structMap->setAttribute('TYPE', $this->TYPE);}
        
        if($this->isset_div()){
            $structMap->appendChild($dom->importNode($this->div->get_as_DOM()));
        }
        
        return $structMap;
    }
}
?>
