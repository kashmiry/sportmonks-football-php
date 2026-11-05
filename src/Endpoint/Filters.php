<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Filters extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/my/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/filters/get-all-entity-filters
     */
    public function allEntity(): stdClass
    {
        $url = 'filters/entity';
        return $this->call($url);
    }
}
