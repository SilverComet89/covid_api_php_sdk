<?php
namespace Api\Filter;

class filter {
    const METRIC_AREA_TYPE = 'areaType'; // Area type as string (Api\Filter\areaType)
    const METRIC_AREA_NAME = 'areaName'; // Area name as string
    const METRIC_AREA_CODE = 'areaCode'; // Area Code as string
    const METRIC_DATE = 'date'; // Date as string

    static $filters = [];


    /**
     * addFilter function
     * Filter is a required parameter.
     * @param string $metric
     * @param string $value
     * @return array
     */
    public function addFilter(string $metric, string $value) {
        return self::$filters[$metric] = $value;
    }

    /**
     * getFilter function
     * Checks if the given metric exists in the filter array and returns the value on success, returns false on failure.
     * @param string $metric
     * @return mixed on success
     * @return false on failure
     */
    public function getFilter(string $metric) {
        if(array_key_exists($metric, self::$filters)) {
            return self::$filters[$metric];
        }

        return false;
    }

    /**
     * getFilterString function
     *
     * @return string
     */
    public function getFilterString() {
        if(!empty(self::$filters)){
            return 'filter='.http_build_query(self::$filters,'',';');
        }
        
        throw new \Exception('There are no filters currently assigned.');
    }
}