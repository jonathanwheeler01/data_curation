<?php


/**
 * A helper class to create often needed elements.
 *
 * @author olendorf
 * 
 */
class XFDUBuilder {
  public function build_xfdu(XFDUSetup $settings) {
    $packageHeader = $this->build_PackageHeader($settings);
    $packageHeader->set_volumeInfo($this->build_volumeInfo($settings));
    
    if($settings->extension != '' || $settings->xmlData != '') {
      $environmentInfo = new EnvironmentInfo();
      
      if($settings->extension != '') {
        $environmentInfo->set_extension($this->build_extension($settings));
      }
      
      if($settings->xmlData != '') {
        $environmentInfo->set_xmlData($this->build_XMLdata($settings));
      }
      
      $packageHeader->set_environmentInfo($environmentInfo);
    }
    
    $xfdu = new XFDU();
    $xfdu->set_packageHeader($packageHeader);
    return $xfdu;
  }
  
  protected function build_PackageHeader(XFDUSetup $settings) {
    $packageHeader = new PackageHeader();
    $packageHeader->set_id($settings->packageHeaderID);
    return $packageHeader;
  }
  
  /**
   * Returns a volumeInfo object.
   * @param XFDUSetup $settings
   * @return VolumeInfo 
   */
  protected function build_volumeInfo(XFDUSetup $settings) {    
    $volumeInfo = new VolumeInfo();
    $volumeInfo->set_specificationVersion($settings->version);
    
    if($settings->sequenceSize != '' && $settings->sequencePosition != '') {
      $sequenceInformation = new SequenceInformation();
      $sequenceInformation->set_sequenceSize($settings->sequenceSize);
      $sequenceInformation->set_sequencePosition($settings->sequencePosition);
      if($settings->sequenceInfoText != '') {
        $sequenceInformation->set_value($settings->sequenceInfoText);
      }
      $volumeInfo->set_sequenceInformation($sequenceInformation);
    }
    return $volumeInfo;
  }
  
  protected function build_extension(XFDUSetup $settings) {
    $extension = new Extension();
    
    if(sizeof($settings->extensionNamespaces) > 0) {
      foreach ($settings->extensionNamespaces as $namespace) {
        $extension->add_namespace($namespace);
      }
    }

    $extension->set_any($settings->extension);
    
    return $extension;
  }
  
  protected function build_XMLdata(XFDUSetup $settings) {
    $xmlData = new XMLData();
    return $xmlData->set_any($settings->xmlData);
  }
}

?>
