<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MetsHdr extends aMETSElement {
    /*
     * @var agent
     */
    protected $agent;
    
    /*
     * @var altRecordID
     */
    protected $altRecordID;
    
    /*
     * @var metsDocumentID
     */
    protected $metsDocumentID;
    
      /**
   *
   * @var string
   */
  protected $id;
  
  public function __construct() {
  }
  
  /*
   * @param Agent $agent
   */
  public function set_agent(Agent $agent){
      $this->agent = $agent;
  }
  
  /*
   * @return Agent
   */
  public function get_agent(){
      return $this->agent;
  }
  
  /*
   * @return boolean
   */
  public function isset_agent(){
      return (isset($this->agent) && !empty($this->agent));
  }
  
    /*
   * @param altRecordID $altRecordID
   */
  public function set_altRecordID(AltRecordID $altRecordID){
      $this->altRecordID = $altRecordID;
  }
  
  /*
   * @return altRecordID
   */
  public function get_altRecordID(){
      return $this->altRecordID;
  }
  
  /*
   * @return boolean
   */
  public function isset_altRecordID(){
      return (isset($this->altRecordID) && !empty($this->altRecordID));
  }
  
    /*
   * @param metsDocumentID $metsDocumentID
   */
  public function set_metsDocumentID(MetsDocumentID $metsDocumentID){
      $this->metsDocumentID = $metsDocumentID;
  }
  
  /*
   * @return metsDocumentID
   */
  public function get_metsDocumentID(){
      return $this->metsDocumentID;
  }
  
  /*
   * @return boolean
   */
  public function isset_metsDocumentID(){
      return (isset($this->metsDocumentID) && !empty($this->metsDocumentID));
  }
  
  
  public function set_id($id){
      if($this->validate_id($id)){
          $this->id = $id;
      }
      else {
          throw new InvalidIDTokenException($id);
      }
      
  }
  
    /**
   *
   * @return string
   */
  public function get_id() {
    return $this->id;
  }

  /**
   *
   * @return boolean
   */
  public function isset_id() {
    return (isset ($this->id) && !empty ($this->id));
  }  
  
  public function get_as_DOM($prefix = NULL){
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
      
    $metsHdr = $dom->createElement($metsHdr);
      
    // Ensure that the required ID attribute is set and add it if it is. Throw
    // an exception otherwise.
    if($this->isset_id()) {
      $packageHeader->setAttribute('ID', $this->id);
    }
    else {
      throw new RequiredElementException('ID');
    }
    
    if($this->isset_agent()){
        $metsHdr->appendChild($dom->importNode($this->agent->get_as_DOM(), TRUE));
    }
    else { 
        throw new RequiredElementException('agent');
    }
    
    if($this->isset_altRecordID()){
        $metsHdr->appendChild($dom->importNode($this->altRecordID->get_as_DOM(), TRUE));
    }
    
    if($this->isset_metsDocumentID()){
        $metsHdr->appendChild($dom->importNode($this->metsDocumentID->get_as_DOM(), TRUE));
    }
    
    return metsHdr;
  }

}


?>
