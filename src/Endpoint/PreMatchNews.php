<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use stdClass;

final class PreMatchNews extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news
     */
    public function all(): stdClass
    {
        return $this->call('news/pre-match');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id
     */
    public function getBySeasonId(int $seasonId): stdClass
    {
        return $this->call("news/pre-match/seasons/{$seasonId}");
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures
     */
    public function upcomingFixtures(): stdClass
    {
        return $this->call('news/pre-match/upcoming');
    }
}
