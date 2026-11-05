<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Teams extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-all-teams
     */
    public function all(): stdClass
    {
        $url = 'teams';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-team-by-id
     */
    public function getById(int $teamId): stdClass
    {
        $url = "teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        $url = "teams/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "teams/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'teams/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
