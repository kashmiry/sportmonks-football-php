<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Rounds extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-all-rounds
     */
    public function all(): stdClass
    {
        return $this->call('rounds');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-round-by-id
     */
    public function getById(int $roundId): stdClass
    {
        return $this->call("rounds/{$roundId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("rounds/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('rounds/search/' . rawurlencode($searchQuery));
    }
}
