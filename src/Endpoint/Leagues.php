<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\Exception\InvalidDateFormatException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Leagues
 * @package Sportmonks\Football\Endpoint
 */
class Leagues extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues
     */
    public function all() {
        $url = "leagues";
        return $this->call($url);
    }

    /**
     * @param int $leagueId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-league-by-id
     */
    public function getById(int $leagueId) {
        $url = "leagues/{$leagueId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-live
     */
    public function live() {
        $url = "leagues/live";
        return $this->call($url);
    }

    /**
     * @param string $date
     * @return stdClass
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date
     */
    public function getByFixtureDate(string $date) {
        $date = FootballApiHelper::verifyDate($date);
        $url = "leagues/date/{$date}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id
     */
    public function getByCountryId(int $countryId) {
        $url = "leagues/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "leagues/search/{$searchQuery}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id
     */
    public function getByTeamId(int $teamId) {
        $url = "leagues/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id
     */
    public function getCurrentByTeamId(int $teamId) {
        $url = "leagues/teams/{$teamId}/current";
        return $this->call($url);
    }
}
