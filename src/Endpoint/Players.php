<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Players
 * @package Sportmonks\Football\Endpoint
 */
class Players extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-all-players
     */
    public function all() {
        $url = "players";
        return $this->call($url);
    }

    /**
     * @param int $playerId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-player-by-id
     */
    public function getById(int $playerId) {
        $url = "players/{$playerId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-country-id
     */
    public function getByCountryId(int $countryId) {
        $url = "players/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-players-by-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "players/search/" . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/players/get-last-updated-players
     */
    public function getLastUpdated() {
        $url = "players/latest";
        return $this->call($url);
    }
}
