<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class TeamSquads extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        $url = "squads/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id
     */
    public function getByTeamAndSeasonId(int $teamId, int $seasonId): stdClass
    {
        $url = "squads/seasons/{$seasonId}/teams/{$teamId}";
        return $this->call($url);
    }
}
