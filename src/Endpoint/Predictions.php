<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Predictions extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-probabilities
     */
    public function all(): stdClass
    {
        return $this->call('predictions/probabilities');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id
     */
    public function getPredictabilityByLeagueId(int $leagueId): stdClass
    {
        return $this->call("predictions/predictability/leagues/{$leagueId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id
     */
    public function getPredictabilityByFixtureId(int $fixtureId): stdClass
    {
        return $this->call("predictions/probabilities/fixtures/{$fixtureId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-value-bets
     */
    public function valueBets(): stdClass
    {
        return $this->call('predictions/value-bets/');
    }
}
