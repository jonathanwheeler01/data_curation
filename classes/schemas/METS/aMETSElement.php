<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * A "wrapper" Class to collect methods and attributes (probably only methods)
 * specific to all METS classes.
 *
 * @author Jon Wheeler
 * 
 */
abstract class aMETSElement extends aXMLElement {
  protected $classNamePrefix = 'METS';
}

?>
