---
name: sportmonks-football-php
description: Write or debug PHP integrations with the Sportmonks Football API using kashmiry/sportmonks-football-php. Use for endpoint calls, includes, filters, pagination, and error handling.
---

# Sportmonks Football PHP

PHP client for the Sportmonks Football API v3. Every endpoint is reached through the static
`Sportmonks\Football\FootballApi` facade.

## Setup

- The client reads `$_ENV['SPORTMONKS_API_TOKEN']` (required) and `$_ENV['SPORTMONKS_TIMEZONE']`
  (optional, defaults to UTC) when each endpoint object is created. Set them before calling `FootballApi`.
- A missing token throws `InvalidArgumentException`. Never hardcode the token.
- If the app doesn't populate `$_ENV` (for example, with cached framework config), assign the token from
  the app's config before calling the client.

## Making requests

```php
use Sportmonks\Football\FootballApi;

$response = FootballApi::fixtures()
    ->setIncludes(['participants', 'scores', 'events'])
    ->setFilters(['eventTypes' => [14, 18]])
    ->getByDate('2026-11-05');

foreach ($response->data as $fixture) {
    echo $fixture->name, PHP_EOL;
}
```

- Each `FootballApi::...()` call returns a new client. Options never carry over between calls.
- Calling `setIncludes()` or `setFilters()` again replaces the previous value.
- Filters take `['name' => [ids]]` for entity filters or `['flag']` for flags such as `populate` and `deleted`.
- `populate` allows up to 1,000 results per page but disables includes. Don't combine it with `setIncludes()`.
- Dates must be `Y-m-d`.
- Responses are decoded JSON (`stdClass`). Results are in `->data`; paging info is in `->pagination`.
- Fetching one entity by ID (e.g. `fixtures()->getById($id)`) returns a single object in `->data`; everything
  else returns an array. Don't loop over a single result.
- Request only the includes you need: each one makes the response larger and slower.

## Pagination

```php
// Page-based
FootballApi::fixtures()->setPage(2)->setPerPage(50)->all();

// Cursor-based: process every page
$response = FootballApi::transfers()->setFilters(['populate'])->all();
while (true) {
    foreach ($response->data as $transfer) {
        // ...
    }
    if (!$response->pagination->has_more) break;
    $response = FootballApi::transfers()
        ->setFilters(['populate'])
        ->setCursor($response->pagination->next_cursor)
        ->all();
}
```

- `per_page` accepts 1–50 (default 25).
- `per_page` is never sent with a cursor (Sportmonks rejects the combination); the first request's page size applies.

## Errors

| Exception | When |
| --- | --- |
| `Sportmonks\Football\Exception\ApiRequestException` | HTTP error or network failure. For HTTP errors, `getCode()` is the status (401/403 token or plan, 404 not found, 429 rate limited: back off and retry), and the message includes Sportmonks' explanation when one is returned. Network failures (DNS, timeout, connection) have no status and usually code `0`. |
| `Sportmonks\Football\Exception\InvalidDateFormatException` | A date argument is not `Y-m-d`. |
| `InvalidArgumentException` | No API token is set. |

## Finding IDs

Most methods take numeric IDs. Resolve names with `search()` first (for example
`FootballApi::teams()->search('Real Madrid')`), then use the ID. Cache IDs; they don't change.

## Methods whose names are misleading

| Call | What it actually returns |
| --- | --- |
| `preMatchNews()->getById($seasonId)` | Pre-match news for a season |
| `rivals()->getById($teamId)` | Rivals of a team |
| `fixtures()->getLastUpdated()` | Recently updated fixtures |
| `types()->getByEntity()` | Types grouped by entity |
| `predictions()->all()` | Probabilities |

## Reference

- Every method and its signature: `docs/Reference.md` in this package
  (`vendor/kashmiry/sportmonks-football-php/docs/Reference.md`).
- Each endpoint method's docblock has an `@link` to its Sportmonks docs page. Append `.md` to that URL
  for a Markdown version with the available includes, filters, and response fields.
- Sportmonks docs index for agents: https://docs.sportmonks.com/v3/llms.txt
- If an endpoint the user needs is not in this client, say so. Don't invent methods.
