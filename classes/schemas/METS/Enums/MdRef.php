<?php
require_once dirname(__FILE__).'/../../../curation_tool.inc';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MdRef extends aMETSElement {
    /*
     * @var string
     */
    protected $ID;
    
    /*
     * @var string
     */
    protected $LOCTYPE;
    
    /*
     * @var string
     */
    protected $OTHERLOCTYPE;
    
    /*
     * @var string
     */
    protected $type;
    
    /*
     * @var anyURI
     * probably need to concatenate 'xlink:' in attribute creation
     */
    protected $href;
    
    /*
     * @var string
     * also add 'xlink:'
     */
    protected $role;
    
    /*
     * @var string
     * also add 'xlink:'
     */
    protected $arcrole;
    
    /*
     * @var string
     * also add 'xlink:'
     */
    protected $title;
    
    /*
     * @var string
     * also add 'xlink:'
     */
    protected $show;
    
    /*
     * @var string
     * also add 'xlink:'
     */
    protected $actuate;
    
    /*
     * @var string
     */
    protected $MIMETYPE;
    
    /*
     * @var long
     */
    protected $SIZE;
    
    /*
     * @var dateTime
     */
    protected $CREATED;
    
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
    protected $LABEL;
    
    /*
     * @var string
     */
    protected $XPTR;
    
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
     * @param string $LOCTYPE
     */
    public function set_LOCTYPE($LOCTYPE){
        $this->LOCTYPE=$LOCTYPE;
    }
    
    /*
     * @return string
     */
    public function get_LOCTYPE(){
        return $this->LOCTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_LOCTYPE(){
        return (isset($this->LOCTYPE) && !empty($this->LOCTYPE));
    }
    
    /*
     * @param string $OTHERLOCTYPE
     */
    public function set_OTHERLOCTYPE($OTHERLOCTYPE){
        $this->OTHERLOCTYPE=$OTHERLOCTYPE;
    }
    
    /*
     * @return string
     */
    public function get_OTHERLOCTYPE(){
        return $this->OTHERLOCTYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_OTHERLOCTYPE(){
        return (isset($this->OTHERLOCTYPE) && !empty($this->OTHERLOCTYPE));
    }
    
    /*
     * @param string $type
     */
    public function set_type($type){
        $this->type=$type;
    }
    
    /*
     * @return string
     */
    public function get_type(){
        return $this->type;
    }
    
    /*
     * @return boolean
     */
    public function isset_type(){
        return (isset($this->type) && !empty($this->type));
    }
    
    /*
     * @param anyURI $href
     */
    public function set_href($href){
        $this->href=$href;
    }
    
    /*
     * @return anURI
     */
    public function get_href(){
        return $this->href;
    }
    
    /*
     * @return boolean
     */
    public function isset_href(){
        return (isset($this->href) && !empty($this->href));
    }
    
    /*
     * @param string $role
     */
    public function set_role($role){
        $this->role=$role;
    }
    
    /*
     * @return string
     */
    public function get_role(){
        return $this->role;
    }
    
    /*
     * @return boolean
     */
    public function isset_role(){
        return (isset($this->role) && !empty($this->role));
    }
    
    /*
     * @param string $arcrole
     */
    public function set_arcrole($arcrole){
        $this->arcrole=$arcrole;
    }
    
    /*
     * @return string
     */
    public function get_arcrole(){
        return $this->arcrole;
    }
    
    /*
     * @return boolean
     */
    public function isset_arcrole(){
        return (isset($this->arcrole) && !empty($this->arcrole));
    }
    
    /*
     * @param string $title
     */
    public function set_title($title){
        $this->title=$title;
    }
    
    /*
     * @return string
     */
    public function get_title(){
        return $this->title;
    }
    
    /*
     * @return boolean
     */
    public function isset_title(){
        return (isset($this->title) && !empty($this->title));
    }
    
    /*
     * @param string $show
     */
    public function set_show($show){
        $this->show=$show;
    }
    
    /*
     * @return string
     */
    public function get_show(){
        return $this->show;
    }
    
    /*
     * @return boolean
     */
    public function isset_show(){
        return (isset($this->show) && !empty($this->show));
    }
    
    /*
     * @param string $actuate
     */
    public function set_actuate($actuate){
        $this->actuate=$actuate;
    }
    
    /*
     * @return string
     */
    public function get_actuate(){
        return $this->actuate;
    }
    
    /*
     * @return boolean
     */
    public function isset_actuate(){
        return (isset($this->actuate) && !empty($this->actuate));
    }
    
    /*
     * @param string $MIMETYPE
     */
    public function set_MIMETYPE($MIMETYPE){
        $this->MIMETYPE=$MIMETYPE;
    }
    
    /*
     * @return string
     */
    public function get_MIMETYPE(){
        return $this->MIMETYPE;
    }
    
    /*
     * @return boolean
     */
    public function isset_MIMETYPE(){
        return (isset($this->MIMETYPE) && !empty($this->MIMETYPE));
    }
    
    /*
     * @param long $SIZE
     */
    public function set_SIZE($SIZE){
        $this->SIZE=$SIZE;
    }
    
    /*
     * @return string
     */
    public function get_SIZE(){
        return $this->SIZE;
    }
    
    /*
     * @return boolean
     */
    public function isset_SIZE(){
        return (isset($this->SIZE) && !empty($this->SIZE));
    }
    
    /*
     * @param dateTime $CREATED
     */
    public function set_CREATED($CREATED){
        $this->CREATED=$CREATED;
    }
    
    /*
     * @return string
     */
    public function get_CREATED(){
        return $this->CREATED;
    }
    
    /*
     * @return boolean
     */
    public function isset_CREATED(){
        return (isset($this->CREATED) && !empty($this->CREATED));
    }
    
    /*
     * @param string $CHECKSUM
     */
    public function set_CHECKSUM($CHECKSUM){
        $this->CHECKSUM=$CHECKSUM;
    }
    
    /*
     * @return string
     */
    public function get_CHECKSUM(){
        return $this->CHECKSUM;
    }
    
    /*
     * @return boolean
     */
    public function isset_CHECKSUM(){
        return (isset($this->CHECKSUM) && !empty($this->CHECKSUM));
    }
    
}
?>
