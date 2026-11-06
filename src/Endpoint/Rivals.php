<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Rivals extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-all-rivals
     */
    public function all(): stdClass
    {
        return $this->call('rivals');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        return $this->call("rivals/teams/{$teamId}");
    }
}
