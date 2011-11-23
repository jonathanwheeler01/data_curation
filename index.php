<?php
require_once 'curation_tool.inc';
$element = new XMLElement('parent');

$child1 = new XMLElement('child1');
$child2 = new XMLElement('child2');

$element->append_child($child1);
print sizeof($element->get_children()).'<br/>';
$element->append_child($child2);
print sizeof($element->get_children()).'<br/>';
$element->append_child($child1);
print sizeof($element->get_children()).'<br/>';
$element->remove_child($child1);
print sizeof($element->get_children()).'<br/>';
?>
