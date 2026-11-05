# 📖 API Reference

All examples assume `use Sportmonks\Football\FootballApi;`.

## Contents

- [Pagination](#pagination)
- [Includes](#includes)
- [Filters](#filters)
- [Football endpoints](#football-endpoints)
- [Core endpoints](#core-endpoints)

## Pagination

```php
$response = FootballApi::fixtures()
    ->setPage(3)
    ->setPerPage(50)
    ->getByDate('2026-11-05');
```

`per_page` accepts 1–50 (default 25).

### Cursor pagination

```php
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

- `setCursor()` and `setPage()` replace each other.
- `setCursor()` also accepts a full next-page URL.
- `setCursor(null)` clears both.
- `per_page` isn't sent with a cursor; the page size from the first request applies.

## Includes

```php
$response = FootballApi::fixtures()
    ->setIncludes(['scores', 'lineups', 'events', 'statistics.type'])
    ->getByDate('2026-11-05');
```

Nested includes such as `statistics.type` are supported. Calling `setIncludes()` or `setFilters()`
again replaces the previous value instead of adding to it.

## Filters

```php
// Entity filter: name => IDs
$response = FootballApi::fixtures()
    ->setIncludes(['events'])
    ->setFilters(['eventTypes' => [18, 14]])
    ->getByDate('2026-11-05');

// Flag filters
$response = FootballApi::fixtures()->setFilters(['deleted'])->all();
$response = FootballApi::fixtures()->setFilters(['populate'])->all();
```

`populate` is for bulk loading: it allows up to 1,000 results per page but disables includes.

> Parameters are passed to Sportmonks as-is. Check the [Sportmonks docs](https://docs.sportmonks.com/v3)
> for the includes, filters, and page sizes each endpoint supports.

## Football endpoints

| Category | Endpoints |
| --- | --- |
| Matches | [Livescores](#-livescores), [Fixtures](#-fixtures), [States](#-states), [Schedules](#-schedules), [Venues](#-venues) |
| Competitions | [Leagues](#-leagues), [Seasons](#-seasons), [Stages](#-stages), [Rounds](#-rounds), [Standings](#-standings), [Topscorers](#-topscorers) |
| Teams & people | [Teams](#-teams), [Players](#-players), [Team Squads](#-team-squads), [Coaches](#-coaches), [Referees](#-referees), [Transfers](#-transfers), [Rivals](#-rivals) |
| Odds & predictions | [Predictions](#-predictions), [Pre-match Odds](#-pre-match-odds), [Inplay Odds](#-inplay-odds), [Markets](#-markets), [Bookmakers](#-bookmakers) |
| Coverage | [TV Stations](#-tv-stations), [Pre-match News](#-pre-match-news), [Commentaries](#-commentaries) |

### 📡 Livescores

```php
$response = FootballApi::livescores()->all();
$response = FootballApi::livescores()->inplay();
$response = FootballApi::livescores()->latest();
```

### 🥅 Fixtures

```php
$response = FootballApi::fixtures()->all();
$response = FootballApi::fixtures()->getById($fixtureId);
$response = FootballApi::fixtures()->getByMultipleIds($fixtureIds);
$response = FootballApi::fixtures()->getByDate($date);
$response = FootballApi::fixtures()->getByDateRange($dateFrom, $dateTo);
$response = FootballApi::fixtures()->getByDateRangeForTeam($dateFrom, $dateTo, $teamId);
$response = FootballApi::fixtures()->getHeadToHead($teamId1, $teamId2);
$response = FootballApi::fixtures()->search($searchQuery);
$response = FootballApi::fixtures()->getUpcomingByMarketId($marketId);
$response = FootballApi::fixtures()->getLastUpdated(); // recently updated fixtures
```

### 🛰️ States

```php
$response = FootballApi::states()->all();
$response = FootballApi::states()->getById($stateId);
```

### 🏆 Leagues

```php
$response = FootballApi::leagues()->all();
$response = FootballApi::leagues()->getById($leagueId);
$response = FootballApi::leagues()->live();
$response = FootballApi::leagues()->getByFixtureDate($date);
$response = FootballApi::leagues()->getByCountryId($countryId);
$response = FootballApi::leagues()->search($searchQuery);
$response = FootballApi::leagues()->getByTeamId($teamId);
$response = FootballApi::leagues()->getCurrentByTeamId($teamId);
```

### 🗓️ Seasons

```php
$response = FootballApi::seasons()->all();
$response = FootballApi::seasons()->getById($seasonId);
$response = FootballApi::seasons()->getByTeamId($teamId);
$response = FootballApi::seasons()->search($searchQuery);
```

### 📅 Schedules

```php
$response = FootballApi::schedules()->getBySeasonId($seasonId);
$response = FootballApi::schedules()->getByTeamId($teamId);
$response = FootballApi::schedules()->getBySeasonAndTeamId($seasonId, $teamId);
```

### 🪜 Stages

```php
$response = FootballApi::stages()->all();
$response = FootballApi::stages()->getById($stageId);
$response = FootballApi::stages()->getBySeasonId($seasonId);
$response = FootballApi::stages()->search($searchQuery);
```

### 🔂 Rounds

```php
$response = FootballApi::rounds()->all();
$response = FootballApi::rounds()->getById($roundId);
$response = FootballApi::rounds()->getBySeasonId($seasonId);
$response = FootballApi::rounds()->search($searchQuery);
```

### 🔢 Standings

```php
$response = FootballApi::standings()->all();
$response = FootballApi::standings()->getBySeasonId($seasonId);
$response = FootballApi::standings()->getByRoundId($roundId);
$response = FootballApi::standings()->getCorrectionsBySeasonId($seasonId);
$response = FootballApi::standings()->getLiveByLeagueId($leagueId);
```

### 🥇 Topscorers

```php
$response = FootballApi::topScorers()->getBySeasonId($seasonId);
$response = FootballApi::topScorers()->getByStageId($stageId);
```

### 🏃 Teams

```php
$response = FootballApi::teams()->all();
$response = FootballApi::teams()->getById($teamId);
$response = FootballApi::teams()->getByCountryId($countryId);
$response = FootballApi::teams()->getBySeasonId($seasonId);
$response = FootballApi::teams()->search($searchQuery);
```

### 🧑 Players

```php
$response = FootballApi::players()->all();
$response = FootballApi::players()->getById($playerId);
$response = FootballApi::players()->getByCountryId($countryId);
$response = FootballApi::players()->search($searchQuery);
$response = FootballApi::players()->getLastUpdated();
```

### 👥 Team Squads

```php
$response = FootballApi::teamSquads()->getByTeamId($teamId);
$response = FootballApi::teamSquads()->getByTeamAndSeasonId($teamId, $seasonId);
```

### 📋 Coaches

```php
$response = FootballApi::coaches()->all();
$response = FootballApi::coaches()->getById($coachId);
$response = FootballApi::coaches()->getByCountryId($countryId);
$response = FootballApi::coaches()->search($searchQuery);
$response = FootballApi::coaches()->getLastUpdated();
```

### 🕴️ Referees

```php
$response = FootballApi::referees()->all();
$response = FootballApi::referees()->getById($refereeId);
$response = FootballApi::referees()->getByCountryId($countryId);
$response = FootballApi::referees()->getBySeasonId($seasonId);
```

### ↔️ Transfers

```php
$response = FootballApi::transfers()->all();
$response = FootballApi::transfers()->getById($transferId);
$response = FootballApi::transfers()->latest();
$response = FootballApi::transfers()->getByDateRange($dateFrom, $dateTo);
$response = FootballApi::transfers()->getByTeamId($teamId);
$response = FootballApi::transfers()->getByPlayerId($playerId);
```

### 🏟️ Venues

```php
$response = FootballApi::venues()->all();
$response = FootballApi::venues()->getById($venueId);
$response = FootballApi::venues()->getBySeasonId($seasonId);
$response = FootballApi::venues()->search($searchQuery);
```

### 📺 TV Stations

```php
$response = FootballApi::tvStations()->all();
$response = FootballApi::tvStations()->getById($tvStationId);
$response = FootballApi::tvStations()->getByFixtureId($fixtureId);
```

### 🔭 Predictions

```php
$response = FootballApi::predictions()->all(); // probabilities
$response = FootballApi::predictions()->getPredictabilityByLeagueId($leagueId);
$response = FootballApi::predictions()->getPredictabilityByFixtureId($fixtureId);
$response = FootballApi::predictions()->valueBets();
```

### 💰 Pre-match Odds

```php
$response = FootballApi::preMatchOdds()->all();
$response = FootballApi::preMatchOdds()->getByFixtureId($fixtureId);
$response = FootballApi::preMatchOdds()->getByFixtureAndBookmakerId($fixtureId, $bookmakerId);
$response = FootballApi::preMatchOdds()->getByFixtureAndMarketId($fixtureId, $marketId);
$response = FootballApi::preMatchOdds()->getLastUpdated();
```

### ⚡ Inplay Odds

```php
$response = FootballApi::inplayOdds()->all();
$response = FootballApi::inplayOdds()->getByFixtureId($fixtureId);
$response = FootballApi::inplayOdds()->getByFixtureAndBookmakerId($fixtureId, $bookmakerId);
$response = FootballApi::inplayOdds()->getByFixtureAndMarketId($fixtureId, $marketId);
$response = FootballApi::inplayOdds()->getLastUpdated();
```

### 🛒 Markets

```php
$response = FootballApi::markets()->all();
$response = FootballApi::markets()->getById($marketId);
$response = FootballApi::markets()->search($searchQuery);
```

### 📑 Bookmakers

```php
$response = FootballApi::bookmakers()->all();
$response = FootballApi::bookmakers()->getById($bookmakerId);
$response = FootballApi::bookmakers()->search($searchQuery);
$response = FootballApi::bookmakers()->getByFixtureId($fixtureId);
```

### 📰 Pre-match News

```php
$response = FootballApi::preMatchNews()->all();
$response = FootballApi::preMatchNews()->getById($seasonId); // news for a season
$response = FootballApi::preMatchNews()->upcomingFixtures();
```

### ⚔️ Rivals

```php
$response = FootballApi::rivals()->all();
$response = FootballApi::rivals()->getById($teamId); // rivals of a team
```

### 🎙️ Commentaries

```php
$response = FootballApi::commentaries()->all();
$response = FootballApi::commentaries()->getByFixtureId($fixtureId);
```

## Core endpoints

| Category | Endpoints |
| --- | --- |
| Geography | [Continents](#-continents), [Countries](#-countries), [Regions](#-regions), [Cities](#-cities) |
| Reference | [Types](#-types), [Filters](#-filters) |
| Account | [My Sportmonks](#-my-sportmonks) |

### 🗺️ Continents

```php
$response = FootballApi::continents()->all();
$response = FootballApi::continents()->getById($continentId);
```

### 🏳️ Countries

```php
$response = FootballApi::countries()->all();
$response = FootballApi::countries()->getById($countryId);
$response = FootballApi::countries()->search($searchQuery);
```

### 🏴 Regions

```php
$response = FootballApi::regions()->all();
$response = FootballApi::regions()->getById($regionId);
$response = FootballApi::regions()->search($searchQuery);
```

### 🏙️ Cities

```php
$response = FootballApi::cities()->all();
$response = FootballApi::cities()->getById($cityId);
$response = FootballApi::cities()->search($searchQuery);
```

### ⌨️ Types

```php
$response = FootballApi::types()->all();
$response = FootballApi::types()->getById($typeId);
$response = FootballApi::types()->getByEntity(); // types grouped by entity
```

### ⚙️ Filters

```php
$response = FootballApi::filters()->allEntity();
```

### 👤 My Sportmonks

```php
$response = FootballApi::my()->enrichments();
$response = FootballApi::my()->resources();
$response = FootballApi::my()->leagues();
```
