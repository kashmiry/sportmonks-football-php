<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Continents extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/continents/get-all-continents
     */
    public function all() {
        $url = "continents";
        return $this->call($url);
    }

    /**
     * @param int $continentId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/continents/get-continent-by-id
     */
    public function getById(int $continentId) {
        $url = "continents/{$continentId}";
        return $this->call($url);
    }
}
