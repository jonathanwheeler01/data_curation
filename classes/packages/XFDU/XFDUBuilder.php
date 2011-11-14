<?php
/**
 * Description of XFDUBuilder
 *
 * @author Rob Olendorf
 * 
 */
class XFDUBuilder {
  /**
   * Creates a sequenceInformation object.
   * 
   * @param type $sequencePosition
   * @param type $sequenceSize
   * @param type $value
   * @return SequenceInformation 
   */
  public function buildSequenceInfo($sequencePosition, $sequenceSize, $value) {
    $sequenceInfo = new SequenceInformation();
    $sequenceInfo->set_sequencePosition($sequencePosition);
    $sequenceInfo->set_sequenceSize($sequenceSize);
    $sequenceInfo->set_value($value);
    
    return $sequenceInfo;    
  }
  
  public function buildVolumeInfo($specificationVersion, SequenceInformation $sequenceInformation) {
    
  }
  
  public function buildPackageHeader(VolumeInfo $volumeInfo, SequenceInformation $sequenceInfo) {
    
  }
}

?>
