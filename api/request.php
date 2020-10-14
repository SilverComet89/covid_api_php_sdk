<?php
namespace Api;

use \Api\Structure;
use \Api\Filter;

class request {
    const DATA_URI = 'https://api.coronavirus.data.gov.uk/v1/data'; // URL documented here https://coronavirus.data.gov.uk/developers-guide
    const SECURE = FALSE; // This is needed for servers which are not sending data securely I.E dev only.
    const DEBUG = false; // This enables logging to the apache error log, it also enables the response code in our function.

    /**
     * make_request function
     * Gets our request and returns a json_encoded array.
     * @return string - json encoded.
     */
    public function make_request() {
        $curl = curl_init();

        // Setting our options.
        $options = [
            CURLOPT_URL => $this->get_request_url(),
            CURLOPT_ENCODING => "gzip",
            CURLOPT_RETURNTRANSFER =>  true
        ];

        // Setting our extra options - please see top of class for info.
        if(SELF::DEBUG){ $options[CURLOPT_VERBOSE] = true; }
        if(!SELF::SECURE) { $options[CURLOPT_SSL_VERIFYPEER] = false; }

        curl_setopt_array($curl, $options);

        $result = curl_exec($curl);

        // https://www.php.net/manual/en/function.curl-errno.php
        if(curl_errno($curl)) {
            throw new \Exception('Issue occurred with CURL request to server: ' . curl_errno($curl));
        }

        // If in debug mode print out the results of our request.
        if(SELF::DEBUG){
            echo '<pre>'.print_r(curl_getinfo($curl),1).'</pre>';
        }

        curl_close($curl);

        return $result;
    }

    public function get_request_url() {
        return SELF::DATA_URI.'?'.Filter\filter::getFilterString().'&'.Structure\structure::getStructureString();
    }
}