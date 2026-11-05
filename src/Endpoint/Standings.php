<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Standings
 * @package Sportmonks\Football\Endpoint
 */
class Standings extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-all-standings
     */
    public function all() {
        $url = "standings";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "standings/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $roundId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-round-id
     */
    public function getByRoundId(int $roundId) {
        $url = "standings/rounds/{$roundId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id
     */
    public function getCorrectionsBySeasonId(int $seasonId) {
        $url = "standings/corrections/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $leagueId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id
     */
    public function getLiveByLeagueId(int $leagueId) {
        $url = "standings/live/leagues/{$leagueId}";
        return $this->call($url);
    }
}
