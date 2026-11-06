<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Players extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-all-players
     */
    public function all(): stdClass
    {
        return $this->call('players');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-player-by-id
     */
    public function getById(int $playerId): stdClass
    {
        return $this->call("players/{$playerId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        return $this->call("players/countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('players/search/' . rawurlencode($searchQuery));
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-last-updated-players
     */
    public function getLastUpdated(): stdClass
    {
        return $this->call('players/latest');
    }
}
