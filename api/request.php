<?php
namespace Api;

use Api\Filter\filter;

class request {
    const DATA_URI = 'https://api.coronavirus.data.gov.uk/v1/data'; // URL documented here https://coronavirus.data.gov.uk/developers-guide

    public function make_request() {
        $this->get_request_url();
    }

    public function get_request_url() {
        
    }
}