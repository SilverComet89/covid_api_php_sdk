<?php
namespace Api\LatestBy;

class latestby {

    static $latestBy = NULL; // Must be a structure metric.


    /**
     * addLatestBy function
     * @param string $metric
     * @return string
     */
    public function addLatestBy(string $metric) {
        return self::$latestBy = $metric;
    }



    /**
     * getLatestBy function
     * @return string
     */
    public function getLatestBy() {
        return self::$latestBy;
    }



    /**
     * getLatestByString function
     * @return string|null
     */
    public static function getLatestByString() {
        if(!is_null(self::$latestBy)){
            return 'latestBy='.self::$latestBy;
        }
        
        return self::$latestBy;
    }
}