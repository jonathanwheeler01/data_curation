<?php
require_once 'curation_tool.inc';

$tool = new CurationTool();
$xfdu = new XFDU();
$factory = new PackageFactory();

$package = $factory->factory('XFDU');
?>
