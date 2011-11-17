<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * The nature or genre of the resource.
 * Recommended best practice is to use a controlled vocabulary such
 *  as the DCMI Type Vocabulary [DCMITYPE]. To describe the file format, 
 * physical medium, or dimensions of the resource, use the Format element.
 *
 * @author Rob Olendorf
 * 
 */
class Type extends aDCElement{}

?>