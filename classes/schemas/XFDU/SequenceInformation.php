<?php

/**
 * Description of SequenceInformation. Stores XDFU sequence information data.
 * Implemented as a Bean type data structure with public Class attributes.
 *
 * @author olendorf
 *
 */
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

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
  
  /**
   * @todo Refractor SequenceInformation to use setters, getters and isseters
   */
}
?>
