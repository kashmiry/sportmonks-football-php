<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\Exception\InvalidDateFormatException;
use Kash\Sportmonks\Football\FootballApiHelper;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Fixtures extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-all-fixtures
     */
    public function all(): stdClass
    {
        return $this->call('fixtures');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id
     */
    public function getById(int $fixtureId): stdClass
    {
        return $this->call("fixtures/{$fixtureId}");
    }

    /**
     * @param list<int|string> $fixtureIds
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids
     */
    public function getByMultipleIds(array $fixtureIds): stdClass
    {
        return $this->call('fixtures/multi/' . implode(',', self::cleanList($fixtureIds)));
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date
     */
    public function getByDate(string $date): stdClass
    {
        $date = FootballApiHelper::verifyDate($date);
        return $this->call("fixtures/date/{$date}");
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range
     */
    public function getByDateRange(string $dateFrom, string $dateTo): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo = FootballApiHelper::verifyDate($dateTo);
        return $this->call("fixtures/between/{$dateFrom}/{$dateTo}");
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team
     */
    public function getByDateRangeForTeam(string $dateFrom, string $dateTo, int $teamId): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo = FootballApiHelper::verifyDate($dateTo);
        return $this->call("fixtures/between/{$dateFrom}/{$dateTo}/{$teamId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head
     */
    public function getHeadToHead(int $teamId1, int $teamId2): stdClass
    {
        return $this->call("fixtures/head-to-head/{$teamId1}/{$teamId2}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('fixtures/search/' . rawurlencode($searchQuery));
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id
     */
    public function getUpcomingByMarketId(int $marketId): stdClass
    {
        return $this->call("fixtures/upcoming/markets/{$marketId}");
    }
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures
     */
    public function getLastUpdated(): stdClass
    {
        return $this->call('fixtures/latest');
    }
}
