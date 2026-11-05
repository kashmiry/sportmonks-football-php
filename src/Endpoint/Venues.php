<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Venues extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-all-venues
     */
    public function all(): stdClass
    {
        $url = 'venues';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venue-by-id
     */
    public function getById(int $venueId): stdClass
    {
        $url = "venues/{$venueId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venues-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "venues/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/venues/get-venues-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'venues/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
