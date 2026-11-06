<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class InplayOdds extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-all-inplay-odds
     */
    public function all(): stdClass
    {
        return $this->call('odds/inplay');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        return $this->call("odds/inplay/fixtures/{$fixtureId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id-and-bookmaker-id
     */
    public function getByFixtureAndBookmakerId(int $fixtureId, int $bookmakerId): stdClass
    {
        return $this->call("odds/inplay/fixtures/{$fixtureId}/bookmakers/{$bookmakerId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id-and-market-id
     */
    public function getByFixtureAndMarketId(int $fixtureId, int $marketId): stdClass
    {
        return $this->call("odds/inplay/fixtures/{$fixtureId}/markets/{$marketId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-last-updated-inplay-odds
     */
    public function getLastUpdated(): stdClass
    {
        return $this->call('odds/inplay/latest');
    }
}
