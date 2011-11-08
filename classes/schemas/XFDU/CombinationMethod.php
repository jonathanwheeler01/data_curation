<?php
/**
 * Description of CombinationMethod
 *
 * @author Rob
 */
class CombinationMethod implements Enum{
  const CONCAT = 'concat';
  
  public function values() {
    return array(self::CONCAT);
  }
}

?>
