<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';
/**
 * Encapsulates an XFDU Unit and eases the building and saving the entire datastructure.
 *
 * @author olendorf
 * 
 */
class XFDUPackage {
  protected $package;
  protected $builder;
  
  /**
   * Does the basic building creating an XFDU instance, and adding the 
   * PackageHeader and InformationPackageMap sections.
   */
  public function __construct(XFDUSetup $settings = NULL) {
    $this->builder = new XFDUBuilder();
    
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
