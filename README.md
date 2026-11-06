# ⚽ Sportmonks Football PHP

[![Tests](https://github.com/kashmiry/sportmonks-football-php/actions/workflows/tests.yml/badge.svg)](https://github.com/kashmiry/sportmonks-football-php/actions/workflows/tests.yml)
[![Latest Version](https://img.shields.io/packagist/v/kashmiry/sportmonks-football-php?label=version)](https://packagist.org/packages/kashmiry/sportmonks-football-php)
[![PHP Version](https://img.shields.io/packagist/dependency-v/kashmiry/sportmonks-football-php/php?label=PHP)](https://packagist.org/packages/kashmiry/sportmonks-football-php)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max-brightgreen)](phpstan.neon)
[![License](https://img.shields.io/packagist/l/kashmiry/sportmonks-football-php)](LICENSE)

Actively maintained PHP client for the [Sportmonks Football API](https://docs.sportmonks.com/v3).

## 📋 Requirements

- PHP >= 8.3
- A Sportmonks API token (your plan determines which endpoints you can call)
- Sportmonks API v3

## 📦 Installation

```bash
composer require kashmiry/sportmonks-football-php
```

## ⚙️ Configuration

| Variable | Required | Description |
| --- | --- | --- |
| `SPORTMONKS_API_TOKEN` | Yes | Your Sportmonks API token |
| `SPORTMONKS_TIMEZONE` | No | Timezone for returned dates (default: `UTC`) |

**From `$_ENV`** (default): set the variables once, and every call uses them.

```php
$_ENV['SPORTMONKS_API_TOKEN'] = getenv('SPORTMONKS_API_TOKEN') ?: '';
$_ENV['SPORTMONKS_TIMEZONE'] = 'Asia/Riyadh';
```

> [!TIP]
> Using a `.env` file? [`symfony/dotenv`](https://symfony.com/doc/current/components/dotenv.html) loads it into `$_ENV` for you.

**Per endpoint:** pass settings to the constructor. Each one is optional and falls back to `$_ENV`. Use `httpClient` to bring your own [Symfony HTTP client](https://symfony.com/doc/current/http_client.html) for timeouts, retries, or tests.

```php
use Kash\Sportmonks\Football\Endpoint\Fixtures;

$fixtures = new Fixtures(token: $token, timezone: 'Asia/Riyadh', httpClient: $httpClient);
```

## 🚀 Usage

Pick an endpoint from `FootballApi`, chain any options, then make the request:

```php
use Kash\Sportmonks\Football\FootballApi;

$response = FootballApi::fixtures()
    ->setIncludes(['scores', 'lineups', 'events'])
    ->getByDate('2026-11-05');

foreach ($response->data as $fixture) {
    echo $fixture->name, PHP_EOL; // e.g. "Real Madrid vs FC Barcelona"
}
```

Every call returns the decoded JSON response:

- `$response->data`: the results
- `$response->pagination`: paging info, when available

📖 See the [API reference](docs/Reference.md) for pagination, includes, filters, and all endpoints.

## 🤖 AI Assistants

The package ships an [agent skill](skills/sportmonks-football-php/SKILL.md) that teaches coding agents how to use this client:

```bash
npx skills add kashmiry/sportmonks-football-php

# or directly copy it from the installed package
mkdir -p .agents/skills && cp -r vendor/kashmiry/sportmonks-football-php/skills/* .agents/skills/
```

Sportmonks also offers [AI docs and an MCP server](https://docs.sportmonks.com/v3/sportmonks-ai-docs) for exploring the API.

## 🤝 Contributing

Contributions are welcome.

- **Bug reports:** include steps to reproduce, expected and actual behavior, and your PHP version.
- **Pull requests:** target `main`, keep changes focused, and explain why they are needed. Include a regression test for bug fixes.

## 🙏 Credits

Derived from the work of [Carsten Tetzlaff](https://github.com/tetzilla) and [Joe Saunderson](https://github.com/joesaunderson).

## 📄 License

Licensed under the [MIT License](LICENSE).
