<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * Description of TransformType
 *
 * @author Rob Olendorf
 */
class TransformType implements Enum{
  const AUTHENICATION = "AUTHENICATION";
  const COMPRESSION = "COMPRESSION";
  const ENCRYPTION = "ENCRYPTION";
  
  static public function values() {
    return array(self::AUTHENICATION, self::COMPRESSION, self::ENCRYPTION);
  }
}

?>
