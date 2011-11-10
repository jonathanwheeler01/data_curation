<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * Controlled vocabulary for Metadata Classifications
 *
 * @author Rob Olendorf
 */
class MetadataClassification extends aEnum{
  public function __construct() {
    $this->enum = array('DED' => 'DED',
                        'SYNTAX' => 'SYNTAX',
                        'FIXITY' => 'FIXITY',
                        'PROVENANCE' => 'PROVENANCE', 
                        'CONTEXT' => 'CONTEXT',
                        'REFERENCE' => 'REFERENCE',
                        'DESCRIPTION' => 'DESCRIPTION',
                        'OTHER' => 'OTHER');
  }
}

?>
