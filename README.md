# covid_api_php_sdk
An unofficial SDK for connecting to the UK government COVID-19 API via PHP using curl requests.

**Please note that you should always make sure this API is valid for your use-case**
https://coronavirus.data.gov.uk/developers-guide

## Installation

To install via composer use:
```bash
composer require silvercomet89/covid-19_api_php_sdk
```

## Basic Example

Below is a copy of a basic example, this is the same as the structure example on the developer-guide produced by the UK government except that 2 metrics they list there are no longer in their list of valid metrics. You can find this example inside the code under the examples folder.

```php
require __DIR__ . '/../vendor/autoload.php';

// We start creating filters using the metrics.
$filters = new Api\Filter\filter;
$filters->addFilter(Api\Filter\filter::METRIC_AREA_TYPE, Api\Filter\areaType::AREA_TYPE_NATION);
$filters->addFilter(Api\Filter\filter::METRIC_AREA_NAME, 'england');

// We start creating structures, if no display name is set the metric default will be used.
$structure = new Api\Structure\structure;
$structure->addStructure(Api\Structure\structure::METRIC_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_AREA_NAME);
$structure->addStructure(Api\Structure\structure::METRIC_AREA_CODE);
$structure->addStructure(Api\Structure\structure::METRIC_NEW_CASES_BY_PUBLISH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_CUM_CASES_BY_PUBLISH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_NEW_DEATHS_28_DAYS_BY_DEATH_DATE);
$structure->addStructure(Api\Structure\structure::METRIC_CUM_DEATHS_28_DAYS_BY_DEATH_DATE);

$request = new Api\request;

// We set our content type here so we have a clear interface.
header('Content-Type: application/json');
echo $request->make_request();
```
