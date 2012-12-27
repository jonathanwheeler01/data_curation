<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Controlled Vocabulary for Locators
 *
 * @author Rob Olendorf
 */
class Locator extends aEnum{
  public function __construct() {
    $this->enum = array('URL' => 'URL', 'OTHER' => 'OTHER');
  }
}

?>
