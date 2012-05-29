<?php
/**
 * Doesn not seem to be implimented yet in the schema.
 *
 * @author Rob Olendorf
 */
class Mechanism extends Reference{  
  
  /**
   *
   * @todo Iimplement get_as_DOM()
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {
    throw new UnimplementedMethodException(__CLASS__, __METHOD__);
  }
  
}

?>
