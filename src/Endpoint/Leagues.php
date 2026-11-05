<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\Exception\InvalidDateFormatException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Leagues extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues
     */
    public function all(): stdClass
    {
        $url = 'leagues';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-league-by-id
     */
    public function getById(int $leagueId): stdClass
    {
        $url = "leagues/{$leagueId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-live
     */
    public function live(): stdClass
    {
        $url = 'leagues/live';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date
     */
    public function getByFixtureDate(string $date): stdClass
    {
        $date = FootballApiHelper::verifyDate($date);
        $url = "leagues/date/{$date}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        $url = "leagues/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'leagues/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        $url = "leagues/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id
     */
    public function getCurrentByTeamId(int $teamId): stdClass
    {
        $url = "leagues/teams/{$teamId}/current";
        return $this->call($url);
    }
}
