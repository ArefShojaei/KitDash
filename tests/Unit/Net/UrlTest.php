<?php

namespace Tests\Unit\Net;

use Error;

use PHPUnit\Framework\TestCase;

use Kit\Net\Url;
use Kit\Net\Interfaces\Url as IUrl;

final class UrlTest extends TestCase
{
    private string $simpleUrl = "https://google.com";

    private string $fullUrl = "https://example.com/path/to/page?name=Aref&age=25";

    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void
    {
        try {
            new Url();
        } catch (Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedUrlInterface(): void
    {
        $interfaces = class_implements(Url::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IUrl::class, $interfaces);
    }

    /**
     * @test
     */
    public function createUrlInstance(): IUrl
    {
        $instance = Url::create($this->simpleUrl);

        $this->assertInstanceOf(Url::class, $instance);
        $this->assertInstanceOf(IUrl::class, $instance);

        return $instance;
    }

    /**
     * @test
     */
    public function hrefReturnsFullUrl(): void
    {
        $url = Url::create($this->fullUrl);

        $this->assertSame($this->fullUrl, $url->href());
    }

    /**
     * @test
     */
    public function hostReturnsHostname(): void
    {
        $url = Url::create($this->simpleUrl);

        $this->assertSame("google.com", $url->host());
    }

    /**
     * @test
     */
    public function hostFromFullUrl(): void
    {
        $url = Url::create($this->fullUrl);

        $this->assertSame("example.com", $url->host());
    }

    /**
     * @test
     */
    public function domainReturnsTopLevelDomain(): void
    {
        $url = Url::create($this->simpleUrl);

        $this->assertSame(".com", $url->domain());
    }

    /**
     * @test
     */
    public function originReturnsProtocolAndHost(): void
    {
        $url = Url::create($this->fullUrl);

        $this->assertSame("https://example.com", $url->origin());
    }

    /**
     * @test
     */
    public function pathReturnsPathSegment(): void
    {
        $url = Url::create($this->fullUrl);

        $this->assertSame("/path/to/page?name=Aref&age=25", $url->path());
    }

    /**
     * @test
     */
    public function pathReturnsNullWhenNoPathExists(): void
    {
        $url = Url::create($this->simpleUrl);

        $this->assertNull($url->path());
    }

    /**
     * @test
     */
    public function protocolReturnsScheme(): void
    {
        $url = Url::create($this->simpleUrl);

        $this->assertSame("https", $url->protocol());
    }

    /**
     * @test
     */
    public function protocolWithHttp(): void
    {
        $url = Url::create("http://example.com");

        $this->assertSame("http", $url->protocol());
    }

    /**
     * @test
     */
    public function queryReturnsQueryParametersAsArray(): void
    {
        $url = Url::create($this->fullUrl);

        $query = $url->query();

        $this->assertIsArray($query);
        $this->assertSame("Aref", $query["name"]);
        $this->assertSame("25", $query["age"]);
    }

    /**
     * @test
     */
    public function queryWithSingleParameter(): void
    {
        $url = Url::create("https://example.com/search?q=kitdash");

        $query = $url->query();

        $this->assertSame(["q" => "kitdash"], $query);
    }
}
