<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * @author Jon Wheeler
 */

class METSPackage {
    
  /**
   *
   * @var DomElement 
   */
  protected $mets;
  
  /**
   *
   * @var METSBuilder 
   */
  protected $builder;
  
  /**
   *
   * @param METSSetup $settings 
   */
  public function __construct(METSSetup $settings) {
    $this->builder = new METSBuilder();
    $this->mets = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $this->mets->appendChild($this->mets->importNode($this->builder->build_mets($settings)->get_as_DOM(), TRUE));
  }
  
  public function write($filename) {
    $this->mets->save($filename);
  }
  
  public function read($filename) {
    $dom = new DOMDocument('1.0', 'UTF-8');
    $this->mets = $dom->load($filename);
  }
  
  /**
   * Adds the object to the METS document.
   * @param aMETSElement $METSElement The element to be added
   * @param Mixed $parent Specify the parent element. If null, the highest allowable element is used.
   * @return mixed The object added. The object added is returned on success, false otherwise.
   * @throws InvalidArgumentException Thrown if adding the element is not supported, or the parent does not exist.
   */
  public function add(aMETSElement $METSElement, $parent = NULL) {
  	if(method_exists($this, $methodName = get_class($METSElement))) {
  		return $this->$methodName($METSElement, $parent);
  	}
  	else {
  		$message = 'No add functionality has been implemented for the '.get_class($METSElement);
  		$code = 0;
  		$previous = NULL;
  		throw new InvalidArgumentException($message, $code, $previous);
  	}
  }
  
}
?>

