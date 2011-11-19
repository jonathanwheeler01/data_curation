<?php
require_once dirname(__FILE__) . '/../../curation_tool.inc';
/**
 * Description of iXMLElement
 *
 * @author olendorf
 *
 */
interface iXMLElement {
  public function get_as_DOM($prefix = NULL);
}

?>
