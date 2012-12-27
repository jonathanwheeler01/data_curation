<?php

/**
 *
 * @author Jon Wheeler
 */
class FContent extends aMETSElement{
	/*
	 * @var string
	 */
	protected $ID;

	/*
	 * @var string
	 * */
	protected $USE;
	
	/*
	 * @var XMLData
	 * */
	protected $XMLData;
	
	/*
	 * 
	 * @var binData;
	 * 
	 * */
	protected $binData;
	
	public function __construct() {
		$this->fcontent = array();
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
     * @param string $XMLData
    */
    public function set_XMLData($XMLData){
    	$this->XMLData = $XMLData;
    }
    
    /*
     * @return string
    */
    public function get_XMLData() {
    	return $this->XMLData;
    }
    
    /*
     * @return boolean
    */
    public function isset_XMLData() {
    	return (isset($this->XMLData) && !empty($this->XMLData));
    }
    
    /*
     * @param string $binData
    */
    public function set_binData($binData){
    	$this->binData = $binData;
    }
    
    /*
     * @return string
    */
    public function get_binData() {
    	return $this->binData;
    }
    
    /*
     * @return boolean
    */
    public function isset_binData() {
    	return (isset($this->binData) && !empty($this->binData));
    }
    
    public function get_as_DOM($prefix = NULL) {
    	$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    	if($prefix !== NULL) {
    		$fcontent = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
    		$fcontent = $dom->createElementNS('http://www.loc.gov/METS/', $prefix.':fcontent');
    	}
    	else {
    		$fcontent = $dom->createElementNS('http://www.loc.gov/METS/', 'mets:'.$this->first_to_lower(get_class($this)));
    	}
    
    	// handle attributes
    	if($this->isset_ID()) {
    		$fcontent->setAttribute('ID', $this->ID);
    	}
    
    	if($this->isset_USE()) {
    		$fcontent->setAttribute('USE', $this->USE);
    	}
    	
    	// handle child elements
    	if($this->isset_binData()){
    		$fcontent->appendChild($dom->importNode($this->binData->get_as_DOM(), TRUE));
    	}
    	
    	if($this->isset_XMLData()){
    		$fcontent->appendChild($dom->importNode($this->XMLData->get_as_DOM(), TRUE));
    	}
    
    		return $fcontent;
    
    	}
    
}    

?>
