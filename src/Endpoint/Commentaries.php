<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Commentaries extends FootballClient
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
