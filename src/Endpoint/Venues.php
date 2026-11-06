<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Venues extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-all-venues
     */
    public function all(): stdClass
    {
        return $this->call('venues');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venue-by-id
     */
    public function getById(int $venueId): stdClass
    {
        return $this->call("venues/{$venueId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venues-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("venues/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venues-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('venues/search/' . rawurlencode($searchQuery));
    }
}
