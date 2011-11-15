<?php
/**
 * Bean type data structure to hold settings for creating an XFDU package. This 
 * simplifies the API and circumvents issues with PHP not having method overriding
 * to handle different setup scenarios.
 *
 * @author Rob Olendorf
 */
class PackageSetup {
  public $root;
}

?>
