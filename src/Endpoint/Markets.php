<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Markets
 * @package Sportmonks\Football\Endpoint
 */
class Markets extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-all-markets
     */
    public function all() {
        $url = "markets";
        return $this->call($url);
    }

    /**
     * @param int $marketId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-market-by-id
     */
    public function getById(int $marketId) {
        $url = "markets/{$marketId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-market-by-search
     */
    public function search(string $searchQuery) {
        $url = "markets/search/{$searchQuery}";
        return $this->call($url);
    }
}
