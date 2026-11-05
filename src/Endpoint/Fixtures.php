<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\Exception\InvalidDateFormatException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

class Fixtures extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-all-fixtures
     */
    public function all(): stdClass
    {
        $url = 'fixtures';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id
     */
    public function getById(int $fixtureId): stdClass
    {
        $url = "fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @param list<int|string> $fixtureIds
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids
     */
    public function getByMultipleIds(array $fixtureIds): stdClass
    {
        $url = 'fixtures/multi/' . implode(',', self::cleanList($fixtureIds));
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date
     */
    public function getByDate(string $date): stdClass
    {
        $date = FootballApiHelper::verifyDate($date);
        $url  = "fixtures/date/{$date}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range
     */
    public function getByDateRange(string $dateFrom, string $dateTo): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo   = FootballApiHelper::verifyDate($dateTo);
        $url      = "fixtures/between/{$dateFrom}/{$dateTo}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team
     */
    public function getByDateRangeForTeam(string $dateFrom, string $dateTo, int $teamId): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo   = FootballApiHelper::verifyDate($dateTo);
        $url      = "fixtures/between/{$dateFrom}/{$dateTo}/{$teamId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head
     */
    public function getHeadToHead(int $teamId1, int $teamId2): stdClass
    {
        $url = "fixtures/head-to-head/{$teamId1}/{$teamId2}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'fixtures/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id
     */
    public function getUpcomingByMarketId(int $marketId): stdClass
    {
        $url = "fixtures/upcoming/markets/{$marketId}";
        return $this->call($url);
    }
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures
     */
    public function getLastUpdated(): stdClass
    {
        $url = 'fixtures/latest';
        return $this->call($url);
    }
}
