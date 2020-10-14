<?php
namespace Api;

use \Api\Filter\filter;
use \Api\Structure;

$filters = new filter;
$filters->addFilter('testmetric', 'testvalue');
$filters->addFilter('testmetric2', 'testvalue2');

$structure = new Structure\structure;
$structure->addStructure('display1', 'metric1');
$structure->addStructure('display2', ['subdisplay'=>'submetric']);
echo $filters->getFilterString().'&'.$structure->getStructureString();