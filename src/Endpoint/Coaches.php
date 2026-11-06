<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Coaches extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-all-coaches
     */
    public function all(): stdClass
    {
        $url = 'coaches';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coach-by-id
     */
    public function getById(int $coachId): stdClass
    {
        $url = "coaches/{$coachId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        $url = "coaches/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coaches-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'coaches/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-last-updated-coaches
     */
    public function getLastUpdated(): stdClass
    {
        $url = 'coaches/latest';
        return $this->call($url);
    }
}
