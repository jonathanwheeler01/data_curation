<?php
/**
 * Description of XFDUBuilder
 *
 * @author Rob Olendorf
 * 
 */
class XFDUBuilder {
  /**
   *
   * @param PackageHeader $packageHeader
   * @param InformationPackageMap $informationPackageMap
   * @param MetadataSection $metadataSection = NULL
   * @param DataObjectSection $dataObjectSection = NULL
   * @param BehaviorSection $behaviorSection = NULL
   */
  public function build_XFDU(PackageHeader $packageHeader, 
                             InformationPackageMap $informationPackageMap,
                             MetadataSection $metadataSection = NULL,
                             DataObjectSection $dataObjectSection = NULL,
                             BehaviorSection $behaviorSection = NULL) {
    
    $xfdu = new XFDU();
    $xfdu->set_packageHeader($packageHeader);
    $xfdu->set_informationPackageMap($informationPackageMap);
    
    if($metadataSection !== NULL) {
      $xfdu->set_metadataSection($metadataSection);
    }    
    if($dataObjectSection !== NULL) {
      $xfdu->set_dataObjectSection($dataObjectSection);
    }    
    if($behaviorSection !== NULL) {
      $xfdu->set_behaviorSection($behaviorSection);
    }
    
    return $xfdu;
  }
  
  /**
   *
   * @param type $id
   * @param VolumeInfo $volumeInfo
   * @param EnvironmentInfo $environmentInfo = NULL
   * @return PackageHeader 
   */
  public function build_packageHeader($id, VolumeInfo $volumeInfo, 
                                      EnvironmentInfo $environmentInfo = NULL) {
    $packageHeader = new PackageHeader();
    $packageHeader->set_id($id);
    $packageHeader->set_volumeInfo($volumeInfo);
    if($environmentInfo !== NULL) {
      $packageHeader->set_environmentInfo($environmentInfo);
    }
    
    return $packageHeader;
  }
  
  /**
   * 
   * @param float $specificationVersion
   * @param SequenceInformation $sequenceInformation = NULL
   * @return VolumeInfo 
   */
  public function build_volumeInfo($version = 1.0, SequenceInformation $sequenceInformation = NULL) {
    $volumeInfo = new VolumeInfo();
    $volumeInfo->set_specificationVersion($version);
    if($sequenceInformation !== NULL) {
      $volumeInfo->set_sequenceInformation($sequenceInformation);
    }
    
    return $volumeInfo;
  }
  
  /**
   * Creates a sequenceInformation object.
   * 
   * @param type $sequencePosition
   * @param type $sequenceSize
   * @param type $value
   * @return SequenceInformation 
   */
  public function build_SequenceInfo($sequencePosition, $sequenceSize, $value) {
    $sequenceInfo = new SequenceInformation();
    $sequenceInfo->set_sequencePosition($sequencePosition);
    $sequenceInfo->set_sequenceSize($sequenceSize);
    $sequenceInfo->set_value($value);
    
    return $sequenceInfo;    
  }
  /**
   *
   * @param XMLData $xmlData = NULL
   * @param mixed $extension = NULL
   */
  public function build_environmentInfo(XMLData $xmlData = null, $extension = NULL) {
    $environmentInfo = new EnvironmentInfo();
    if($xmlData !== NULL) {
      $environmentInfo->set_xmlData($xmlData);
    }
    
    if($extension !== NULL) {
      $environmentInfo->set_extension($extension);
    }
  }
  
  /**
   * 
   * @param $xmlData
   * @return XMLData 
   */
  public function build_XMLData($xmlData) {
    $xmlData = new XMLData();
    $xmlData->set_any($xmlData);
    return $xmlData;
  }
}

?>
