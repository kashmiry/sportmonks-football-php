<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Stages extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-all-stages
     */
    public function all(): stdClass
    {
        return $this->call('stages');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stage-by-id
     */
    public function getById(int $stageId): stdClass
    {
        return $this->call("stages/{$stageId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("stages/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('stages/search/' . rawurlencode($searchQuery));
    }
}
