<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

class PreMatchNews extends FootballClient
{
    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news
     */
    public function all(): stdClass
    {
        $url = 'news/pre-match';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id
     */
    public function getById(int $seasonId): stdClass
    {
        $url = "news/pre-match/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures
     */
    public function upcomingFixtures(): stdClass
    {
        $url = 'news/pre-match/upcoming';
        return $this->call($url);
    }
}
