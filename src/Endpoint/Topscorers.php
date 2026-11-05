<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Topscorers extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "topscorers/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id
     */
    public function getByStageId(int $stageId): stdClass
    {
        $url = "topscorers/stages/{$stageId}";
        return $this->call($url);
    }
}
