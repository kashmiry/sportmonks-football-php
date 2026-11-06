<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Endpoint;

use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
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
        return $this->call('enrichments');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-resources
     */
    public function resources(): stdClass
    {
        return $this->call('resources');
    }

    /**
     * @throws ApiRequestException
     * @link https://docs.sportmonks.com/v3/core-api/my-sportmonks/get-my-leagues
     */
    public function leagues(): stdClass
    {
        return $this->call('leagues');
    }
}
