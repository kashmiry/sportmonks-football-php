<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Topscorers extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("topscorers/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id
     */
    public function getByStageId(int $stageId): stdClass
    {
        return $this->call("topscorers/stages/{$stageId}");
    }
}
