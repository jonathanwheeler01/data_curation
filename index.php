<?php
require_once 'curation_tool.inc';

$dom = new DOMDocument('1.0', 'UTF-8');

$dom->load('tests/classes/schemas/XFDU/files/xfdu-xfdu-test.xml');

print $dom->saveXML();
?>
