<?php
/**
 * Description of InvalidIDTokenException
 *
 * @author Robert Olendorf
 * 
 */


class InvalidIDTokenException extends XFDUException{
    public function  __construct($token) {
      $message = 'Invalid ID token "'.$token.'" provided. IDs must be alphanumeric'.
        ' and begin with a letter or underscore.';
      parent::__construct($message);
  }
}
?>
