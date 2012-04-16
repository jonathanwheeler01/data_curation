<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 *    This file is part of data_curation.

 *    data_curation is free software: you can redistribute it and/or modify
 *    it under the terms of the Apache License, Version 2.0 (See License at the
 *    top of the directory).

 *    data_curation is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

 *    You should have received a copy of the Apache License, Version 2.0
 *    along with data_curation.  If not, see <http://www.apache.org/licenses/LICENSE-2.0.html>.
 */

/**
 * Description of XFDUSetup
 *
 * @author olendorf
 * 
 */
class XFDUSetup {
  /**
   *
   * @var float 
   */
  public $xmlVersion = '1.0';
  
  /**
   *
   * @var string
   */
  public $xmlEncoding = 'UTF-8';
  
  /**
   * The version of XFDU being used.
   * @var float 
   */
  public $version = 1.0;
  
  /**
   *
   *the path to the top most directory in the data set to be worked on. 
   * @var string
   */
  public $root;
  
  /**
   * ID for the package header. Defaults to <strong>packageHeader</strong> if left blank; 
   * @var string 
   */
  public $packageHeaderID = 'packageHeader';
  
  /**
   * If the XFDU package is one of a series, set this to the position of the series.
   * @var integer 
   */
  public $sequencePosition;
  
  /**
   * The number of packages in an XFDU series if there is one.
   * @var integer 
   */
  public $sequenceSize;
  
  /**
   * The text to display for sequence info should there be any.
   * @var string
   */
  public $sequenceInfoText;
  
  /**
   * XML data to be included with all XFDU documents in the dataset. For more
   * structure XML metadata use extension.
   * @var string 
   */
  public $xmlData;
  
  /**
   * XML data to be included with all XFDU documents in the dataset. If the XML data
   * doesn't have a root element that is also namespaced, the additional 
   * <strong>$extensionNamespace</strong> attribute must be defined with the 
   * namespace. The <strong>$extensionNamespaceLocation</strong> is optional
   * but allows validation.
   * 
   
   * @var string
   */
  public $extension;
  
  /**
   * If the root element of the the <strong>$extension</strong> does not contain
   * a namespace attribute this must be set or an exception is thrown when the 
   * <strong>get_as_DOM()</strong> method is called.
   * @var string 
   */
  public $extensionNamespace;
  
  /**
   * Specify the prefix for the namespace if needed.
   * @var string 
   */
  public $extensionPrefix;
  
  /**
   * The location for the namespace if desired.
   * @var string
   */
  public $extensionNamespaceLocation;
  
}

?>
