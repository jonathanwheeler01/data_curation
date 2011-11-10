<?php
/**
 * Defines an XML namespace
 *
 * @author Robert Olendorf
 * 
 */
class XMLNameSpace {
  
  /**
   * The namespace identifier
   * @var string
   */
  protected $namespace;
  
  /**
   *
   * @var The location of the namespace. Typically a URL
   */
  protected $location;
  
  /**
   * An optional prefix for the namespace
   * @var string
   */
  protected $prefix;
  
  /**
   * Creates a namespace bean, with optional namespace identifier, location
   * and prefix. 
   * 
   * @param type $namespace
   * @param type $location
   * @param type $prefix 
   */
  public function __construct($namespace = NULL, $location = NULL, $prefix = NULL) {
    $this->location = $location;
    $this->namespace = $namespace;
    $this->prefix = $prefix;
  }
  
  /**
   *
   * @param string $namespace 
   */
  public function set_namespace($namespace) {
    $this->namespace = $namespace;
  }
  
  /**
   *
   * @return string 
   */
  public function get_namespace() {
    return $this->namespace;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_namespace() {
    return (isset($this->namespace) && !empty($this->namespace));
  }
  
  /**
   *
   * @param string $location 
   */
  public function set_location($location) {
    $this->location = $location;
  }
  
  /**
   *
   * @return string 
   */
  public function get_location() {
    return $this->location;
  }
  
  /**
   *
   * @return boolean
   */
  public function isset_location() {
    return (isset($this->location) && !empty($this->location));
  }
  
  /**
   *
   * @param string $prefix 
   */
  public function set_prefix($prefix) {
    $this->prefix = $prefix;
  }
  
  /**
   *
   * @return type 
   */
  public function get_prefix() {
    return $this->prefix;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_prefix() {
    return (isset($this->prefix) && !empty($this->prefix));
  }
}
?>
