<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Cities extends FootballClient
{
    public string $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-all-cities
     */
    public function all(): stdClass
    {
        $url = 'cities';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-city-by-id
     */
    public function getById(int $cityId): stdClass
    {
        $url = "cities/{$cityId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/cities/get-cities-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'cities/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
