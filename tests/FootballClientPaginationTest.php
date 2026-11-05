<?php

declare(strict_types=1);

namespace Sportmonks\Test;

use Closure;
use PHPUnit\Framework\TestCase;
use Sportmonks\Football\Endpoint\Transfers;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class FootballClientPaginationTest extends TestCase
{
    /**
     * Sends a request after applying the given options and returns the query string that was sent.
     *
     * @param Closure(Transfers): Transfers $configure
     * @return array<mixed>
     */
    private function sentQuery(Closure $configure): array
    {
        $response = new MockResponse('{"data":[]}');
        $configure(new Transfers(token: 'TOKEN', httpClient: new MockHttpClient($response)))->all();

        parse_str((string) parse_url($response->getRequestUrl(), PHP_URL_QUERY), $query);

        return $query;
    }

    public function testSetPageRemovesCursor(): void
    {
        $query = $this->sentQuery(fn(Transfers $client): Transfers => $client->setCursor('abc')->setPage(2));

        $this->assertSame('2', $query['page'] ?? null);
        $this->assertArrayNotHasKey('cursor', $query);
    }

    public function testSetCursorRemovesPage(): void
    {
        $query = $this->sentQuery(fn(Transfers $client): Transfers => $client->setPage(2)->setCursor('abc'));

        $this->assertSame('abc', $query['cursor'] ?? null);
        $this->assertArrayNotHasKey('page', $query);
    }

    public function testSetCursorExtractsTokenFromSportmonksCursorUrl(): void
    {
        $query = $this->sentQuery(fn(Transfers $client): Transfers => $client->setCursor(
            'https://api.sportmonks.com/v3/football/transfers?filter=populate&cursor=abc',
        ));

        $this->assertSame('abc', $query['cursor'] ?? null);
    }

    public function testSetCursorNullRemovesCursorAndPage(): void
    {
        $query = $this->sentQuery(fn(Transfers $client): Transfers => $client->setPage(2)->setCursor(null));

        $this->assertArrayNotHasKey('cursor', $query);
        $this->assertArrayNotHasKey('page', $query);
    }
}
