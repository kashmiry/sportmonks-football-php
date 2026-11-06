<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class Markets extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/odds/';

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
