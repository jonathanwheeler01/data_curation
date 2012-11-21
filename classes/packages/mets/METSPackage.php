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
  
}
?>

