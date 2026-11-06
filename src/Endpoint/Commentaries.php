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
        return $this->call('commentaries');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        return $this->call("commentaries/fixtures/{$fixtureId}");
    }
}
