<?php
require_once dirname(__FILE__) . '/../../../curation_tool.inc';

/**
 * A place holder class for bin64 data.
 * Currently an XML wrapper. 
 *
 * @author Jon Wheeler
 */
class BinData extends aMETSElement{
  
	/**
	 *
	 * @param type $prefix
	 * @return DOMElement;
	 */
	public function get_as_DOM($prefix = NULL) {
		$dom = new DOMDocument($this->XMLVersion, $this->XMLEncoding);
	
		$binData = $dom->createElement('xmlData');
	
		return $xmlData;
	}
	
}

?>
