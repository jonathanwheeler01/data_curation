<?php
require_once dirname(__FILE__).'/../../../curation_tool.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class File extends aMETSElement {
    /*
     * @var string
     */
    protected $ADMID;
    
    /*
     * @var string
     */
    protected $BEGIN;
    
    /*
     * @var string
     */
    protected $BETYPE;
    
    /*
     * @var string
     */
    protected $CHECKSUM;
    
    /*
     * @var string
    */
    protected $CHECKSUMTYPE;
    
    /*
     * @var string
    */
    protected $CREATED;
    
    /*
     * @var string
    */
    protected $DMDID;
    
    /*
     * @var string
    */
    protected $END;
    
    /*
     * @var string
    */
    protected $GROUPID;
    
    /*
     * @var string
    */
    protected $ID;
    
    /*
     * @var string
    */
    protected $MIMETYPE;
    
    /*
     * @var string
    */
    protected $OWNERID;
    
    /*
     * @var string
    */
    protected $SEQ;
    
    /*
     * @var string
    */
    protected $SIZE;
    
    /*
     * @var string
    */
    protected $USE;
    
    
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
     * @param string $ADMID
     */
    public function set_ADMID($ADMID){
        if($this->validate_id($ADMID)){
            $this->ADMID = $ADMID;
        }
        else {
            throw new InvalidIDTokenException($ADMID);
        }
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
     * @param string $VERSDATE
     */
    public function set_VERSDATE($VERSDATE){
        $this->VERSDATE = $VERSDATE;
    }
    
    /*
     * @return string
     */
    public function get_VERSDATE() {
        return $this->VERSDATE;
    }
    
    /*
     * @return boolean
     */
    public function isset_VERSDATE() {
        return (isset($this->VERSDATE) && !empty($this->VERSDATE));
    }
    
    /*
     * @param string $USE
     */
    public function set_USE($USE){
        $this->USE = $USE;
    }
    
    /*
     * @return string
     */
    public function get_USE() {
        return $this->USE;
    }
    
    /*
     * @return boolean
     */
    public function isset_USE() {
        return (isset($this->USE) && !empty($this->USE));
    }
    
    /*
     * @param File $file
     */
    public function set_file($file){
        $this->file = $file;
    }
    
    /*
     * @return string
     */
    public function get_file() {
        return $this->file;
    }
    
    /*
     * @return boolean
     */
    public function isset_file() {
        return (isset($this->file) && !empty($this->file));
    }
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $fileGrp = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $fileGrp = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fileGrp');
        }
        else {
            $fileGrp = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$fileGrp->setAttribute('ID', $this->ID);}
        
        if($this->isset_VERSDATE()) {$fileGrp->setAttribute('VERSDATE', $this->VERSDATE);}
        
        if($this->isset_ADMID()) {$fileGrp->setAttribute('ADMID', $this->ADMID);}
        
        if($this->isset_USE()) {$fileGrp->setAttribute('USE', $this->USE);}
        
        if($this->isset_file()){
            $fileGrp->appendChild($dom->importNode($this->file->get_as_DOM()));
        }
        
        $childFileGrpSec = new FileGrp();
        if($this->isset_fileGrps()) {
            foreach($this->fileGrpSecs as $childFileGrpSec) {
                $fileGrp->appendChild($dom->importNode($childFileGrpSec->get_as_DOM($prefix)));
            }
        
        return $fileGrp;
    
        }
        
    }
}
?>
