<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Regions extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-all-regions
     */
    public function all(): stdClass
    {
        return $this->call('regions');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-region-by-id
     */
    public function getById(int $regionId): stdClass
    {
        return $this->call("regions/{$regionId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/regions/get-regions-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('regions/search/' . rawurlencode($searchQuery));
    }
}
