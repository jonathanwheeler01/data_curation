<?php
/**
 * @todo reimplement environmentInfo with setters getters etc.
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Environment info provides meta information related to the environment where 
 * the XFDU was created. Since environment information may be specific to a 
 * concrete XFDU producer, environment information can have only two optional 
 * elements: -xmlData - can hold application specific information. -wild card 
 * that serves as extension point for other applications
 *
 * @author Rob Olendorf
 *
 */

class EnvironmentInfo extends aXMLElement{
  /**
   * Allows application specific extensions of the xfdu
   * @var any
   */
  public $extension;

  /**
   * Freeform XML
   * @var anyXML
   */
  public  $xmlData;
}
?>
