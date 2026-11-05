<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Countries extends FootballClient
{
    public string $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-all-countries
     */
    public function all(): stdClass
    {
        $url = 'countries';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-country-by-id
     */
    public function getById(int $countryId): stdClass
    {
        $url = "countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/endpoints/countries/get-countries-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'countries/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
