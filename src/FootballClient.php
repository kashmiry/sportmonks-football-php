<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football;

use InvalidArgumentException;
use JsonException;
use Kash\Sportmonks\Football\Exception\ApiRequestException;
use SensitiveParameter;
use stdClass;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class FootballClient
{
    protected const string BASE_URI = 'https://api.sportmonks.com/v3/football/';

    private readonly HttpClientInterface $client;

    private readonly string $apiToken;

    /** @var array<string, int|string> */
    private array $query = [];

    /**
     * Settings not passed in fall back to SPORTMONKS_API_TOKEN and SPORTMONKS_TIMEZONE in $_ENV.
     *
     * @param HttpClientInterface|null $httpClient Optional client for timeouts, retries, proxies, or tests.
     */
    public function __construct(
        #[SensitiveParameter]
        ?string $token = null,
        ?string $timezone = null,
        ?HttpClientInterface $httpClient = null,
    ) {
        $token ??= $this->env('SPORTMONKS_API_TOKEN');

        if ($token === null || $token === '') {
            throw new InvalidArgumentException('Missing Sportmonks API token: set SPORTMONKS_API_TOKEN or pass $token.');
        }

        $this->apiToken = $token;

        $timezone ??= $this->env('SPORTMONKS_TIMEZONE');

        if ($timezone !== null && $timezone !== '') {
            $this->query['timezone'] = $timezone;
        }

        $this->client = ($httpClient ?? HttpClient::create())->withOptions(['base_uri' => static::BASE_URI]);
    }

    /**
     * Keeps the API token out of var_dump(), print_r() and debugger output.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['apiToken' => '[redacted]', 'query' => $this->query];
    }

    private function env(string $name): ?string
    {
        $value = $_ENV[$name] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * @throws ApiRequestException
     */
    protected function call(string $url): stdClass
    {
        $query = $this->query;

        // Sportmonks rejects per_page together with a cursor (HTTP 400).
        if (isset($query['cursor'])) {
            unset($query['per_page']);
        }

        try {
            $content = $this->client->request('GET', $url, [
                'query' => $query,
                // Header, not query parameter, so the token never appears in URLs or logs.
                'headers' => ['Authorization' => $this->apiToken],
            ])->getContent();
        } catch (HttpExceptionInterface $e) {
            throw new ApiRequestException($this->httpErrorMessage($e), $e->getCode(), $e);
        } catch (TransportExceptionInterface $e) {
            throw new ApiRequestException($e->getMessage(), $e->getCode(), $e);
        }

        try {
            $data = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new ApiRequestException('Invalid JSON response: ' . $e->getMessage(), 0, $e);
        }

        if (!$data instanceof stdClass) {
            throw new ApiRequestException('Unexpected response: expected a JSON object.');
        }

        return $data;
    }

    /**
     * Appends Sportmonks' own error message (e.g. why access was denied) to the HTTP error.
     */
    private function httpErrorMessage(HttpExceptionInterface $e): string
    {
        $message = $e->getMessage();

        try {
            $body = json_decode($e->getResponse()->getContent(false));
        } catch (TransportExceptionInterface) {
            return $message;
        }

        if ($body instanceof stdClass && is_string($body->message ?? null) && trim($body->message) !== '') {
            $message .= ' ' . trim($body->message);
        }

        return $message;
    }

    /**
     * @param list<string> $includes
     */
    public function setIncludes(array $includes): static
    {
        $this->query['include'] = implode(';', self::cleanList($includes));

        return $this;
    }

    /**
     * @param array<int|string, string|list<int|string>> $filters Entity filters as name => IDs, flags as values.
     */
    public function setFilters(array $filters): static
    {
        $parts = [];

        foreach ($filters as $name => $value) {
            $parts[] = is_array($value)
                ? $name . ':' . implode(',', self::cleanList($value))
                : $value;
        }

        $this->query['filters'] = implode(';', $parts);

        return $this;
    }

    public function setPage(int $page): static
    {
        unset($this->query['cursor']);
        $this->query['page'] = $page;

        return $this;
    }

    /**
     * Accepts a cursor value or a full next-page URL. Null clears both cursor and page.
     */
    public function setCursor(?string $cursor): static
    {
        unset($this->query['page'], $this->query['cursor']);

        $cursor = $this->cursorValue($cursor);

        if ($cursor !== null) {
            $this->query['cursor'] = $cursor;
        }

        return $this;
    }

    private function cursorValue(?string $cursor): ?string
    {
        $cursor = trim((string) $cursor);

        if ($cursor === '') {
            return null;
        }

        if (preg_match('#^https?://#i', $cursor) === 1) {
            $query = parse_url($cursor, PHP_URL_QUERY);

            if (is_string($query) && $query !== '') {
                parse_str($query, $params);

                if (is_string($params['cursor'] ?? null) && trim($params['cursor']) !== '') {
                    return trim($params['cursor']);
                }
            }
        }

        return $cursor;
    }

    public function setPerPage(int $perPage): static
    {
        $this->query['per_page'] = $perPage;

        return $this;
    }

    /**
     * Trims values and drops empty ones. Accepts integers, so IDs can be passed as ints.
     *
     * @param array<int|string> $values
     * @return list<string>
     */
    protected static function cleanList(array $values): array
    {
        $values = array_map(static fn(int|string $value): string => trim((string) $value), $values);

        return array_values(array_filter($values, static fn(string $value): bool => $value !== ''));
    }
}
