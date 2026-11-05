<?php

declare(strict_types=1);

namespace Sportmonks\Test;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Sportmonks\Football\FootballClient;

class FootballClientPaginationTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    private function queryFor(FootballClient $client): array
    {
        $query = (new ReflectionClass($client))->getProperty('query')->getValue($client);
        $this->assertIsArray($query);

        return $query;
    }

    public function testSetPageRemovesCursor(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
        $client = new FootballClient();

        $client->setCursor('abc')->setPage(2);
        $query = $this->queryFor($client);

        $this->assertSame(2, $query['page']);
        $this->assertArrayNotHasKey('cursor', $query);
    }

    public function testSetCursorRemovesPage(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
        $client = new FootballClient();

        $client->setPage(2)->setCursor('abc');
        $query = $this->queryFor($client);

        $this->assertSame('abc', $query['cursor']);
        $this->assertArrayNotHasKey('page', $query);
    }

    public function testSetCursorExtractsTokenFromSportmonksCursorUrl(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
        $client = new FootballClient();

        $client->setCursor('https://api.sportmonks.com/v3/football/transfers?filter=populate&cursor=abc');
        $query = $this->queryFor($client);

        $this->assertSame('abc', $query['cursor']);
    }

    public function testSetCursorNullRemovesCursorAndPage(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'TOKEN';
        $client = new FootballClient();

        $client->setPage(2)->setCursor(null);
        $query = $this->queryFor($client);

        $this->assertArrayNotHasKey('cursor', $query);
        $this->assertArrayNotHasKey('page', $query);
    }
}
