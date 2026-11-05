<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
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
        $url = 'bookmakers';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id
     */
    public function getById(int $bookmakerId): stdClass
    {
        $url = "bookmakers/{$bookmakerId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'bookmakers/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        $url = "bookmakers/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
