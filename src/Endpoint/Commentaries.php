<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Commentaries
 * @package Sportmonks\Football\Endpoint
 */
class Commentaries extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/commentaries/get-all-commentaries
     */
    public function all() {
        $url = "commentaries";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId) {
        $url = "commentaries/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
