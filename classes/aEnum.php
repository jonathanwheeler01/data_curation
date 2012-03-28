<?php

require_once dirname(__FILE__) . '/../curation_tool.inc';
/**
 * Description of aEnum
 *
 * @author Rob Olendorf
 */
abstract class aEnum {
  protected $enum;
  
  public function __construct() {
    $this->enum = array();
  }
  
  public function values() {
    return $this->enum;
  }
  
  public function value_of($name) {
    if(isset($this->enum[$name]) && !empty($this->enum[$name])) {
      return $this->enum[$name];
    }
    else {
      $message = 'Invalid value supplied for enum class '.__CLASS__.'.';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }
  
  public function has_value($value) {
    if(array_search($value, $this->enum) === FALSE) {
      return FALSE;
    }
    else {
      return TRUE;
    }
  }
}

?>
