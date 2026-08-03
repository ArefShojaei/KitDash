<?php

namespace Tests\Unit\Net;

use PHPUnit\Framework\TestCase;

use Kit\Net\{Http, Request};
use Kit\Net\Exceptions\InvalidRequestMethodException;

final class RequestTest extends TestCase
{
    /**
     * @test
     */
    public function it_extends_http_class(): void
    {
        $this->assertTrue(is_subclass_of(Request::class, Http::class));
    }

    /**
     * @test
     */
    public function get_returns_string_or_null(): void
    {
        $result = Request::get("https://example.com");

        $this->assertTrue(is_string($result) || $result === null);
    }

    /**
     * @test
     */
    public function readable_constant_is_defined(): void
    {
        $this->assertSame("GET", Request::READABLE);
    }

    /**
     * @test
     */
    public function creatable_constant_is_defined(): void
    {
        $this->assertSame("POST", Request::CREATABLE);
    }

    /**
     * @test
     */
    public function updateable_constant_is_defined(): void
    {
        $this->assertSame("PUT", Request::UPDATEABLE);
    }

    /**
     * @test
     */
    public function editable_constant_is_defined(): void
    {
        $this->assertSame("PATCH", Request::EDITABLE);
    }

    /**
     * @test
     */
    public function deletable_constant_is_defined(): void
    {
        $this->assertSame("DELETE", Request::DELETABLE);
    }

    /**
     * @test
     */
    public function unsupported_method_throws_exception(): void
    {
        $this->expectException(InvalidRequestMethodException::class);

        Request::options("https://example.com");
    }

    /**
     * @test
     */
    public function another_unsupported_method_throws_exception(): void
    {
        $this->expectException(InvalidRequestMethodException::class);

        Request::head("https://example.com");
    }
}
