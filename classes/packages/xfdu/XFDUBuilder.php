<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * A helper class to create often needed elements.
 *
 * @author olendorf
 * 
 */
class XFDUBuilder {
  
  /**
   *
   * @param XFDUSetup $settings
   * @return \XFDU 
   */
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
        $xmlData = $this->build_XMLData($settings);
        
        $environmentInfo->set_xmlData($xmlData);
        
        $dom = new DOMDocument('1.0', 'UTF-8');
        print $dom->saveXML($dom->importNode($environmentInfo->get_as_DOM(), TRUE));
      }
      
      $packageHeader->set_environmentInfo($environmentInfo);
    }
    
    $informationPackageMap = new InformationPackageMap();
    $metadataSection = new MetadataSection();
    $behaviorSection = new BehaviorSection();
    
    $xfdu = new XFDU();
    
    // Add Dublin Core and Qualified Dublin Core Namespaces at the root XFDU
    // element. Dublin Core is used at least twice in every document so this
    // saves work in namespace declaration.
    $dc = new XMLNameSpace(
            'http://purl.org/dc/elements/1.1/', 
            'http://dublincore.org/schemas/xmls/qdc/2008/02/11/dc.xsd', 
            'dc'
            );
    $dcTerms = new XMLNameSpace(
            'http://purl.org/dc/terms/', 
            'http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd', 
            'dcterms'
            );
    $xfdu->add_namespace($dc);
    $xfdu->add_namespace($dcTerms);
    
    
    $xfdu->set_packageHeader($packageHeader);
    $xfdu->set_informationPackageMap($informationPackageMap);
    $xfdu->set_metadataSection($metadataSection);
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
    $data = @$dom->loadXML($settings->xmlData);
    
    // Xpath gets the nodelist
    $xpath = new DOMXPath($dom);
    $xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
    $query = '/*';
    $elements = $xpath->query($query);
    $xmlData->set_any($dom->getElementsByTagName('wrapper'));
    
    return $xmlData;
  }
  
  /**
   * Since XFDU subtypes the base refernce type extensively wiht no modification
   * this class does all the work. Calling classes just set the subclass
   * @param string $locatorType either URL or OTHER
   * @param string $location The location of the referenced resource.
   * @param string $textInfo Text in user readable format about the reference
   * @param string $otherLocatorType If locator type is OTHER, this must be set.
   * @param string $id
   * @param string $refType one of the Subclasses of reference
   * @return Reference
   * @throws InvalidArgumentException 
   */
  private function build_ReferenceSubtype($locatorType,
                                    $location, 
                                    $textInfo = NULL, 
                                    $otherLocatorType = NULL, 
                                    $id = NULL,
                                    $refType = 'Reference') {
    $reference = new $refType();
    $reference->set_locatorType($locatorType);
    
    if($locatorType == 'URL') {
      $reference->set_href($location);
    }
    else if($locatorType == "OTHER"){
      $reference->set_locator($location);
      if(!$otherLocatorType) {
        $message = 'You must define an "otherLocatorType" if the locatoryType is "OTHER"';
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code, $previous);
      }
      $reference->set_otherLocatorType($otherLocatorType);
    }
    
    if($textInfo) {$reference->set_textInfo($textInfo);}
    if($id) {$reference->set_id($id);}
    
    return $reference;
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
  public function build_XFDUPointer($locatorType,
                                    $location, 
                                    $textInfo = NULL, 
                                    $otherLocatorType = NULL, 
                                    $id = NULL) {
    return $this->build_ReferenceSubtype($locatorType, $location, $textInfo, $otherLocatorType, $id, 'XFDUPointer');
  }
  
  /**
   *
   * @param aXFDUElement $content
   * @param string $id
   * @param string $unitType
   * @param string $textInfo
   * @return ContentUnit
   * @throws InvalidArgumentException 
   */
  public function build_contentUnit(aXFDUElement $content = NULL, $id = NULL, $unitType = NULL, $textInfo = NULL) {
    
    if($content != NULL) {
      if(get_class($content) != 'XFDUPointer' && get_class($content) != 'DataObjectPointer') {
        $message = 'Invalid content type. Expected an XFDUPointer or dataObjectPointer expected. '.
                'Encounter '.get_class($content);
        $code = 0;
        $previous = NULL;
        throw new InvalidArgumentException($message, $code,$previous);
      }
    }
    
    $contentUnit = new ContentUnit();
    if(get_class($content) == 'XFDUPointer') {$contentUnit->set_XFDUPointer($content);}
    if(get_class($content) == 'DataObjectPointer') {$contentUnit->set_dataObjectPointer($content);}
    if($id) {$contentUnit->set_id($id);}
    if($unitType) {$contentUnit->set_unitType($unitType);}
    if($textInfo) {$contentUnit->set_textInfo($textInfo);}
    
    return $contentUnit;
  }
  
  public function build_fileLocation($locatorType,
                                    $location, 
                                    $textInfo = NULL, 
                                    $otherLocatorType = NULL, 
                                    $id = NULL) {
    return $this->build_ReferenceSubtype($locatorType, $location, $textInfo, $otherLocatorType, $id, 'FileLocation');
  }
  
  private function build_checksumInformation($data, $checksumName = 'SHA1') {
    $checksum = new ChecksumInformation();
    $checksum->set_checksumName($checksumName);
    switch($checksumName) {
      case 'SHA1':
        if(is_file($data)){$checksum->set_value(sha1_file($data));}
        else {$checksum->set_value(sha1($data));}
        break;
      case 'MD5':
        if(is_file($data)){$checksum->set_value(md5_file($data));}
        else {$checksum->set_value(md5($data));}
        break;
      default:
        $message = 'ChecksumName should be one of SHA1 or MD5. '.$checksumName.' found.';
        $code = 0;
        $prevoius = NULL;
        throw new InvalidArgumentException($message, $code, $prevoius);
    }
    return $checksum;
  }
  
  /**
   *
   * @param FileLocation $fileLocation
   * @param string $file
   * @param type $id
   * @return ByteStream 
   */
  public function build_byteStream_from_fileLocation(FileLocation $fileLocation, $file ,$id = NULL, $checksumName = 'SHA1') {    
    $byteStream = new ByteStream();
    
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $byteStream->set_mimeType($finfo->file($file))
            ->set_size(filesize($file))
            ->add_fileLocation($fileLocation)
            ->set_checksum($this->build_checksumInformation($file, $checksumName));
    if($id){$byteStream->set_id($id);}
    
    return $byteStream;
  }
  
  public function build_metadataObject(aXFDUElement $metadata, $id = NULL, $category = NULL, $class = NULL) {
    if(get_class($metadata) != 'MetadataReference' && 
       get_class($metadata) != 'MetadataWrap' &&
       get_class($metadata) != 'DataObjectPointer') {
      $message = 'Expected one of MetadataReference or MetadataWrap, '.get_class($metadata).
                 ' encountered.';
      $code = 0;
      $previous = NULL;
      throw new InvalidArgumentException($message, $code, $previous);
    }
    
    $categories = array('DMD', 'ANY', 'PDI', 'REP');
    $otherCategory = NULL;
    if(!in_array($category, $categories) && $category != NULL){
      $otherCategory = $category;
      $category = 'OTHER';
    }
    
    $classifications = array('DESCRIPTION', 'CONTEXT', 'DED', 'FIXITY', 'PROVENANCE', 'REFERENCE', 'SYNTAX');
    $otherClassification = NULL;
    if(!in_array($class, $classifications) && $class != NULL){
      $otherClassification = $class;
      $class = 'OTHER';
    }
    
    $metadataObject = new MetadataObject();
    if(get_class($metadata) == 'MetadataReference') {
      $metadataObject->set_metadataReference($metadata);
    }
    if(get_class($metadata) == 'MetadataWrap') {
      $metadataObject->set_metadataWrap($metadata);
    }
    if(get_class($metadata) == 'DataObjectPointer') {
      $metadataObject->set_dataObjectPointer($metadata);
    }
    if($category){$metadataObject->set_category($category);}
    if($otherCategory){$metadataObject->set_otherCategory($otherCategory);}
    if($class){$metadataObject->set_classification($class);}
    if($otherClassification){$metadataObject->set_otherClass($otherClassification);}
    if($id){$metadataObject->set_id($id);}
    return $metadataObject;
  }
}

?>
