<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Countries extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-all-countries
     */
    public function all(): stdClass
    {
        return $this->call('countries');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-country-by-id
     */
    public function getById(int $countryId): stdClass
    {
        return $this->call("countries/{$countryId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-countries-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        return $this->call('countries/search/' . rawurlencode($searchQuery));
    }
}
