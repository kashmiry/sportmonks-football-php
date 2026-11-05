<?php

declare(strict_types=1);

namespace Sportmonks\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Sportmonks\Football\Endpoint;
use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\Exception\InvalidDateFormatException;
use Sportmonks\Football\FootballApi;
use Sportmonks\Football\FootballClient;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ApiBehaviorTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
        unset($_ENV['SPORTMONKS_TIMEZONE']);
    }

    private function useMockResponse(FootballClient $client, MockResponse $response): MockResponse
    {
        $reflection = new ReflectionClass(FootballClient::class);
        $property = $reflection->getProperty('client');
        $property->setValue($client, new MockHttpClient($response, $client->baseUri));

        return $response;
    }

    private function withoutQuery(string $url): string
    {
        return explode('?', $url, 2)[0];
    }

    public function testUpcomingNewsUsesDocumentedPath(): void
    {
        $client = FootballApi::preMatchNews();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->upcomingFixtures();

        $this->assertStringEndsWith('/football/news/pre-match/upcoming', $response->getRequestUrl());
    }

    public function testFiltersAcceptIntegerIds(): void
    {
        $client = FootballApi::fixtures();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->setFilters(['eventTypes' => [14, 18], 'populate'])->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('eventTypes:14,18;populate', $query['filters']);
    }

    public function testMultipleIdsAcceptIntegers(): void
    {
        $client = FootballApi::fixtures();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->getByMultipleIds([1, 2, 3]);

        $this->assertStringEndsWith('/football/fixtures/multi/1,2,3', $this->withoutQuery($response->getRequestUrl()));
    }

    /**
     * @return array<string, array{string}>
     */
    public static function invalidDates(): array
    {
        return [
            'wrong format' => ['05-11-2026'],
            'impossible date' => ['2026-02-30'],
            'not a date' => ['tomorrow'],
        ];
    }

    #[DataProvider('invalidDates')]
    public function testInvalidDateIsRejectedBeforeRequest(string $date): void
    {
        $this->expectException(InvalidDateFormatException::class);
        $this->expectExceptionMessage($date);

        FootballApi::fixtures()->getByDate($date);
    }

    /**
     * @return array<string, array{string}>
     */
    public static function nonObjectResponses(): array
    {
        return [
            'malformed JSON' => ['not json'],
            'empty body' => [''],
            'array' => ['[]'],
            'null' => ['null'],
            'string' => ['"text"'],
            'number' => ['123'],
            'boolean' => ['true'],
        ];
    }

    #[DataProvider('nonObjectResponses')]
    public function testResponseThatIsNotJsonObjectThrows(string $body): void
    {
        $client = FootballApi::fixtures();
        $this->useMockResponse($client, new MockResponse($body));

        $this->expectException(ApiRequestException::class);
        $client->all();
    }

    public function testTimezoneIsSentWhenConfigured(): void
    {
        $_ENV['SPORTMONKS_TIMEZONE'] = 'Asia/Riyadh';
        $client = FootballApi::fixtures();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('Asia/Riyadh', $query['timezone'] ?? null);
    }

    /**
     * @return array<string, array{mixed}>
     */
    public static function invalidTimezones(): array
    {
        return [
            'empty string' => [''],
            'integer' => [3],
            'array' => [['Asia/Riyadh']],
            'null' => [null],
        ];
    }

    #[DataProvider('invalidTimezones')]
    public function testInvalidTimezoneIsIgnored(mixed $timezone): void
    {
        $_ENV['SPORTMONKS_TIMEZONE'] = $timezone;
        $client = FootballApi::fixtures();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertArrayNotHasKey('timezone', $query);
    }

    /**
     * @return list<array{class-string<FootballClient>, string, list<int|string>, string}>
     */
    public static function documentedPaths(): array
    {
        $odds = 'https://api.sportmonks.com/v3/odds/';
        $football = 'https://api.sportmonks.com/v3/football/';

        return [
            [Endpoint\Schedules::class, 'getBySeasonAndTeamId', [1, 2], $football . 'schedules/seasons/1/teams/2'],
            [Endpoint\Commentaries::class, 'getByFixtureId', [1], $football . 'commentaries/fixtures/1'],
            [Endpoint\Rivals::class, 'getByTeamId', [1], $football . 'rivals/teams/1'],
            [Endpoint\PreMatchNews::class, 'getBySeasonId', [1], $football . 'news/pre-match/seasons/1'],
            [Endpoint\Leagues::class, 'getByFixtureDate', ['2026-11-05'], $football . 'leagues/date/2026-11-05'],
            [Endpoint\Predictions::class, 'getPredictabilityByLeagueId', [1], $football . 'predictions/predictability/leagues/1'],
            [Endpoint\Bookmakers::class, 'all', [], $odds . 'bookmakers'],
            [Endpoint\Bookmakers::class, 'getById', [1], $odds . 'bookmakers/1'],
            [Endpoint\Bookmakers::class, 'search', ['bet'], $odds . 'bookmakers/search/bet'],
            [Endpoint\Bookmakers::class, 'getByFixtureId', [1], $odds . 'bookmakers/fixtures/1'],
            [Endpoint\Markets::class, 'all', [], $odds . 'markets'],
            [Endpoint\Markets::class, 'getById', [1], $odds . 'markets/1'],
            [Endpoint\Markets::class, 'search', ['goals'], $odds . 'markets/search/goals'],
        ];
    }

    /**
     * @param class-string<FootballClient> $class
     * @param list<int|string> $args
     */
    #[DataProvider('documentedPaths')]
    public function testEndpointUsesDocumentedPath(string $class, string $method, array $args, string $expectedUrl): void
    {
        $client = new $class();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->$method(...$args);

        $this->assertSame($expectedUrl, $this->withoutQuery($response->getRequestUrl()));
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function searchTerms(): array
    {
        return [
            'space' => ['Real Madrid', 'Real%20Madrid'],
            'reserved characters' => ['A/B?C#D', 'A%2FB%3FC%23D'],
            'non-ASCII' => ['Atlético', 'Atl%C3%A9tico'],
        ];
    }

    #[DataProvider('searchTerms')]
    public function testSearchTermIsUrlEncoded(string $term, string $encoded): void
    {
        $client = FootballApi::teams();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->search($term);

        $this->assertSame(
            'https://api.sportmonks.com/v3/football/teams/search/' . $encoded,
            $this->withoutQuery($response->getRequestUrl()),
        );
    }

    public function testPerPageIsNotSentWithCursor(): void
    {
        $client = FootballApi::transfers();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->setPerPage(50)->setCursor('abc')->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('abc', $query['cursor']);
        $this->assertArrayNotHasKey('per_page', $query);
    }

    public function testPerPageIsSentWithoutCursor(): void
    {
        $client = FootballApi::transfers();
        $response = $this->useMockResponse($client, new MockResponse('{"data":[]}'));

        $client->setPerPage(50)->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);
        $this->assertSame('50', $query['per_page']);
    }

    public function testHttpErrorIncludesSportmonksMessage(): void
    {
        $client = FootballApi::bookmakers();
        $this->useMockResponse($client, new MockResponse(
            '{"message":"You do not have access to this endpoint."}',
            ['http_code' => 403],
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

    public function testHttpErrorWithoutJsonBodyKeepsOriginalMessage(): void
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
