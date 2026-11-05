# AGENTS.md

## Project

PHP client for the Sportmonks Football API v3, published as `kashmiry/sportmonks-football-php`.
Code must run on the minimum PHP version in `composer.json` (`require.php`); use modern syntax up to that version.
Before finishing, run `composer fix`, then `composer test`, `composer analyse`, and `composer lint`. All must pass.

| Path | Purpose |
| --- | --- |
| `src/FootballApi.php` | Static facade: one method per endpoint class |
| `src/FootballClient.php` | Base HTTP client: auth, includes, filters, pagination |
| `src/Endpoint/*.php` | One class per Sportmonks endpoint group, one method per API path |

## Endpoints

Verify paths and parameters against the Sportmonks docs, never from memory.

- Each method's `@link` points to its docs page; append `.md` for Markdown. Find other pages in
  https://docs.sportmonks.com/v3/llms.txt, or ask directly: `https://docs.sportmonks.com/v3/sportmonks-ai-docs.md?ask=<question>`.
- Take the path from the page's base URL line, not its code samples, which can be wrong.
- New methods need an `@link`; new endpoint classes need a facade method in `FootballApi`.
- Update `docs/Reference.md`, and `skills/sportmonks-football-php/SKILL.md` if usage changes.

## Rules

- **Don't break the public API.** To rename a method, add the new one and keep the old as a
  `@deprecated` alias.
- **Tests stay offline.** Mock HTTP with `MockHttpClient` (see `tests/FootballClientAuthTest.php`).
  Tests that need the network get `#[Group('network')]`. Never use real API tokens.
- **Keep the token out of URLs.** It's sent in the `Authorization` header.
- **Keep docs short.** README and Reference use emoji headings and minimal prose.
- **Mark repository-only files `export-ignore`** in `.gitattributes`. `src/`, `docs/`, and `skills/` ship to users.
