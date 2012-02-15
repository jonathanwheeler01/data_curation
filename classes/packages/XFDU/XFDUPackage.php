<?php
require_once dirname(__FILE__).'/../../../curation_tool.inc';
/**
 * Encapsulates an XFDU Unit and eases the building and saving the entire datastructure.
 *
 * @author olendorf
 * 
 */
class XFDUPackage {
  protected $package;
  protected $builder;
  
  public function __construct(XFDUSetup $settings) {
    $this->builder = new XFDUBuilder();
    
    if($settings->sequenceInfoValue && 
       $settings->sequencePosition &&
       $settings->sequenceSize) {
      
      $volumeInfo = $this->builder->build_volumeInfo($settings->specificationVersion, 
                                                     $this->builder->build_SequenceInfo($settings->sequencePosition, 
                                                                                        $settings->sequenceSize, 
                                                                                        $settings->sequenceInfoValue));
    }
    else {
      $volumeInfo = $this->builder->build_volumeInfo($settings->specificationVersion);
    }
    
    if($settings->environmentInfoXMLData || $settings->extension) {
      $environmentInfo = $this->builder->build_environmentInfo($settings->environmentInfoXMLData, $settings->extension);
    }
    
    $packageHeader = $this->builder->build_packageHeader($id, $volumeInfo, $environmentInfo);
  }
  
  public function add(aXMLElement $object, $parent = NULL, $root = null) {
    switch(get_class($object)) {
      case 'ContentUnit':
        break;
      case 'DataObject':
        break;
      case 'MetadataObject':
        break;
      case 'BehaviorObject':
        break;
      default:
        $message = 'Invalid type specified: "'.$className.'".';
        $code = 0;
        $previous = NULL;
        throw new XFDUException($message, $code, $previous);
    }
  }
}

?>
