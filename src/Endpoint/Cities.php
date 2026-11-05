<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Cities extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-all-cities
     */
    public function all() {
        $url = "cities";
        return $this->call($url);
    }

    /**
     * @param int $cityId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-city-by-id
     */
    public function getById(int $cityId) {
        $url = "cities/{$cityId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-cities-by-search
     */
    public function search($searchQuery) {
        $url = "cities/search/" . rawurlencode((string) $searchQuery);
        return $this->call($url);
    }
}
