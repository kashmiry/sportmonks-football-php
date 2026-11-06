<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\Exception\InvalidDateFormatException;
use Kash\Sportmonks\Football\FootballApiHelper;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Transfers extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-all-transfers
     */
    public function all(): stdClass
    {
        return $this->call('transfers');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfer-by-id
     */
    public function getById(int $transferId): stdClass
    {
        return $this->call("transfers/{$transferId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-latest-transfers
     */
    public function latest(): stdClass
    {
        return $this->call('transfers/latest');
    }

    /**
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range
     */
    public function getByDateRange(string $dateFrom, string $dateTo): stdClass
    {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo = FootballApiHelper::verifyDate($dateTo);
        return $this->call("transfers/between/{$dateFrom}/{$dateTo}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id
     */
    public function getByTeamId(int $teamId): stdClass
    {
        return $this->call("transfers/teams/{$teamId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id
     */
    public function getByPlayerId(int $playerId): stdClass
    {
        return $this->call("transfers/players/{$playerId}");
    }
}
