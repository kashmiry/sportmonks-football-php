<?php

declare(strict_types=1);

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

final class My extends FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/my/';

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-enrichments
     */
    public function enrichments(): stdClass
    {
        $url = 'enrichments';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-resources
     */
    public function resources(): stdClass
    {
        $url = 'resources';
        return $this->call($url);
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-leagues
     */
    public function leagues(): stdClass
    {
        $url = 'leagues';
        return $this->call($url);
    }
}
