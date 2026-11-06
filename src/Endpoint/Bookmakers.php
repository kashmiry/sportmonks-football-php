<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Bookmakers extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/odds/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers
     */
    public function all(): stdClass
    {
        return $this->call('bookmakers');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id
     */
    public function getById(int $bookmakerId): stdClass
    {
        return $this->call("bookmakers/{$bookmakerId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('bookmakers/search/' . rawurlencode($searchQuery));
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        return $this->call("bookmakers/fixtures/{$fixtureId}");
    }
}
