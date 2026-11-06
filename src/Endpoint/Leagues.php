<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\Exception\InvalidDateFormatException;
use Kash\Sportmonks\Football\FootballApiHelper;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Leagues extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues
     */
    public function all(): stdClass
    {
        return $this->call('leagues');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-league-by-id
     */
    public function getById(int $leagueId): stdClass
    {
        return $this->call("leagues/{$leagueId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-live
     */
    public function live(): stdClass
    {
        return $this->call('leagues/live');
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date
     */
    public function getByFixtureDate(string $date): stdClass
    {
        $date = FootballApiHelper::verifyDate($date);
        return $this->call("leagues/date/{$date}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        return $this->call("leagues/countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('leagues/search/' . rawurlencode($searchQuery));
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        return $this->call("leagues/teams/{$teamId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id
     */
    public function getCurrentByTeamId(int $teamId): stdClass
    {
        return $this->call("leagues/teams/{$teamId}/current");
    }
}
