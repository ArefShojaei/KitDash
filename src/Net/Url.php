<?php

namespace Kit\Net;

use Kit\Net\Interfaces\Url as IUrl;
use Kit\Net\Constants\UrlRegexPattern;

final class Url implements IUrl
{
    private static string $url;

    private function __construct() {}

    public static function create(string $url): self
    {
        self::$url = $url;

        return new self();
    }

    public function href(): string
    {
        return self::$url;
    }

    public function host(): string
    {
        preg_match(UrlRegexPattern::HOST, $this->href(), $matches);

        return $matches["host"];
    }

    public function domain(): string
    {
        $parsedHost = explode(".", $this->host());

        return "." . end($parsedHost);
    }

    public function origin(): string
    {
        preg_match(UrlRegexPattern::ORIGIN, $this->href(), $matches);

        return $matches["origin"];
    }

    public function path(): ?string
    {
        preg_match(UrlRegexPattern::PATH, $this->href(), $matches);

        return $matches["path"] ?? null;
    }

    public function protocol(): string
    {
        preg_match(UrlRegexPattern::PROTOCOL, $this->href(), $matches);

        return $matches["protocol"];
    }

    public function query(): array
    {
        $data = [];

        preg_match(UrlRegexPattern::QUERY, $this->href(), $matches);

        $queries = explode("&", $matches["query"]);

        foreach ($queries as $query) {
            [$key, $value] = explode("=", $query);

            $data[$key] = $value;
        }

        return $data;
    }
}
