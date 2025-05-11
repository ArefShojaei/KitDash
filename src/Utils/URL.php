<?php

namespace Kit\Utils;

use Kit\Contracts\Interfaces\URL as IURL;


final class URL implements IURL {
    private static string $url;


    private function __construct() {}

    public static function create(string $url): self {
        self::$url = $url;
        
        return new self;
    }

    public function href(): string {
        return self::$url;
    }

    public function host(): string {
        preg_match("/https?:\/\/(?<host>[\w._]+)\/?/", $this->href(), $matches);
        
        return $matches["host"];
    }
    
    public function domain(): string {
        $parsedHost = explode(".", $this->host());

        return "." . end($parsedHost);
    }
    
    public function origin(): string {
        preg_match("/(?<origin>https?:\/\/[\w._]+)\/?/", $this->href(), $matches);

        return $matches["origin"];
    }
    
    public function path(): ?string {
        preg_match("/https?:\/\/[\w._]+(?<path>\/.+)/", $this->href(), $matches);
    
        return $matches["path"] ?? null;
    }

    public function protocol(): string {
        preg_match("/(?<protocol>https?).+/", $this->href(), $matches);
    
        return $matches["protocol"];
    }
    
    public function query(): array {
        $data = [];
        
        preg_match("/https?:\/\/.+\?(?<query>.+)/", $this->href(), $matches);
    
        $queries = explode("&", $matches["query"]);

        foreach ($queries as $query) {
            [$key, $value] = explode("=", $query);

            $data[$key] = $value;
        }

        return $data;
    }
}