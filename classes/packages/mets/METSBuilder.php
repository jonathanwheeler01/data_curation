<?php
require_once dirname(__FILE__).'/../../../curation_tool.inc';

/*
 * A helper class to create often needed elements
 * 
 * @author Wheeler
 * 
 */

class METSBuilder {
    public function build_mets(METSSetup $settings) {
        $metsHdr = new MetsHdr();
        $metsHdr->set_id($settings->metsHdrID);
        
        $dmdSec = new DmdSec();
        $amdSec = new AmdSec();
        $fileSec = new FileSec();
        $structMap = new StructMap();
        $structLink = new StructLink();
        $behaviorSec = new BehaviorSec();
        
        $mets = new METS();
        $mets->set_metsHdr($metsHdr);
        $mets->set_dmdSec($dmdSec);
        $mets->set_amdSec($amdSec);
        $mets->set_fileSec($fileSec);
        $mets->set_structMap($structMap);
        $mets->set_structLink($structLink);
        $mets->set_behaviorSec($behaviorSec);
        
        return $mets;
    }

/**
 *
 * @param aMETSElement $content
 * @param string $ID
 * @return structLink
 * @throws InvalidArgumentException
 */
public function build_structLink(aMETSElement $content = NULL, $ID = NULL) {

	if($content != NULL) {
		if(get_class($content) != 'metsPointer') {
			$message = 'Invalid content type. Expected a metsPointer. '.
					'Encountered: '.get_class($content);
			$code = 0;
			$previous = NULL;
			throw new InvalidArgumentException($message, $code,$previous);
		}
	}

	$structLink = new StructLink();
	if(get_class($content) == 'metsPointer') {
		$structLink->set_smLink($content);
	}
	if($ID) {
		$contentUnit->set_ID($ID);
	}

	return $structLink;
}

/**
 *
 * @param FLocat $href
 * @param string $file
 * @param type $id
 * @return ByteStream
 */
public function build_stream_from_fileLocation(FLocat $href, $file ,$id = NULL, $checksumName = 'SHA1') {
	$fileStream = new File();

	$finfo = new finfo(FILEINFO_MIME_TYPE);
	$fileStream->set_MIMETYPE($finfo->file($file))
	->set_SIZE(filesize($file));
	//->set_CHECKSUM($this->build_checksumInformation($file, $checksumName));
	if($id){
		$fileStream->set_ID($id);
	}

	return $fileStream;
}

}

?>
