<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aXMLElement
 *
 * @author Rob
 */
class aXMLElement {
  public function validate_id($id) {
    return (preg_match('/^[_a-zA-Z][_a-zA-Z0-9]*/', $id) > 0);
  }
}

?>
