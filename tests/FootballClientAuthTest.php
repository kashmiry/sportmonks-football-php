<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football\Tests;

use Kash\Sportmonks\Football\Endpoint;
use Kash\Sportmonks\Football\Exception\ApiRequestException;
use Kash\Sportmonks\Football\FootballClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class FootballClientAuthTest extends TestCase
{
    private const string TOKEN = 'secret-token-123';

    /**
     * @template T of FootballClient
     * @param class-string<T> $class
     * @return T
     */
    private function clientWith(string $class, MockResponse $response): FootballClient
    {
        return new $class(httpClient: new MockHttpClient($response));
    }

    public function testTokenIsSentAsHeaderNotInUrl(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = self::TOKEN;
        $response = new MockResponse('{"data":[]}');
        $client = $this->clientWith(Endpoint\Bookmakers::class, $response);

        $client->all();

        $this->assertStringNotContainsString(self::TOKEN, $response->getRequestUrl());
        $headers = $response->getRequestOptions()['headers'] ?? null;
        $this->assertIsArray($headers);
        $this->assertContains('Authorization: ' . self::TOKEN, $headers);
    }

    public function testTokenIsHiddenFromDebugOutput(): void
    {
        $client = new Endpoint\Bookmakers(token: self::TOKEN, httpClient: new MockHttpClient());

        ob_start();
        var_dump($client);
        $dumped = ob_get_clean() . print_r($client, true);

        $this->assertStringNotContainsString(self::TOKEN, $dumped);
    }

    public function testTokenIsNotLeakedInExceptionMessage(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = self::TOKEN;
        $client = $this->clientWith(Endpoint\Bookmakers::class, new MockResponse('{"message":"Unauthenticated."}', ['http_code' => 401]));

        try {
            $client->all();
            $this->fail('Expected ApiRequestException');
        } catch (ApiRequestException $e) {
            $this->assertSame(401, $e->getCode());
            $this->assertStringNotContainsString(self::TOKEN, $e->getMessage());
        }
    }
}
