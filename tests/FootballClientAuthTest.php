<?php

namespace Sportmonks\Test;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApi;
use Sportmonks\Football\FootballClient;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class FootballClientAuthTest extends TestCase
{
    private const TOKEN = 'secret-token-123';

    private function useMockResponse(FootballClient $client, MockResponse $response): MockResponse
    {
        $reflection = new ReflectionClass(FootballClient::class);
        $property = $reflection->getProperty('client');
        $property->setAccessible(true);
        $property->setValue($client, new MockHttpClient($response, $client->baseUri));

        return $response;
    }

    public function testTokenIsSentAsHeaderNotInUrl()
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = self::TOKEN;
        $client = FootballApi::bookmakers();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->all();

        $this->assertStringNotContainsString(self::TOKEN, $response->getRequestUrl());
        $this->assertContains('Authorization: ' . self::TOKEN, $response->getRequestOptions()['headers']);
    }

    public function testTokenIsNotLeakedInExceptionMessage()
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = self::TOKEN;
        $client = FootballApi::bookmakers();
        $this->useMockResponse($client, new MockResponse('{"message":"Unauthenticated."}', ['http_code' => 401]));

        try {
            $client->all();
            $this->fail('Expected ApiRequestException');
        } catch (ApiRequestException $e) {
            $this->assertSame(401, $e->getCode());
            $this->assertStringNotContainsString(self::TOKEN, $e->getMessage());
        }
    }
}
