<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Values for Combination Method
 *
 * @author Rob Olendorf
 */
class CombinationMethod extends aEnum{
  public function __construct() {
    $this->enum = array('CONCAT' => 'CONCAT');
  }
}

?>
