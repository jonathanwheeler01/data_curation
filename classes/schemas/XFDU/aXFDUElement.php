<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * A "wrapper" Class to collect methods and attributes (probably only methods)
 * specific to all XFDU classes.
 *
 * @author Rob Olendorf
 * 
 */
abstract class aXFDUElement extends aXMLElement {
  protected $classNamePrefix = 'XFDU';
}

?>
