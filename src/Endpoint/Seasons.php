<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Seasons
 * @package Sportmonks\Football\Endpoint
 */
class Seasons extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-all-seasons
     */
    public function all() {
        $url = "seasons";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-id
     */
    public function getById(int $seasonId) {
        $url = "seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id
     */
    public function getByTeamId(int $teamId) {
        $url = "seasons/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "seasons/search/{$searchQuery}";
        return $this->call($url);
    }
}
