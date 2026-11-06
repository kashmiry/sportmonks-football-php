<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Schedules extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("schedules/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        return $this->call("schedules/teams/{$teamId}");
    }


    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id
     */
    public function getBySeasonAndTeamId(int $seasonId, int $teamId): stdClass
    {
        return $this->call("schedules/seasons/{$seasonId}/teams/{$teamId}");
    }
}
