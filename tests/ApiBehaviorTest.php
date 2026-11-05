<?php

namespace Sportmonks\Test;

use PHPUnit\Framework\Attributes\DataProvider;
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

    public static function documentedPaths(): array
    {
        $odds = 'https://api.sportmonks.com/v3/odds/';
        $football = 'https://api.sportmonks.com/v3/football/';

        return [
            ['schedules', 'getBySeasonAndTeamId', [1, 2], $football . 'schedules/seasons/1/teams/2'],
            ['commentaries', 'getByFixtureId', [1], $football . 'commentaries/fixtures/1'],
            ['rivals', 'getById', [1], $football . 'rivals/teams/1'],
            ['leagues', 'getByFixtureDate', ['2026-11-05'], $football . 'leagues/date/2026-11-05'],
            ['predictions', 'getPredictabilityByLeagueId', [1], $football . 'predictions/predictability/leagues/1'],
            ['bookmakers', 'all', [], $odds . 'bookmakers'],
            ['bookmakers', 'getById', [1], $odds . 'bookmakers/1'],
            ['bookmakers', 'search', ['bet'], $odds . 'bookmakers/search/bet'],
            ['bookmakers', 'getByFixtureId', [1], $odds . 'bookmakers/fixtures/1'],
            ['markets', 'all', [], $odds . 'markets'],
            ['markets', 'getById', [1], $odds . 'markets/1'],
            ['markets', 'search', ['goals'], $odds . 'markets/search/goals'],
        ];
    }

    #[DataProvider('documentedPaths')]
    public function testEndpointUsesDocumentedPath(string $endpoint, string $method, array $args, string $expectedUrl)
    {
        $client = FootballApi::$endpoint();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->$method(...$args);

        $this->assertSame($expectedUrl, strtok($response->getRequestUrl(), '?'));
    }

    public static function searchTerms(): array
    {
        return [
            'space' => ['Real Madrid', 'Real%20Madrid'],
            'reserved characters' => ['A/B?C#D', 'A%2FB%3FC%23D'],
            'non-ASCII' => ['Atlético', 'Atl%C3%A9tico'],
        ];
    }

    #[DataProvider('searchTerms')]
    public function testSearchTermIsUrlEncoded(string $term, string $encoded)
    {
        $client = FootballApi::teams();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->search($term);

        $this->assertSame(
            'https://api.sportmonks.com/v3/football/teams/search/' . $encoded,
            strtok($response->getRequestUrl(), '?')
        );
    }

    public function testPerPageIsNotSentWithCursor()
    {
        $client = FootballApi::transfers();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->setPerPage(50)->setCursor('abc')->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('abc', $query['cursor']);
        $this->assertArrayNotHasKey('per_page', $query);
    }

    public function testPerPageIsSentWithoutCursor()
    {
        $client = FootballApi::transfers();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->setPerPage(50)->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('50', $query['per_page']);
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
