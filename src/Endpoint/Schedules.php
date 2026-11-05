<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Schedules
 * @package Sportmonks\Football\Endpoint
 */
class Schedules extends FootballClient {

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "schedules/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id
     */
    public function getByTeamId(int $teamId) {
        $url = "schedules/teams/{$teamId}";
        return $this->call($url);
    }


    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id
     */
    public function getBySeasonAndTeamId(int $seasonId, int $teamId) {
        $url = "schedules/seasons/{$seasonId}/teams/{$teamId}";
        return $this->call($url);
    }
}
