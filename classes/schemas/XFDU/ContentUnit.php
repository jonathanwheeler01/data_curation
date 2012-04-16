<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 *  The XFDU standard represents a data package structurally as a series of 
 * nested content units, that is, as a hierarchy (e.g., a data product, which is 
 * composed of datasets, which are composed of time series, which are composed 
 * of records). Every content node in the structural map hierarchy may be 
 * connected (via subsidiary XFDUPointer or dataObjectPointer elements) to 
 * information objects which represent that unit as a portion of the whole 
 * package. The contentUnitType is declared as a base type for concrete 
 * implementations of contentUnit; The content unit element has the following 
 * attributes: 1.ID (an XML ID); 2.order: an numeric string 
 * (e.g., 1.1, 1.2.1, 3,) representation of this unit's order among its siblings 
 * (e.g., its sequence); order attribute is not meant to be used for processing 
 * purposes. It is here only for visualization purposes of the potential reader 
 * of XML instance. It is not guaranteed that any software will take value of 
 * order attribute into account. contentUnit nesting is the primary means for 
 * determining order and level of the content information. 3.textInfo: a string 
 * label to describe this contentUnit to an end user viewing the document, as 
 * per a table of contents entry 4.repID: a set of IDREFs to representation 
 * information sections within this XFDU document applicable to this contentUnit. 
 * 5.dmdID: a set of IDREFS to descriptive information sections within this 
 * XFDU document applicable to this contentUnit. 6.pdiID: a set of IDREFS to 
 * preservation description information sections within this XFDU document 
 * applicable to this contentUnit 7.anyMdID: a set of IDREFS to any other 
 * metadata sections that do not fit rep,dmd or pdi metadata related to this 
 * contentUnit 8.unitType: a type of content unit (e.g., Application Data Unit, 
 * Data Description Unit, Software Installation Unit, etc.). 9. behaviorID-an XML 
 * ID reference pointing to associate behavior.
 *
 * @author Rob Olendorf
 * 
 */
class ContentUnit extends aXFDUElement{
  /**
   * An array of the content units held in this contentn unit.
   * @var array
   */
  protected $contentUnits;

  /**
   * Catch all metadata reference.
   * @var string
   */
  protected $anyMdID;
  
  /**
   * @var string
   */
  protected $behaviorID;
  
  /**
   *
   * @var DataObjectPointer
   */
  protected $dataObjectPointer;
  
  /**
   *
   * @var string
   */
  protected $dmdID;
  
  /**
   *
   * @var any 
   */
  protected $extension;
  
  /**
   *
   * @var string
   */
  protected $id;
  
  /**
   * For display purposes. The position of the content unit among the entire
   * group.
   * 
   * @var string
   */
  protected $order;
  
  /**
   *
   * @var string
   */
  protected $pdiMD;
  
  /**
   *
   * @var string
   */
  protected $repID;
  
  /**
   *
   * @var string
   */
  protected $textInfo;
  
  /**
   *
   * @var string
   */
  protected $unitType;
  
  /**
   *
   * @var Reference
   */
  protected $XFDUPointer;

  /**
   * 
   */
  public function  __construct() {
    $this->contentUnits = array();
  }
  
  /**
   *
   * @param ContentUnit $contentUnit 
   */
  public function add_contentUnit(ContentUnit $contentUnit) {
    $this->contentUnits[] = $contentUnit;
  }
  /**
   *
   * @return array<ContentUnit>
   */
  public function get_contentUnits() {
    return $this->contentUnits;
  }
  
  /**
   * 
   */
  public function unset_contentUnits() {
    $this->contentUnits = array();
  }

  /**
   *
   * @return boolean
   */
  public function isset_contentUnits() {
    return (isset($this->contentUnits) && !empty($this->contentUnits));
  }

  /**
   * 
   * @param string $anyMdID
   */
  public function set_anyMdID($anyMdID) {
    if($this->validate_id($anyMdID)) {
      $this->anyMdID = $anyMdID;
    }
    else {
      throw new InvalidIDTokenException($anyMdID);
    }
  }

  /**
   *
   * @return string
   */
  public function get_anyMdID() {
    return $this->anyMdID;
  }

  /**
   *
   * @return boolean
   */
  public function isset_anyMdID() {
    return (isset($this->anyMdID) && !empty($this->anyMdID));
  }

  /**
   * 
   * @param string $behaviorID 
   */
  public function set_behaviorID($behaviorID) {
    if($this->validate_id($behaviorID)) {
      $this->behaviorID = $behaviorID;
    }
    else {
      throw new InvalidIDTokenException($behaviorID);
    }
  }

  /**
   *
   * @return string
   */
  public function get_behaviorID() {
    return $this->behaviorID;
  }

  /**
   *
   * @return boolean
   */
  public function isset_behaviorID() {
    return (isset($this->behaviorID) && !empty($this->behaviorID));
  }
  
  /**
   *
   * @param DataObjectPointer $dataObjectPointer 
   */
  public function set_dataObjectPointer(DataObjectPointer $dataObjectPointer) {
    $this->dataObjectPointer = $dataObjectPointer;
  }
  
