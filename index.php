<?php
require_once 'curation_tool.inc';

$settings = new METSSetup();
$settings->root = '/home/jon/Documents/repo/';

$xmlData = new XMLData();

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


$dirProc = new metsDirectoryProcessor($settings);
$dirProc->process_dataset();
?>
