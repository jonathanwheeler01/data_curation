<?php
require_once dirname(__FILE__) . '/../../../../curation_tool.inc';

/**
 * PHP Implementation of the Dublin Core term accessRights.
 *
 * @author Rob Olendorf
 * 
 */
class AccessRights extends Description{
  
  /**
   * Need to override this to handle the special case of Abstract being
   * a key word in PHP
   */

  public function get_element_as_DOM() {}
  
}

?>
