<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class TvStations extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations
     */
    public function all(): stdClass
    {
        $url = 'tv-stations';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id
     */
    public function getById(int $tvStationId): stdClass
    {
        $url = "tv-stations/{$tvStationId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        $url = "tv-stations/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
