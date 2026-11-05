<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class PreMatchNews
 * @package Sportmonks\Football\Endpoint
 */
class PreMatchNews extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news
     */
    public function all() {
        $url = "news/pre-match";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id
     */
    public function getById(int $seasonId) {
        $url = "news/pre-match/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures
     */
    public function upcommingFixtures() {
        $url = "news/pre-match/upcomming";
        return $this->call($url);
    }
}