  /**
   *
   * @return DataObjectPointer
   */
  public function get_dataObjectPointer() {
    return $this->dataObjectPointer;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dataObjectPointer() {
    return (isset($this->dataObjectPointer) && !empty($this->dataObjectPointer));
  }
  
  /**
   * 
   * @param string $dmdID 
   */
  public function set_dmdID($dmdID) {
    if($this->validate_id($dmdID)) {
      $this->dmdID = $dmdID;
    }
    else {
      throw new InvalidIDTokenException($dmdID);
    }
  }
  
  /**
   *
   * @return string
   */
  public function get_dmdID() {
    return $this->dmdID;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_dmdID() {
    return (isset($this->dmdID) && !empty($this->dmdID));
  }
  
  /**
   *
   * @param any $extension 
   */
  public function set_extension($extension) {
    $this->extension = $extension;
  }
  
  /**
   *
   * @return any
   */
  public function get_extension() {
    return $this->extension;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_extension() {
    return (isset($this->extension) && !empty($this->extension));
  }
  
  /**
   * 
   * @param string $id 
   */
  public function set_id($id) {
    if($this->validate_id($id)) {
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
    return (isset($this->id) && !empty($this->id));
  }
  
  /**
   *
   * @param string $order 
   */
  public function set_order($order) {
    $this->order = $order;
  }
  
  /**
   *
   * @return string 
   */
  public function get_order() {
    return $this->order;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_order() {
    return (isset($this->order) && !empty($this->order));
  }
  
  /**
   * 
   * @param string $pdiID 
   */
  public function set_pdiID($pdiID) {
    if($this->validate_id($pdiID)) {
      $this->pdiMD = $pdiID;
    }
    else {
      throw new InvalidIDTokenException($pdiID);
    }
  }
  
  /**
   *
   * @return string 
   */
  public function get_pdiID() {
    return $this->pdiMD;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_pdiID() {
    return (isset($this->pdiMD) && !empty($this->pdiMD));
  }
  
  /**
   * 
   * @param string $repID 
   */
  public function set_repID($repID) {
    if($this->validate_id($repID)) {
      $this->repID = $repID;
    }
    else {
      throw new InvalidIDTokenException($repID);
    }
  }
  
  /**
   *
   * @return string
   */
  public function get_repID() {
    return $this->repID;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_repID() {
    return (isset($this->repID) && !empty($this->repID));
  }
  
  /**
   *
   * @param string $textInfo 
   */
  public function set_textInfo($textInfo) {
    $this->textInfo = $textInfo;
  }
  
  /**
   *
   * @return string 
   */
  public function get_textInfo() {
    return $this->textInfo;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_textInfo() {
    return (isset($this->textInfo) && !empty($this->textInfo));
  }
  
  /**
   *
   * @param string $unitType 
   */
  public function set_unitType($unitType) {
    $this->unitType = $unitType;
  }
  
  /**
   *
   * @return string
   */
  public function get_unitType() {
    return $this->unitType;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_unitType() {
    return (isset($this->unitType) && !empty($this->unitType));
  }
  
  /**
   *
   * @param xfduPointer $xfduPointer 
   */
  public function set_XFDUPointer (xfduPointer $xfduPointer) {
    $this->XFDUPointer = $xfduPointer;
  }
  
  /**
   *
   * @return xfduPointer 
   */
  public function get_XFDUPointer() {
    return $this->XFDUPointer;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_XFDUPointer() {
    return (isset($this->XFDUPointer) && !empty($this->XFDUPointer));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    $dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
    
    if($prefix !== NULL) {
      $contentUnit = $dom->createElement($prefix.':'.$this->first_to_lower(get_class($this)));
      $contentUnit = $dom->createElementNS('urn:ccsds:schema:xfdu:1', $prefix.':contentUnit');
    }
    else {
      $contentUnit = $dom->createElementNS('urn:ccsds:schema:xfdu:1', 'xfdu:'.$this->first_to_lower(get_class($this)));
    }
    
    // Handle the long list of attributes.
    if($this->isset_id()) {$contentUnit->setAttribute('ID', $this->id);}
    if($this->isset_anyMdID()) {$contentUnit->setAttribute('anyMdID', $this->anyMdID);}
    if($this->isset_behaviorID()) {$contentUnit->setAttribute('behaviorID', $this->behaviorID);}
    if($this->isset_dmdID()) {$contentUnit->setAttribute('dmdID', $this->dmdID);}
    if($this->isset_pdiID()) {$contentUnit->setAttribute('pdiID', $this->pdiMD);}
    if($this->isset_repID()) {$contentUnit->setAttribute('repID', $this->repID);}
    if($this->isset_textInfo()) {$contentUnit->setAttribute('textInfo', $this->textInfo);}
    if($this->isset_order()) {$contentUnit->setAttribute('order', $this->order);}
    if($this->isset_unitType()) {$contentUnit->setAttribute('unitType', $this->unitType);}
    
    if($this->isset_XFDUPointer()) {
      $contentUnit->appendChild($dom->importNode($this->XFDUPointer->get_as_DOM()));
    }
    
    if($this->isset_dataObjectPointer()) {
      $contentUnit->appendChild($dom->importNode($this->dataObjectPointer->get_as_DOM()));
    }
    
    $childContentUnit = new ContentUnit();
    if($this->isset_contentUnits()) {
      foreach($this->contentUnits as $childContentUnit) {
        $contentUnit->appendChild($dom->importNode($childContentUnit->get_as_DOM($prefix)));
      }
    }
    
    return $contentUnit;
  }
}
?>
