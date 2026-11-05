<?php

declare(strict_types=1);

namespace Sportmonks\Test;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApi;

class SetupTest extends TestCase
{
    public function testMissingApiToken(): void
    {
        unset($_ENV['SPORTMONKS_API_TOKEN']);

        $this->expectException(InvalidArgumentException::class);
        FootballApi::bookmakers();
    }

    /**
     * @return array<string, array{mixed}>
     */
    public static function invalidTokens(): array
    {
        return [
            'empty string' => [''],
            'null' => [null],
            'integer' => [12345],
            'array' => [['TOKEN']],
            'boolean' => [true],
        ];
    }

    #[DataProvider('invalidTokens')]
    public function testInvalidApiTokenValueIsRejected(mixed $token): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = $token;

        $this->expectException(InvalidArgumentException::class);
        FootballApi::bookmakers();
    }

    #[Group('network')]
    public function testInvalidApiToken(): void
    {
        $_ENV['SPORTMONKS_API_TOKEN'] = 'INVALID';
        $this->expectException(ApiRequestException::class);
        FootballApi::bookmakers()->all();
    }
}
