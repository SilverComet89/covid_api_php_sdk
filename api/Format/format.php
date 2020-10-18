<?php
namespace Api\Format;

class format {
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';
    const FORMAT_CSV = 'csv';

    static $format = SELF::FORMAT_JSON;

    /**
      * format function
      *
      * @param string $reportFormat
      * @param boolean $includeHeader
      * @return request
      */
      public function format(string $reportFormat=SELF::FORMAT_JSON, $includeHeader=TRUE) {
        ($includeHeader) ? $this->heading($reportFormat) : '';
        self::$format = $reportFormat;
    }

    /**
     * heading function
     *
     * @param string $format
     * @return void
     */
    public function heading(string $format) {
        switch($format) {
            case SELF::FORMAT_JSON:
                header('Content-Type: application/json');
                return true;
            break;
            case SELF::FORMAT_XML: 
                header('Content-Type: application/xml; charset=utf-8');
                return true;
            break;
            case SELF::FORMAT_CSV:
                header("Content-type: text/csv");
                header("Content-Disposition: attachment; filename=".date('Y-m-d')."-covidReports.csv");
                header("Pragma: no-cache");
                header("Expires: 0");
                return true;
            break;
        }

        throw new \Exception('Heading format was not recognised.');
    }

    /**
     * getLatestBy function
     * @return string
     */
    public static function getFormatString() {
        return 'format='.self::$format;
    }
}
     