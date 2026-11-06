<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Types extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-all-types
     */
    public function all(): stdClass
    {
        return $this->call('types');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-type-by-id
     */
    public function getById(int $typeId): stdClass
    {
        return $this->call("types/{$typeId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/types/get-type-by-entity
     */
    public function getByEntity(): stdClass
    {
        return $this->call('types/entities');
    }
}
