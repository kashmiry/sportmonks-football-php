<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Countries extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-all-countries
     */
    public function all() {
        $url = "countries";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-country-by-id
     */
    public function getById(int $countryId) {
        $url = "countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-countries-by-search
     */
    public function search($searchQuery) {
        $url = "countries/search/" . rawurlencode((string) $searchQuery);
        return $this->call($url);
    }
}
