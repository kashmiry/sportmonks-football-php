<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class TvStations extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations
     */
    public function all(): stdClass
    {
        return $this->call('tv-stations');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id
     */
    public function getById(int $tvStationId): stdClass
    {
        return $this->call("tv-stations/{$tvStationId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        return $this->call("tv-stations/fixtures/{$fixtureId}");
    }
}
