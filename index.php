<?php
require_once 'curation_tool.inc';
$dom = new DOMDocument('1.0', 'UTF-8');
$settings = new XFDUSetup();
$settings->root = 'c:/repository/olendorf/fake';

$xmlData = new XMLData();

$dc = $dom->appendChild($dom->createElement('dcwrapper'));
$dc->appendChild($dcElement = $dom->createElement('dc:creator'));
$dcElement->appendChild($dom->createTextNode('Jon Wheeler'));
$dc->appendChild($dcElement = $dom->createElement('dcterms:contributor'));
$dcElement->appendChild($dom->createTextNode('Lori Townsend'));
$dc->appendChild($dcElement = $dom->createElement('dcterms:created'));
$dcElement->appendChild($dom->createTextNode('2012-05-27'));

$xpath = new DOMXPath($dom);
$xpath->registerNamespace('dc', 'http://purl.org/dc/elements/1.1/');
$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');

$query = '/dcwrapper/*';


$elements = $xpath->query($query, $dc);

print $elements->length;


//$dirProc = new DirectoryProcessor($settings);
//$dirProc->process_dataset();
?>
