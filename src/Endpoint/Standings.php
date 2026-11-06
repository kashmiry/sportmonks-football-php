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
        return $this->call('standings');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("standings/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standings-by-round-id
     */
    public function getByRoundId(int $roundId): stdClass
    {
        return $this->call("standings/rounds/{$roundId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id
     */
    public function getCorrectionsBySeasonId(int $seasonId): stdClass
    {
        return $this->call("standings/corrections/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id
     */
    public function getLiveByLeagueId(int $leagueId): stdClass
    {
        return $this->call("standings/live/leagues/{$leagueId}");
    }
}
