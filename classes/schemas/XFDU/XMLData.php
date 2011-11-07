<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XMLData
 *
 * @author Rob
 */
class XMLData {
  /**
   * Freeform or structured XML, stored here as a string to allow for different
   * implementation methods of XML, ie. DOM or Simple in PHP
   * @var XML
   */
  protected $any;
  
  /**
   *
   * @param string $any 
   */
  public function set_any($any) {
    $this->any = $any;
  }
  
  /**
   *
   * @return string
   */
  public function get_any() {
    return $this->any;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_any() {
    return (isset($this->any) && !empty($this->any));
  }
}

?>
