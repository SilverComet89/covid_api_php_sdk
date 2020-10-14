<?php
require __DIR__ . '/../vendor/autoload.php';

$filters = new Api\Filter\filter;
$filters->addFilter('testmetric', 'testvalue');
$filters->addFilter('testmetric2', 'testvalue2');

$structure = new Api\Structure\structure;
$structure->addStructure('display1', 'metric1');
$structure->addStructure('display2', ['subdisplay'=>'submetric']);
echo $filters->getFilterString().'&'.$structure->getStructureString();