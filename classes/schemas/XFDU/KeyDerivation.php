<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * KeyDerivationType contains the information that was used to derive the
 * encryption key for this dataObject. Key derivation type contains: name -
 * name of algorithm used salt - 16-byte random seed used for that algorithm
 * initialization iterationCount - number of iterations used by the algorithm
 * to derive the key
 *
 * @author Rob Olendorf
 */
class KeyDerivation extends aXFDUElement{

  /**
   * Number of iterations used by the algorithm
   * @var long
   */
  protected $iterationCount;

  /**
   * Name of the algorithm used.
   * @var string
   */
  protected $name;

  /**
   * Seed used with the algorithm.
   * @var string
   */
  protected $salt;

  /**
   *
   * @param integer $iterationCount
   */
  public function set_iterationCount($iterationCount) {
    if(is_integer($iterationCount)) {
      $this->iterationCount = $iterationCount;
    }
    else {
      $message = 'Expected integer for iterationCount in '.__CLASS__.': '.__METHOD__.'('.__LINE__.').';
      $code = 0;
      throw new InvalidArgumentException($message, $code);
    }
  }

  /**
   *
   * @return integer
   */
  public function get_iterationCount() {
    return $this->iterationCount;
  }

  /**
   *
   * @return boolean
   */
  public function isset_iterationCount() {
    return (isset($this->iterationCount) && !empty($this->iterationCount));
  }

  /**
   *
   * @param string $name
   */
  public function set_name($name) {
    $this->name = $name;
  }

  /**
   *
   * @return string
   */
  public function get_name() {
    return $this->name;
  }

  /**
   *
   * @return boolean
   */
  public function  isset_name() {
    return (isset($this->name) && !empty($this->name));
  }

  /**
   *
   * @param string $salt
   */
  public function set_salt($salt) {
    $this->salt = $salt;
  }

  /**
   *
   * @return string
   */
  public function get_salt() {
    return $this->salt;
  }

  /**
   *
   * @return boolean
   */
  public function isset_salt() {
    return (isset($this->salt) && !empty($this->salt));
  }  
  
  /**
   *
   * @param type $prefix 
   * @return DOMElement;
   */
  public function get_as_DOM($prefix = NULL) {}
}

?>
