<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Continents extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/continents/get-all-continents
     */
    public function all(): stdClass
    {
        $url = 'continents';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/continents/get-continent-by-id
     */
    public function getById(int $continentId): stdClass
    {
        $url = "continents/{$continentId}";
        return $this->call($url);
    }
}
