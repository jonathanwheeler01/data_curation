<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * A helper class to create often needed elements.
 *
 * @author olendorf
 * 
 */
class XFDUBuilder {
  public function build_xfdu(XFDUSetup $settings) {
    $packageHeader = new PackageHeader();
    $packageHeader->set_id($settings->packageHeaderID);
    $packageHeader->set_volumeInfo($this->build_volumeInfo($settings));
    
    if(isset($settings->extension) || isset($settings->xmlData)) {
      $environmentInfo = new EnvironmentInfo();
      if(isset($settings->extension)) {
        $environmentInfo->set_extension($this->build_extension($settings));
      }
      
      if(isset($settings->xmlData)) {
        $environmentInfo->set_xmlData($this->build_XMLData($settings));
      }
    }
    
    $informationPackageMap = new InformationPackageMap();
    $metadataSection = new MetadataSection();
    $dataObjectSection = new DataObjectSection();
    $behaviorSection = new BehaviorSection();
    
    $xfdu = new XFDU();
    $xfdu->set_packageHeader($packageHeader);
    $xfdu->set_informationPackageMap($informationPackageMap);
    $xfdu->set_metadataSection($metadataSection);
    $xfdu->set_dataObjectSection($dataObjectSection);
    $xfdu->set_behaviorSection($behaviorSection);
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

    if($settings->extensionNamespace != '') {
      $namespace = new XMLNameSpace();
      $namespace->set_uri($settings->extensionNamespace);
      $namespace->set_prefix($settings->extensionPrefix);
      $namespace->set_location($settings->extensionNamespaceLocation);

      $extension->add_namespace($namespace);
    }
    
    // load the XML but turn off warnings as working with 
    $dom = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    @$dom->loadXML($settings->extension);

    // Xpath gets the nodelist
    $xpath = new DOMXPath($dom);
    $query = '/*';
    $elements = $xpath->query($query);
    $extension->set_any($elements);
    
    return $extension;
  }
  
  /**
   *
   * @param XFDUSetup $settings
   * @return XMLData 
   */
  protected function build_XMLData(XFDUSetup $settings) {
    $dom = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    $xmlData = new XMLData();
    
    // load the XML but turn off warnings as working with 
    $dom = new DOMDocument($settings->xmlVersion, $settings->xmlEncoding);
    @$dom->loadXML($settings->xmlData);
    
    // Xpath gets the nodelist
    $xpath = new DOMXPath($dom);
    $query = '/*';
    $elements = $xpath->query($query);
    $xmlData->set_any($elements);
    
    return $xmlData;
  }
  
  /**
   *
   * @param string $locatorType Should be either URL or OTHER
   * @param string $location The location of the resource
   * @param string $textInfo Information to be displayed in reader friendly format
   * @param string $otherLocatorType If <code>$locatorType</code> is OTHER, this
   * must be set.
   * @param string $id Optional ID for the element.
   * @return XFDUPointer
   * @throws InvalidArgumentException 
   */
  public function build_XDFUPointer($locatorType,
                                    $location, 
                                    $textInfo = NULL, 
                                    $otherLocatorType = NULL, 
                                    $id = NULL) {
    $XFDUPointer = new XFDUPointer();
    $XFDUPointer->set_locatorType($locatorType);
    
    if($locatorType == 'URL') {
      $XFDUPointer->set_href($location);
    }
    else if($locatorType == "OTHER"){
      $XFDUPointer->set_locator($location);
      if(!$otherLocatorType) {
        $message = 'You must define an "otherLocatorType" if the locatoryType is "OTHER"';
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code, $previous);
      }
      $XFDUPointer->set_otherLocatorType($otherLocatorType);
    }
    
    if($textInfo) {$XFDUPointer->set_textInfo($textInfo);}
    if($id) {$XFDUPointer->set_id($id);}
    
    return $XFDUPointer;
  }
}

?>
