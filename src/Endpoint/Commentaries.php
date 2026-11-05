<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Commentaries extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/commentaries/get-all-commentaries
     */
    public function all(): stdClass
    {
        $url = 'commentaries';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        $url = "commentaries/fixtures/{$fixtureId}";
        return $this->call($url);
    }
}
