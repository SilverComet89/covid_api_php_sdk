<?php
require __DIR__ . '/../vendor/autoload.php';

// We start creating filters using the metrics.
$filters = new Api\Filter\filter;
$filters->addFilter(Api\Filter\filter::METRIC_AREA_TYPE, Api\Filter\areaType::AREA_TYPE_OVERVIEW);

// We start creating structures, if no display name is set the metric default will be used.
$structure = new Api\Structure\structure;
$structure->addStructure(Api\Structure\structure::METRIC_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_AREA_NAME);
$structure->addStructure(Api\Structure\structure::METRIC_AREA_CODE);
$structure->addStructure(Api\Structure\structure::METRIC_NEW_CASES_BY_PUBLISH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_CUM_CASES_BY_PUBLISH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_NEW_DEATHS_28_DAYS_BY_DEATH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_CUM_DEATHS_28_DAYS_BY_DEATH_DATE);

$format = new Api\Format\format;
$format->format(Api\Format\format::FORMAT_JSON);

$page = new Api\Page\page;
$page->setPage(1);

$request = new Api\request;
echo $request->make_request();