<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class My extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/my/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-enrichments
     */
    public function enrichments() {
        $url = "enrichments";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-resources
     */
    public function resources() {
        $url = "resources";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-leagues
     */
    public function leagues() {
        $url = "leagues";
        return $this->call($url);
    }
}
