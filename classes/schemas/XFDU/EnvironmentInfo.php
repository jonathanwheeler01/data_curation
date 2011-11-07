<?php
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
 * Description of EnvironmentInfo. Mimics the XFDU Java API for the XFDU Environment
 * info element with the excpetions that rather than creating a lot of getters
 * and setters, I've decided to treat it as a Bean type data structure with
 * public Class attributes to save coding overhead.
 *
 * @author olendorf
 *
 */

class EnvironmentInfo extends aXMLElement{
  /**
   * Allows application specific extensions of the xfdu
   * @var any
   */
  public $extension;

  /**
   * Freeform XML
   * @var anyXML
   */
  public  $xmlData;
}
?>
