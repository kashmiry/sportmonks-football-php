<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class Referees extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-all-referees
     */
    public function all(): stdClass
    {
        $url = 'referees';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referee-by-id
     */
    public function getById(int $refereeId): stdClass
    {
        $url = "referees/{$refereeId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        $url = "referees/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/referees/get-referees-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        $url = "referees/seasons/{$seasonId}";
        return $this->call($url);
    }
}
