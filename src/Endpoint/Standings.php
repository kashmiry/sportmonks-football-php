<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Standings extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-all-standings
     */
    public function all(): stdClass
    {
        $url = 'standings';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "standings/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-round-id
     */
    public function getByRoundId(int $roundId): stdClass
    {
        $url = "standings/rounds/{$roundId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id
     */
    public function getCorrectionsBySeasonId(int $seasonId): stdClass
    {
        $url = "standings/corrections/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id
     */
    public function getLiveByLeagueId(int $leagueId): stdClass
    {
        $url = "standings/live/leagues/{$leagueId}";
        return $this->call($url);
    }
}
