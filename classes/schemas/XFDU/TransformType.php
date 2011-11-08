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
class TransformType implements Enum{
  const AUTHENICATION = 'AUTHENICATION';
  const COMPRESSION = 'COMPRESSION';
  const ENCRYPTION = 'ENCRYPTION';
  
  public function values() {
    return array(self::AUTHENICATION, self::COMPRESSION, self::ENCRYPTION);
  }
}

?>
