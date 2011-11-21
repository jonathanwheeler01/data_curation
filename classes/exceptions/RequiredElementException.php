<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequiredElementException
 *
 * @author Rob
 */
class RequiredElementException extends DOMException{
  public function __construct($elementName) {
    $message = 'Missing required element "'.$elementName.
               '" in '.$this->getFile().
               ' line '.$this->line.'.';
    $code = 0;
    $previous = NULL;
    parent::__construct($message, $code, $previous);
  }
}

?>
