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
  protected $uri;
  
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
   * @param type $uri
   * @param type $location
   * @param type $prefix 
   */
  public function __construct($uri = NULL, $location = NULL, $prefix = NULL) {
    $this->location = $location;
    $this->uri = $uri;
    $this->prefix = $prefix;
  }
  
  /**
   *
   * @param string $uri 
   */
  public function set_uri($uri) {
    $this->uri = $uri;
  }
  
  /**
   *
   * @return string 
   */
  public function get_uri() {
    return $this->uri;
  }
  
  /**
   *
   * @return boolean 
   */
  public function isset_uri() {
    return (isset($this->uri) && !empty($this->uri));
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
