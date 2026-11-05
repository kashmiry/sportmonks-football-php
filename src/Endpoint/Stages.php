<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Stages
 * @package Sportmonks\Football\Endpoint
 */
class Stages extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-all-stages
     */
    public function all() {
        $url = "stages";
        return $this->call($url);
    }

    /**
     * @param int $stageId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stage-by-id
     */
    public function getById(int $stageId) {
        $url = "stages/{$stageId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-season-id
     */
    public function getBySeasonId(int $seasonId) {
        $url = "stages/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name
     */
    public function search(string $searchQuery) {
        $url = "stages/search/" . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
