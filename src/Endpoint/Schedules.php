<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Schedules extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "schedules/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        $url = "schedules/teams/{$teamId}";
        return $this->call($url);
    }


    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id
     */
    public function getBySeasonAndTeamId(int $seasonId, int $teamId): stdClass
    {
        $url = "schedules/seasons/{$seasonId}/teams/{$teamId}";
        return $this->call($url);
    }
}
