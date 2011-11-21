<?php
require_once 'curation_tool.inc';

$xfdu = new XFDU();
$xfdu->set_id('test');
print $xfdu->get_id();
$xfdu->get_as_DOM();
?>
