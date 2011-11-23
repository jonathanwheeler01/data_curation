<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnimplementedMethodException
 *
 * @author Rob
 */
class UnimplementedMethodException extends Exception{
  public function __construct($className, $methodName) {
    $message = $methodName.' has not been implemented in '.
               $className.' (file: '.$this->file.'; line: '.$this->line.').';
    $code = 0;
    $previous = NULL;
    parent::__construct($message, $code, $previous);
  }
}

?>
