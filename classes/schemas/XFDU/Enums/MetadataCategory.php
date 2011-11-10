<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Allowed values for metadata categories
 *
 * @author Rob Olendorf
 */
class MetadataCategory extends aEnum{
  public function __construct() {
    $this->enum = array('REP' => 'REP',
                        'PDI' => 'PDI',
                        'DMD' => 'DMD',
                        'OTHER' => 'OTHER',
                        'ANY' => 'ANY');
  }
}

?>
