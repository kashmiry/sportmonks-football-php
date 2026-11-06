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
        return $this->call('coaches');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coach-by-id
     */
    public function getById(int $coachId): stdClass
    {
        return $this->call("coaches/{$coachId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id
     */
    public function getByCountryId(int $countryId): stdClass
    {
        return $this->call("coaches/countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-coaches-search-by-name
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('coaches/search/' . rawurlencode($searchQuery));
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/coaches/get-last-updated-coaches
     */
    public function getLastUpdated(): stdClass
    {
        return $this->call('coaches/latest');
    }
}
