<?php

/*
 * @author Jon Wheeler
 */

require_once dirname(__FILE__).'/../../../curation_tool.php';

class METS extends aMETSElement {
    /*
     * id for the package
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $OBJID;
    
    /*
     * @var string
     */
    protected $LABEL;
    
    /*
     * @var string
     */
    protected $TYPE;

    /*
     * @var string
     */
    protected $PROFILE;
    
    /*
     * @var metsHdr
     */
    protected $metsHdr;
    
    /*
     * @var dmdSec
     */
    protected $dmdSec;
    
    /*
     * @var amdSec
     */
    protected $amdSec;
    
    /*
     * @var fileSec
     */
    protected $fileSec;
    
    /*
     * @var structMap
     */
    protected $structMap;
    
    /*
     * @var structLink
     */
    protected $structLink;
    
    /*
     * @var behaviorSec
     */
    protected $behaviorSec;
    
    /*
     * @var string
     */
    /*protected $version;
    
    public function __construct() {
        $this->version = 1.9.1;
    }
     */
    
    public function __construct() {
        $this->version = '1.9.1';
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
     * @param string $OBJID
     */
    public function set_OBJID(){
        $this->OBJID = $OBJID;
    }
    
    /*
     * @return string
     */
    public function get_OBJID(){
        return $this->OBJID;
    }
    
    /*
     * @return boolean
     */
    public function isset_OBJID(){
        return (isset($this->OBJID) && !empty($this->OBJID));
    }
    
    /*
     * @param string $LABEL
     */
    public function set_LABEL(){
        $this->LABEL = $LABEL;
    }
    
    /*
     * @return string
     */
    public function get_LABEL(){
        return $this->LABEL;
    }
    
    /*
     * @return boolean
     */
    public function isset_LABEL(){
        return (isset($this->LABEL) && !empty($this->LABEL));
    }
    
        /*
     * @param string $TYPE
     */
    public function set_TYPE(){
        $this->TYPE = $TYPE;
    }
    
    /*
     * @return string
     */
    public function get_TYPE(){
        return $this->TYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_TYPE(){
        return (isset($this->TYPE) && !empty($this->TYPE));
    }
    
        /*
     * @param string $PROFILE
     */
    public function set_PROFILE(){
        $this->PROFILE = $PROFILE;
    }
    
    /*
     * @return string
     */
    public function get_PROFILE(){
        return $this->PROFILE;
    }
    
    /*
     * @return boolean
     */
    public function isset_PROFILE(){
        return (isset($this->PROFILE) && !empty($this->PROFLE));
    }
    
    /*
     * @param MetsHdr $metsHdr
     */
    public function set_metsHdr(MetsHdr $metsHdr){
        $this->metsHdr = $metsHdr;
    }
    
    /*
     * @return metsHdr
     */
    public function get_metsHdr(){
        return $this->metsHdr;
    }
    
    /*
     * @return boolean
     */
    public function isset_metsHdr(){
        return (isset($this->metsHdr) && !empty($this->metsHdr));
    }
    
    /*
     * @param DmdSec $dmdSec
     */
    public function set_dmdSec(DmdSec $dmdSec){
        $this->dmdSec = $dmdSec;
    }
    
    /*
     * @return dmdSec
     */
    public function get_dmdSec(){
        return $this->dmdSec;
    }
    
    /*
     * @return boolean
     */
    public function isset_dmdSec(){
        return (isset($this->dmdSec) && !empty($this->dmdSec));
    }
    
    /*
     * @param AmdSec $amdSec
     */
    public function set_amdSec(AmdSec $amdSec){
        $this->amdSec = $amdSec;
    }
    
    /*
     * @return amdSec
     */
    public function get_amdSec(){
        return $this->amdSec;
    }
    
    /*
     * @return boolean
     */
    public function isset_amdSec(){
        return (isset($this->amdSec) && !empty($this->amdSec));
    }
    
    /*
     * @param FileSec $fileSec
     */
    public function set_fileSec(FileSec $fileSec){
        $this->fileSec = $fileSec;
    }
    
    /*
     * @return fileSec
     */
    public function get_fileSec(){
        return $this->fileSec;
    }
    
    /*
     * @return boolean
     */
    public function isset_fileSec(){
        return (isset($this->fileSec) && !empty($this->fileSec));
    }
    
        /*
     * @param StructMap $structMap
     */
    public function set_structMap(StructMap $structMap){
        $this->structMap = $structMap;
    }
    
    /*
     * @return structMap
     */
    public function get_structMap(){
        return $this->structMap;
    }
    
    /*
     * @return boolean
     */
    public function isset_structMap(){
        return (isset($this->structMap) && !empty($this->structMap));
    }
    
        /*
     * @param StructLink $structLink
     */
    public function set_structLink(StructLink $structLink){
        $this->structLink = $structLink;
    }
    
    /*
     * @return structLink
     */
    public function get_structLink(){
        return $this->structLink;
    }
    
    /*
     * @return boolean
     */
    public function isset_structLink(){
        return (isset($this->structLink) && !empty($this->structLink));
    }
    
    /*
     * @param BehaviorSec $behaviorSec
     */
    public function set_behaviorSec(BehaviorSec $behaviorSec){
        $this->behaviorSec = $behaviorSec;
    }
    
    /*
     * @return behaviorSec
     */
    public function get_behaviorSec(){
        return $this->behaviorSec;
    }
    
    /*
     * @return boolean
     */
    public function isset_behaviorSec(){
        return (isset($this->behaviorSec) && !empty($this->behaviorSec));
    }
    
    /*
     * @param string $prefix
     * @return DOMElement
     */
    
    public function get_as_DOM($prefix = NULL){
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        // conditionally add the prefix to the element name and
        // namespace attribute
        if($prefix !== NULL){
            $mets = $dom->createElement($prefix.':'.get_class($this));
            $mets->setAttribute('xmlns:'.$prefix, 'http://www.loc.gov/METS/');
        }
        else {
            $mets = $dom->createElement('mets'.':'.get_class($hits));
            $mets->setAttribute('xmlns:mets', 'http://www.loc.gov/METS/');
        }
        $mets->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $mets->setAttribute('xsi:schemaLocation', 'http://www.loc.gov/METS/ http://www.loc.gov/standards/mets/mets.xsd');
        
        // handle attributes
        if($this->isset_ID()) {$mets->setAttribute('ID', $this->ID);}
        if($this->isset_OBJID()) {$mets->setAttribute('OBJID', $this->OBJID);}
        if($this->isset_LABEL()) {$mets->setAttribute('LABEL', $this->LABEL);}
        if($this->isset_TYPE()) {$mets->setAttribute('TYPE', $this->TYPE);}
        if($this->isset_PROFILE()) {$mets->setAttribute('PROFILE', $this->PROFILE);}

        // required element structMap throws an exception if missing
        
        if($this->isset_structMap()){
            $mets->appendChild($dom->importNode($this->structMap->get_as_DOM(), TRUE));
        }
        else {
            throw new RequiredElementException('structMap');
        }
        
        if($this->isset_metsHdr()){
            $mets->appendChild($dom->importNode($this->metsHdr->get_as_DOM(), TRUE));
        }
        
        if($this->isset_dmdSec()){
            $mets->appendChild($dom->importNode($this->dmdSec->get_as_DOM(), TRUE));
        }
        
        if($this->isset_amdSec()){
            $mets->appendChild($dom->importNode($this->amdSec->get_as_DOM(), TRUE));
        }
        
        if($this->isset_fileSec()){
            $mets->appendChild($dom->importNode($this->fileSec->get_as_DOM(), TRUE));
        }
        
        if($this->isset_structLink()){
            $mets->appendChild($dom->importNode($this->structLink->get_as_DOM(), TRUE));
        }
        
        if($this->isset_behaviorSec()){
            $mets->appendChild($dom->importNode($this->behaviorSec->get_as_DOM(), TRUE));
        }
        
        return $mets;
        
    }
}
?>
