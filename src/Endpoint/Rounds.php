<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Rounds
 * @package Sportmonks\Football\Endpoint
 */
class Rounds extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-all-rounds
     */
    public function all() {
        $url = "rounds";
        return $this->call($url);
    }

    /**
     * @param int $roundId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-round-by-id
     */
    public function getById(int $roundId) {
        $url = "rounds/{$roundId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "rounds/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "rounds/search/{$searchQuery}";
        return $this->call($url);
    }
}
