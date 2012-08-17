<?php
require_once dirname(__FILE__).'/../../../curation_tool.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class FileGrp extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $VERSDATE;
    
    /*
     * @var string
     */
    protected $ADMID;
    
    /*
     * @var string
     */
    protected $USE;
    
    public function __construct() {
        $this->fileGrps = array();
    }
    
    /*
     * @param FileGrp $fileGrp
     */
    public function addfileGrp(FileGrp $fileGrp) {
        $this->fileGrps[] = $fileGrp;
    }
    
    /**
     *
     * @return array<BehaviorSec>
     */
    public function get_fileGrps() {
      return $this->fileGrps;
    }

    /**
     * 
     */
    public function unset_fileGrps() {
      $this->fileGrps = array();
    }

    /**
     * 
     * @return boolean
     */
    public function isset_fileGrps() {
      return (isset($this->fileGrps) && !empty($this->fileGrps));
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
    
    
}
?>
