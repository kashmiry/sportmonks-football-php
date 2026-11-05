<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Regions extends FootballClient
{
    public string $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-all-regions
     */
    public function all(): stdClass
    {
        $url = 'regions';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-region-by-id
     */
    public function getById(int $regionId): stdClass
    {
        $url = "regions/{$regionId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-regions-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'regions/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
