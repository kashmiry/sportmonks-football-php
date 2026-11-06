<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Filters extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/my/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/filters/get-all-entity-filters
     */
    public function allEntity(): stdClass
    {
        return $this->call('filters/entity');
    }
}
