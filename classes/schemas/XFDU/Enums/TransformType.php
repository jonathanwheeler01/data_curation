<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Controlled Vocabulary for Transformations
 *
 * @author Rob Olendorf
 */
class TransformType extends aEnum{
  public function __construct() {
    $this->enum = array('COMPRESSION'=>'COMPRESSION', 
                        'AUTHENTICATION' => 'AUTHENTICATION',
                        'ENCRYPTION' => 'ENCRYPTION');
  }
}

?>
