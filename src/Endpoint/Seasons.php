<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Seasons extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-all-seasons
     */
    public function all(): stdClass
    {
        return $this->call('seasons');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-id
     */
    public function getById(int $seasonId): stdClass
    {
        return $this->call("seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        return $this->call("seasons/teams/{$teamId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('seasons/search/' . rawurlencode($searchQuery));
    }
}
