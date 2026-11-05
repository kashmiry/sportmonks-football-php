<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Stages extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-all-stages
     */
    public function all(): stdClass
    {
        $url = 'stages';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stage-by-id
     */
    public function getById(int $stageId): stdClass
    {
        $url = "stages/{$stageId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "stages/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'stages/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
