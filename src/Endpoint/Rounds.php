<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Rounds extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-all-rounds
     */
    public function all(): stdClass
    {
        $url = 'rounds';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-round-by-id
     */
    public function getById(int $roundId): stdClass
    {
        $url = "rounds/{$roundId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "rounds/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'rounds/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
