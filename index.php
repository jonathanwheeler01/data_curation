<?php
require_once 'curation_tool.inc';
$dom = new DOMDocument('1.0', 'UTF-8');
$settings = new XFDUSetup();
$settings->root = 'c:/repository/olendorf/fake';
$settings->xmlData = $dom->createElement('stuff');

$dirProc = new DirectoryProcessor($settings);
$dirProc->process_dataset();
?>
