<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Teams
 * @package Sportmonks\Football\Endpoint
 */
class Teams extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-all-teams
     */
    public function all() {
        $url = "teams";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-team-by-id
     */
    public function getById(int $teamId) {
        $url = "teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-country-id
     */
    public function getByCountryId(int $countryId) {
        $url = "teams/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "teams/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "teams/search/" . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
