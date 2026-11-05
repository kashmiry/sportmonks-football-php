<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class PreMatchOdds extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-all-odds
     */
    public function all(): stdClass
    {
        $url = 'odds/pre-match';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id
     */
    public function getByFixtureId(int $fixtureId): stdClass
    {
        $url = "odds/pre-match/fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id-and-bookmaker-id
     */
    public function getByFixtureAndBookmakerId(int $fixtureId, int $bookmakerId): stdClass
    {
        $url = "odds/pre-match/fixtures/{$fixtureId}/bookmakers/{$bookmakerId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id-and-market-id
     */
    public function getByFixtureAndMarketId(int $fixtureId, int $marketId): stdClass
    {
        $url = "odds/pre-match/fixtures/{$fixtureId}/markets/{$marketId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-last-updated-odds
     */
    public function getLastUpdated(): stdClass
    {
        $url = 'odds/pre-match/latest';
        return $this->call($url);
    }
}
