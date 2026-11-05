<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Types extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-all-types
     */
    public function all() {
        $url = "types";
        return $this->call($url);
    }

    /**
     * @param int $typeId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-type-by-id
     */
    public function getById(int $typeId) {
        $url = "types/{$typeId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-type-by-entity
     */
    public function getByEntity() {
        $url = "types/entities";
        return $this->call($url);
    }
}