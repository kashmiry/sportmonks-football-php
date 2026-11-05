<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class Markets extends FootballClient
{
    public string $baseUri = 'https://api.sportmonks.com/v3/odds/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-all-markets
     */
    public function all(): stdClass
    {
        $url = 'markets';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-market-by-id
     */
    public function getById(int $marketId): stdClass
    {
        $url = "markets/{$marketId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/markets/get-market-by-search
     */
    public function search(string $searchQuery): stdClass
    {
        $url = 'markets/search/' . rawurlencode($searchQuery);
        return $this->call($url);
    }
}
