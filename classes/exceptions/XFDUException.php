<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XFDUException
 *
 * @author Rob
 */
class XFDUException extends Exception {
  public function __construct($message) {
    $code = 0;
    $previous = NULL;
    parent::__construct($message, $code, $previous);
  }
}

?>
