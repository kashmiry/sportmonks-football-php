<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Bookmakers
 * @package Sportmonks\Football\Endpoint
 */
class Bookmakers extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/odds/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers
     */
    public function all() {
        $url = "bookmakers";
        return $this->call($url);
    }

    /**
     * @param int $bookmakerId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id
     */
    public function getById(int $bookmakerId) {
        $url = "bookmakers/{$bookmakerId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-search
     */
    public function search(string $searchQuery) {
        $url = "bookmakers/search/" . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @param int $bookmakerId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId) {
        $url = "bookmakers/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
