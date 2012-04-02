<?php
/**
 * @author Robert Olendorf
 */

class XFDUPackage {
  protected $xfdu;
  
  public function __construct(XFDUSetup $settings) {
    $this->xfdu = new XFDU();
  }
}

?>
