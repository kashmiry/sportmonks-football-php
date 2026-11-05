# ⚽ Sportmonks Football PHP

Actively maintained PHP client for the [Sportmonks Football API](https://docs.sportmonks.com/v3).

## 📋 Requirements

- PHP 7.3 or later
- A Sportmonks API token (your plan determines which endpoints you can call)
- Sportmonks API v3

## ⚙️ Configuration

The client reads its settings from `$_ENV`:

| Variable | Required | Description |
| --- | --- | --- |
| `SPORTMONKS_API_TOKEN` | Yes | Your Sportmonks API token |
| `SPORTMONKS_TIMEZONE` | No | Timezone for returned dates (default: `UTC`) |

```php
require __DIR__ . '/vendor/autoload.php';

$_ENV['SPORTMONKS_API_TOKEN'] = getenv('SPORTMONKS_API_TOKEN') ?: '';
$_ENV['SPORTMONKS_TIMEZONE'] = 'Asia/Riyadh';
```

Using a `.env` file? [`symfony/dotenv`](https://symfony.com/doc/current/components/dotenv.html) loads it into `$_ENV` for you.

## 🚀 Usage

```php
use Sportmonks\Football\FootballApi;

$response = FootballApi::fixtures()
    ->setIncludes(['scores', 'lineups', 'events'])
    ->getByDate('2026-11-05');

foreach ($response->data as $fixture) {
    echo $fixture->name, PHP_EOL; // e.g. "Real Madrid vs FC Barcelona"
}
```

Each call returns the decoded JSON response, with results in `$response->data` and paging info in `$response->pagination`.

📖 See the [API reference](docs/Reference.md) for pagination, includes, filters, and all endpoints.

## 🤖 AI Assistants

The package ships an [agent skill](skills/sportmonks-football-php/SKILL.md) that teaches coding agents how to use this client:

```bash
npx skills add kashmiry/sportmonks-football-php
```

Or copy it manually: `vendor/kashmiry/sportmonks-football-php/skills/sportmonks-football-php` → `.agents/skills/`.

Sportmonks also offers [AI docs and an MCP server](https://docs.sportmonks.com/v3/sportmonks-ai-docs) for exploring the API.

## 🤝 Contributing

Contributions are welcome.

- **Bug reports:** include steps to reproduce, expected and actual behavior, and your PHP version.
- **Pull requests:** target `main`, keep changes focused, and explain why they are needed. Include a regression test for bug fixes.

## 🙏 Credits

Derived from the work of [Carsten Tetzlaff](https://github.com/tetzilla) and [Joe Saunderson](https://github.com/joesaunderson).

## 📄 License

Licensed under the [MIT License](LICENSE).
