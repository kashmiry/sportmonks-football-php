<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Referees extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-all-referees
     */
    public function all(): stdClass
    {
        return $this->call('referees');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referee-by-id
     */
    public function getById(int $refereeId): stdClass
    {
        return $this->call("referees/{$refereeId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        return $this->call("referees/countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("referees/seasons/{$seasonId}");
    }
}
