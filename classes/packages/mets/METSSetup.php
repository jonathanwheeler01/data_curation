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
 * @author Jon Wheeler
 * 
 */

class METSSetup {
    
    /*
     * @var float
     */
    public $xmlVersion = '1.0';
    
    /*
     * @var string
     */
    public $xmlEncoding = 'UTF-8';
    
    /*
     * The version of METS being used
     * @var float
     */
    public $version = '1.9.1';
    
      /**
   * The absolute path the repository the data will reside in.
   * @var string 
   */
  public $repository;
  
  /**
   *
   *the path to the top most directory in the data set to be worked on, relative to
   * the repository root. 
   * @var string
   */
  public $root;
  
  /*
   * ID for the METS meta-metadata. Not sure how this works yet.
   */
  public $metsHdrID = 'metsHdr';
  
  
  /*
   * XFDU source includes multiple sequence setting info
   * need to correlate to METS equivalent
   * 
   * also bypassing extension properties for now
   */
  
  /**
   * Descriptive metadata to be included in with every file in the data
   * set. The data, should be high level and applicable to all files and 
   * directories.
   * @var mixed  
   */
  public $descriptiveMetadata;
  
}
?>
