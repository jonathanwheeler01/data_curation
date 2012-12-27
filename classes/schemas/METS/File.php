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
     * @param string $BEGIN
     */
    public function set_BEGIN($BEGIN){
        $this->BEGIN = $BEGIN;
    }
    
    /*
     * @return string
     */
    public function get_BEGIN() {
        return $this->BEGIN;
    }
    
    /*
     * @return boolean
     */
    public function isset_BEGIN() {
        return (isset($this->BEGIN) && !empty($this->BEGIN));
    }
    
    /*
     * @param string $BETYPE
    */
    public function set_BETYPE($BETYPE){
    	$this->BETYPE = $BETYPE;
    }
    
    /*
     * @return string
    */
    public function get_BETYPE() {
    	return $this->BETYPE;
    }
    
    /*
     * @return boolean
    */
    public function isset_BETYPE() {
    	return (isset($this->BETYPE) && !empty($this->BETYPE));
    }
    
    /*
     * @param string $CHECKSUM
    */
    public function set_CHECKSUM($CHECKSUM){
    	$this->CHECKSUM = $CHECKSUM;
    }
    
    /*
     * @return string
    */
    public function get_CHECKSUM() {
    	return $this->CHECKSUM;
    }
    
    /*
     * @return boolean
    */
    public function isset_CHECKSUM() {
    	return (isset($this->CHECKSUM) && !empty($this->CHECKSUM));
    }
    
    /*
     * @param string $CHECKSUMTYPE
    */
    public function set_CHECKSUMTYPE($CHECKSUMTYPE){
    	$this->CHECKSUMTYPE = $CHECKSUMTYPE;
    }
    
    /*
     * @return string
    */
    public function get_CHECKSUMTYPE() {
    	return $this->CHECKSUMTYPE;
    }
    
    /*
     * @return boolean
    */
    public function isset_CREATED() {
    	return (isset($this->CREATED) && !empty($this->CREATED));
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
     * @param string $DMDID
    */
    public function set_DMDID($DMDID){
    	$this->DMDID = $DMDID;
    }
    
    /*
     * @return string
    */
    public function get_DMDID() {
    	return $this->DMDID;
    }
    
    /*
     * @return boolean
    */
    public function isset_DMDID() {
    	return (isset($this->DMDID) && !empty($this->DMDID));
    }
    
    /*
     * @param string $END
    */
    public function set_END($END){
    	$this->END = $END;
    }
    
    /*
     * @return string
    */
    public function get_END() {
    	return $this->END;
    }
    
    /*
     * @return boolean
    */
    public function isset_END() {
    	return (isset($this->END) && !empty($this->END));
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
     * @param string $MIMETYPE
    */
    public function set_MIMETYPE($MIMETYPE){
    	$this->MIMETYPE = $MIMETYPE;
    }
    
    /*
     * @return string
    */
    public function get_MIMETYPE() {
    	return $this->MIMETYPE;
    }
    
    /*
     * @return boolean
    */
    public function isset_MIMETYPE() {
    	return (isset($this->MIMETYPE) && !empty($this->MIMETYPE));
    }
    
    /*
     * @param string $OWNERID
    */
    public function set_OWNERID($OWNERID){
    	$this->OWNERID = $OWNERID;
    }
    
    /*
     * @return string
    */
    public function get_OWNERID() {
    	return $this->OWNERID;
    }
    
    /*
     * @return boolean
    */
    public function isset_OWNERID() {
    	return (isset($this->OWNERID) && !empty($this->OWNERID));
    }
    
    /*
     * @param string $SEQ
    */
    public function set_SEQ($SEQ){
    	$this->SEQ = $SEQ;
    }
    
    /*
     * @return string
    */
    public function get_SEQ() {
    	return $this->SEQ;
    }
    
    /*
     * @return boolean
    */
    public function isset_SEQ() {
    	return (isset($this->SEQ) && !empty($this->SEQ));
    }
    
    /*
     * @param string $SIZE
    */
    public function set_SIZE($SIZE){
    	$this->SIZE = $SIZE;
    }
    
    /*
     * @return string
    */
    public function get_SIZE() {
    	return $this->SIZE;
    }
    
    /*
     * @return boolean
    */
    public function isset_SIZE() {
    	return (isset($this->SIZE) && !empty($this->SIZE));
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
    
    
    public function get_as_DOM($prefix = NULL) {
        $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
        
        if($prefix !== NULL) {
            $file = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
            $file = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':file');
        }
        else {
            $file = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
        }
        
        // handle attributes
        if($this->isset_ID()) {$file->setAttribute('ID', $this->ID);}
        
        if($this->isset_BEGIN()) {
        	$file->setAttribute('BEGIN', $this->BEGIN);
        }
        
        if($this->isset_BETYPE()) {$file->setAttribute('BETYPE', $this->BETYPE);}
        
        if($this->isset_CHECKSUM()) {
        	$file->setAttribute('CHECKSUM', $this->CHECKSUM);
        }
        
        if($this->isset_CREATED()) {
        	$file->setAttribute('CREATED', $this->CREATED);
        }
        
        if($this->isset_CHECKSUMTYPE()) {
        	$file->setAttribute('CHECKSUMTYPE', $this->CHECKSUMTYPE);
        }
        
        if($this->isset_DMDID()) {
        	$file->setAttribute('DMDID', $this->DMDID);
        }
        
        if($this->isset_END()) {
        	$file->setAttribute('END', $this->END);
        }
        
        if($this->isset_GROUPID()) {
        	$file->setAttribute('GROUPID', $this->GROUPID);
        }
        
        if($this->isset_MIMETYPE()) {
        	$file->setAttribute('MIMETYPE', $this->MIMETYPE);
        }
        
        if($this->isset_OWNERID()) {
        	$file->setAttribute('OWNERID', $this->OWNERID);
        }
        
        if($this->isset_SEQ()) {
        	$file->setAttribute('SEQ', $this->SEQ);
        }
        
        if($this->isset_SIZE()) {
        	$file->setAttribute('SIZE', $this->SIZE);
        }
        
        if($this->isset_ADMID()) {$file->setAttribute('ADMID', $this->ADMID);}
        
        if($this->isset_USE()) {$file->setAttribute('USE', $this->USE);}
        
        return $file;
    
        }
        
    }
?>
