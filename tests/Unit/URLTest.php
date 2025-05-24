<?php

namespace Tests\Unit;

use Kit\Contracts\Interfaces\URL as IURL;
use Kit\Utils\URL;
use PHPUnit\Framework\TestCase;


final class URLTest extends TestCase {
    private ?string $url;

    protected function setUP(): void {
        $this->url = "https://google.com";
    }

    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void {
        try {
            new URL;
        } catch (\Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test 
     */
    public function createUrlInstance(): IURL {
        $instance = URL::create($this->url);

        $this->assertIsObject($instance);
        $this->assertInstanceOf(URL::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createUrlInstance
     */
    public function getUrlInfo(IURL $url): void {
        $data = [
            "href" => $url->href(),
            "host" => $url->host(),
            "domain" => $url->domain(),
            "origin" => $url->origin(),
            "path" => $url->path(),
            "protocol" => $url->protocol(),
            "query" => $url->query(),
        ];

        $this->assertIsArray($data);
    }
}