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
    
    $xfdu->set_informationPackageMap(new InformationPackageMap());
    $xfdu->set_dataObjectSection(new DataObjectSection());
    $xfdu->set_metadataSection(new MetadataSection());
    $xfdu->set_behaviorSection(new BehaviorSection);
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
  
  /**
   *
   * @param XFDUSetup $settings
   * @return XMLData 
   */
  protected function build_XMLdata(XFDUSetup $settings) {
    $xmlData = new XMLData();
    return $xmlData->set_any($settings->xmlData);
  }
  
  /**
   *
   * @param string $dataObjectID
   * @param string $id
   * @return DataObjectPointer 
   */
  public function build_dataObjectPointer($dataObjectID, $id = null) {
    $dataObjectPointer =  new DataObjectPointer();
    $dataObjectPointer->set_dataObjectID($dataObjectID);
    if($id != null) {
      $dataObjectPointer->set_id($id);
    }
    return $dataObjectPointer;
  }
  
  public function build_contentUnit($contentUnitID, aXMLElement $content) {
    if(get_class($content) != 'DataObjectPointer' && get_class($content) != 'Reference') {
      $message = 'Invalid element type '.get_class($content).
              ' found. DataObjectPointer or Reference expected.';
      $code = 0;
      $previous = null;
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    $contentUnit = new ContentUnit();
    $contentUnit->set_id($contentUnitID);
    
    if(get_class($content) == 'DataObjectPointer') {
      $contentUnit->set_dataObjectPointer($content);
    }
    else {
      $contentUnit->set_XFDUPointer($xfduPointer);
    }
    
    return $contentUnit;
  }
  
}

?>
