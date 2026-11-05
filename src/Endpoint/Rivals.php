<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Rivals extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-all-rivals
     */
    public function all(): stdClass
    {
        $url = 'rivals';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        $url = "rivals/teams/{$teamId}";
        return $this->call($url);
    }
}
