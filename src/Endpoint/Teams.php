<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Teams extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-all-teams
     */
    public function all(): stdClass
    {
        return $this->call('teams');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-team-by-id
     */
    public function getById(int $teamId): stdClass
    {
        return $this->call("teams/{$teamId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        return $this->call("teams/countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("teams/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('teams/search/' . rawurlencode($searchQuery));
    }
}
