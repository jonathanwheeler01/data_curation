<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataObject
 *
 * @author Rob
 */
class DataObject {  
  protected $byteStreams;
  protected $checksum;
  protected $combinationName;
  protected $id;
  protected $mimeType;
  protected $registeredID;
  protected $registrationAuthority;
  protected $repId;
  protected $size;
  protected $transformObject;
  
  
  public function __construct() {
    $this->byteStreams = array();
  }
  
  /**
   * @todo bytestreams
   * @todo checksum depends on checksum class to be implemented
   * @todo combinationName
   * @todo id
   * @todo mimeType
   * @todo registeredID
   * @todo registrationAuthority
   * @todo repID
   * @todo size
   * @todo transformObject dpends on TransformObjectClass
   */
}

?>
