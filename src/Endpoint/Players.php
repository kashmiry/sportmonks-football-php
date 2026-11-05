<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Players extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-all-players
     */
    public function all(): stdClass
    {
        $url = 'players';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-player-by-id
     */
    public function getById(int $playerId): stdClass
    {
        $url = "players/{$playerId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        $url = "players/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'players/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-last-updated-players
     */
    public function getLastUpdated(): stdClass
    {
        $url = 'players/latest';
        return $this->call($url);
    }
}
