<?php


/**
 * A helper class to create often needed elements.
 *
 * @author olendorf
 * 
 */
class XFDUBuilder {
  public function build_xfdu(XFDUSetup $settings) {
    $packageHeader = new PackageHeader();
    $packageHeader->set_volumeInfo($this->build_volumeInfo($settings));
    
    if($settings->extension != '' || $settings->xmlData != '') {
      $environmentInfo = new EnvironmentInfo();
      
      if($settings->extension != '') {
      }
    }
    
    $xfdu = new XFDU();
    $xfdu->set_packageHeader($packageHeader);
    return $xfdu;
  }
  
  /**
   * Returns a volumeInfo object.
   * @param XFDUSetup $settings
   * @return VolumeInfo 
   */
  protected function build_volumeInfo(XFDUSetup $settings) {    
    $volumeInfo = new VolumeInfo();
    $volumeInfo->set_specificationVersion($settings->version);
    
    if($settings->sequenceSize != '' && $settings->sequencePosition) {
      $sequenceInformation = new SequenceInformation();
      $sequenceInformation->set_sequenceSize($settings->sequenceSize);
      $sequenceInformation->set_sequencePosition($settings->sequencePosition);
      if($settings->sequenceInfoText != '') {
        $sequenceInformation->set_value($settings->sequenceInfoText);
      }
    }
    return $volumeInfo;
  }
  
  protected function build_extension(XFDUSetup $settings) {
    $dom = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $extension = new Extension();

    if($settings->extensionNamespace != '') {
      $namespace = new XMLNameSpace();
      $namespace->set_uri($settings->extensionNamespace);
      $namespace->set_prefix($settings->extensionPrefix);
      $namespace->set_location($settings->extensionNamespaceLocation);

      $extension->add_namespace($namespace);
    }
    
    $dom = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    @$dom->loadXML($settings->extension);

    // Xpath gets the nodelist
    $xpath = new DOMXPath($dom);
    $query = '/*';
    $elements = $xpath->query($query);
    
    for($i = 0; $i < $elements->length; $i++) {
    }
    
    return $extension;
  }
}

?>
