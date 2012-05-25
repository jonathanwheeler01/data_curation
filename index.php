<?php
require_once 'curation_tool.inc';
$dom = new DOMDocument('1.0', 'UTF-8');
$settings = new XFDUSetup();
$settings->repository = DIRECTORY_SEPARATOR.'repo';
$settings->root = 'olendorf'.DIRECTORY_SEPARATOR.'fake';


$dc = $dom->appendChild($wrapper = $dom->createElement('wrapper'));
$wrapper->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:dc', 'http://purl.org/dc/elements/1.1/');
$wrapper->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:dcterms', 'http://purl.org/dc/terms/');
$dc->appendChild($dcElement = $dom->createElementNS('http://purl.org/dc/elements/1.1/', 'dc:creator'));
$dcElement->appendChild($dom->createTextNode('Jon Wheeler'));
$dc->appendChild($dcElement = $dom->createElementNS('http://purl.org/dc/terms/', 'dcterms:contributor'));
$dcElement->appendChild($dom->createTextNode('Lori Townsend'));
$dc->appendChild($dcElement = $dom->createElementNS('http://purl.org/dc/terms/', 'dcterms:created'));
$dcElement->appendChild($dom->createTextNode('2012-05-27'));

$settings->xmlData = $dom->saveXML($dc);

//$dom = new DOMDocument('1.0', 'UTF-8');
//$dc = $dom->appendChild($dom->createElement('dcwrapper'));
//$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
//$dcElement->appendChild($dom->createTextNode('Robert Olendorf'));
//$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
//$dcElement->appendChild($dom->createTextNode('Jane Doe'));
//$dc->appendChild($dcElement = $dom->createElement('dc:contributor'));
//$dcElement->appendChild($dom->createTextNode('Johnson J. Johnson Jr. III'));
//$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
//$dcElement->appendChild($dom->createTextNode('example'));
//$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
//$dcElement->appendChild($dom->createTextNode('curation tool'));
//$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
//$dcElement->appendChild($dom->createTextNode('example'));
//
//$xpath = new DOMXPath($dom);
//$xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
//$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');
//
//$query = '/dcwrapper/*';
//$settings->descriptiveMetadata = $xmlData->set_any($xpath->query($query, $dc));



$dirProc = new DirectoryProcessor($settings);
$dirProc->process_dataset();
?>
