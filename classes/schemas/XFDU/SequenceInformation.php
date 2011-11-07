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
 * Description of SequenceInformation. Stores XDFU sequence information data.
 * Implemented as a Bean type data structure with public Class attributes.
 *
 * @author olendorf
 *
 */
class SequenceInformation extends aXMLElement{
  /**
   * The XFDU's position in the sequence. The value should be zero if unknown.
   * @var <integer>
   */
  public $sequencePosition;

  /**
   * The total number of XFDU packages in the sequence. The value should be
   * zero if unknown.
   * @var <integer>
   */
  public $sequenceSize;

  /**
   * A readable expression of the Sequence Information.
   * @var <string>
   */
  public $value;
}
?>
