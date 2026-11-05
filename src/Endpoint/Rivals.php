<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Rivals
 * @package Sportmonks\Football\Endpoint
 */
class Rivals extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-all-rivals
     */
    public function all() {
        $url = "rivals";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id
     */
    public function getById(int $teamId) {
        $url = "teams/rivals/{$teamId}";
        return $this->call($url);
    }
}
