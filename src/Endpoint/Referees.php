<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Referees
 * @package Sportmonks\Football\Endpoint
 */
class Referees extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-all-referees
     */
    public function all() {
        $url = "referees";
        return $this->call($url);
    }

    /**
     * @param int $refereeId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referee-by-id
     */
    public function getById(int $refereeId) {
        $url = "referees/{$refereeId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-country-id
     */
    public function getByCountryId(int $countryId) {
        $url = "referees/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "referees/seasons/{$seasonId}";
        return $this->call($url);
    }
}
