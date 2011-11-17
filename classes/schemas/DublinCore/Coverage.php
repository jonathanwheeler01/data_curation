<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';
/**
 * The spatial or temporal topic of the resource, the spatial applicability of 
 * the resource, or the jurisdiction under which the resource is relevant.
 * 
 * @example Spatial topic and spatial applicability may be a named place or a 
 * location specified by its geographic coordinates. Temporal topic may be a 
 * named period, date, or date range. A jurisdiction may be a named 
 * administrative entity or a geographic place to which the resource applies. 
 * Recommended best practice is to use a controlled vocabulary such as the 
 * Thesaurus of Geographic Names [TGN]. Where appropriate, named places or time 
 * periods can be used in preference to numeric identifiers such as sets of 
 * coordinates or date ranges.
 *
 * @author Rob Olendorf
 * 
 */
class Coverage extends aDCElement{}

?>
