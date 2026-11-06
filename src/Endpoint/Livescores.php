<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Livescores extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/livescores/get-all-livescores
     */
    public function all(): stdClass
    {
        $url = 'livescores';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/livescores/get-inplay-livescores
     */
    public function inplay(): stdClass
    {
        $url = 'livescores/inplay';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/livescores/get-latest-updated-livescores
     */
    public function latest(): stdClass
    {
        $url = 'livescores/latest';
        return $this->call($url);
    }
}
