<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';
/**
 * Description of XFDUSetup
 *
 * @author olendorf
 *
 */

/**
 * A simple data structure that hold settings required to create an XFDU package.
 * This allows for much simpler and less error prone method calls. 
 *
 * @author Rob Olendorf
 * 
 */
class XFDUSetup {
  public $root;
  public $specificationVersion;
  public $sequencePosition;
  public $sequenceSize;
  public $sequenceInfoValue;
  public $environmentInfoXMLData = NULL;
  public $extension = NULL;
  
  public function __construct() {
    $this->specificationVersion = 1.0;
  }
}

?>
