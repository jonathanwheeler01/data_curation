<?php
require_once 'curation_tool.inc';
//$dom = new DOMDocument('1.0', 'UTF-8');
$settings = new XFDUSetup();
//$settings = new METSSetup();
$settings->root = 'c:/repo/';

$xmlData = new XMLData();

/*$dc = $dom->appendChild($dom->createElement('dcwrapper'));
$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
$dcElement->appendChild($dom->createTextNode('Jon Wheeler'));
$dc->appendChild($dcElement = $dom->createElement('dcterms:contributor'));
$dcElement->appendChild($dom->createTextNode('Lori Townsend'));
$dc->appendChild($dcElement = $dom->createElement('dcterms:created'));
$dcElement->appendChild($dom->createTextNode('2012-05-27'));*/

//$xpath = new DOMXPath($dom);
//$xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
////$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');

//$query = '/dcwrapper/*';
//$settings->xmlData = $xmlData->set_any($xpath->query($query, $dc));

$dom = new DOMDocument('1.0', 'UTF-8');
$dc = $dom->appendChild($dom->createElement('dcwrapper'));
$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
$dcElement->appendChild($dom->createTextNode('Robert Olendorf'));
$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
$dcElement->appendChild($dom->createTextNode('Jane Doe'));
$dc->appendChild($dcElement = $dom->createElement('dc:contributor'));
$dcElement->appendChild($dom->createTextNode('Johnson J. Johnson Jr. III'));
$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
$dcElement->appendChild($dom->createTextNode('example'));
$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
$dcElement->appendChild($dom->createTextNode('curation tool'));
$dc->appendChild($dcElement = $dom->createElement('dc:subject'));
$dcElement->appendChild($dom->createTextNode('example'));

$xpath = new DOMXPath($dom);
$xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');

$query = '/dcwrapper/*';
$settings->descriptiveMetadata = $xmlData->set_any($xpath->query($query, $dc));



$dirProc = new DirectoryProcessor($settings);
$dirProc->process_dataset();
?>
