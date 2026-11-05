<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Predictions extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-probabilities
     */
    public function all(): stdClass
    {
        $url = 'predictions/probabilities';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id
     */
    public function getPredictabilityByLeagueId(int $leagueId): stdClass
    {
        $url = "predictions/predictability/leagues/{$leagueId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id
     */
    public function getPredictabilityByFixtureId(int $fixtureId): stdClass
    {
        $url = "predictions/probabilities/fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/predictions/get-value-bets
     */
    public function valueBets(): stdClass
    {
        $url = 'predictions/value-bets/';
        return $this->call($url);
    }
}
