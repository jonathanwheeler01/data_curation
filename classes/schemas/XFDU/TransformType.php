<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransformType
 *
 * @author Rob
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

class TransformType implements Enum{
  const AUTHENICATION = "AUTHENICATION";
  const COMPRESSION = "COMPRESSION";
  const ENCRYPTION = "ENCRYPTION";
  
  static public function values() {
    return array(self::AUTHENICATION, self::COMPRESSION, self::ENCRYPTION);
  }
}

?>
