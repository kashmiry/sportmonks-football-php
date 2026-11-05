<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\Exception\InvalidDateFormatException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Transfers extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-all-transfers
     */
    public function all(): stdClass
    {
        $url = 'transfers';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfer-by-id
     */
    public function getById(int $transferId): stdClass
    {
        $url = "transfers/{$transferId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-latest-transfers
     */
    public function latest(): stdClass
    {
        $url = 'transfers/latest';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range
     */
    public function getByDateRange(string $dateFrom, string $dateTo): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo   = FootballApiHelper::verifyDate($dateTo);
        $url      = "transfers/between/{$dateFrom}/{$dateTo}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        $url = "transfers/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id
     */
    public function getByPlayerId(int $playerId): stdClass
    {
        $url = "transfers/players/{$playerId}";
        return $this->call($url);
    }
}
