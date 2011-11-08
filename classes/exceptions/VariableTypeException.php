<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VariableTypeException
 *
 * @author Rob
 */
class VariableTypeException extends XFDUException{
  public function  __construct($expected) {
    $message = 'Invalid variable type. Expected '.$expected;
    parent::__construct($message, 0);
  }
}

?>
