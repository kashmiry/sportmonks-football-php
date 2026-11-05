<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class TvStations
 * @package Sportmonks\Football\Endpoint
 */
class TvStations extends FootballClient {

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations
     */
    public function all() {
        $url = "tv-stations";
        return $this->call($url);
    }

    /**
     * @param int $tvStationId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id
     */
    public function getById(int $tvStationId) {
        $url = "tv-stations/{$tvStationId}";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId) {
        $url = "tv-stations/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
