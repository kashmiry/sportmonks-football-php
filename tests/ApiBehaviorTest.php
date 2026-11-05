<?php

namespace Sportmonks\Test;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApi;
use Sportmonks\Football\FootballClient;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ApiBehaviorTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
    }

    private function useMockResponse(FootballClient $client, MockResponse $response): MockResponse
    {
        $reflection = new ReflectionClass(FootballClient::class);
        $property = $reflection->getProperty('client');
        $property->setAccessible(true);
        $property->setValue($client, new MockHttpClient($response, $client->baseUri));

        return $response;
    }

    public function testUpcomingNewsUsesDocumentedPath()
    {
        $client = FootballApi::preMatchNews();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->upcomingFixtures();

        $this->assertStringEndsWith('/football/news/pre-match/upcoming', $response->getRequestUrl());
    }

    public function testHttpErrorIncludesSportmonksMessage()
    {
        $client = FootballApi::bookmakers();
        $this->useMockResponse($client, new MockResponse(
            '{"message":"You do not have access to this endpoint."}',
            ['http_code' => 403]
        ));

        try {
            $client->all();
            $this->fail('Expected ApiRequestException');
        } catch (ApiRequestException $e) {
            $this->assertSame(403, $e->getCode());
            $this->assertStringContainsString('You do not have access to this endpoint.', $e->getMessage());
            $this->assertNotNull($e->getPrevious());
        }
    }

    public function testHttpErrorWithoutJsonBodyKeepsOriginalMessage()
    {
        $client = FootballApi::bookmakers();
        $this->useMockResponse($client, new MockResponse('Bad Gateway', ['http_code' => 502]));

        try {
            $client->all();
            $this->fail('Expected ApiRequestException');
        } catch (ApiRequestException $e) {
            $this->assertSame(502, $e->getCode());
            $this->assertStringContainsString('502', $e->getMessage());
        }
    }
}
