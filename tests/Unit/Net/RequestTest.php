<?php

namespace Tests\Unit\Net;

use PHPUnit\Framework\TestCase;

use Kit\Net\{Request, Http};
use Kit\Net\Exceptions\InvalidRequestMethodException;

final class RequestTest extends TestCase
{
    private const BASE_URL = "https://jsonplaceholder.typicode.com";

    /**
     * @test
     */
    public function isExtendsHttpClass(): void
    {
        $this->assertTrue(is_subclass_of(Request::class, Http::class));
    }

    /**
     * @test
     */
    public function getAllPostsReturnsArray(): void
    {
        $posts = Request::get(self::BASE_URL . "/posts");

        $this->assertIsArray($posts);
        $this->assertNotEmpty($posts);
    }

    /**
     * @test
     */
    public function getSinglePostReturnsObject(): void
    {
        $post = Request::get(self::BASE_URL . "/posts/1");

        $this->assertIsObject($post);
        $this->assertObjectHasProperty("id", $post);
        $this->assertObjectHasProperty("title", $post);
        $this->assertSame(1, $post->id);
    }

    /**
     * @test
     */
    public function getInvalidEndpointReturnsEmptyObjectOrNull(): void
    {
        $result = Request::get(self::BASE_URL . "/invalid-endpoint-xyz");

        $this->assertTrue(is_object($result) || is_null($result));
    }

    /**
     * @test
     */
    public function postCreatesNewResource(): void
    {
        $payload = [
            "title" => "KitDash Test Post",
            "body" => "This post was created by KitDash Request test",
            "userId" => 1,
        ];

        $response = Request::post(self::BASE_URL . "/posts", $payload);

        $this->assertIsObject($response);
        $this->assertObjectHasProperty("id", $response);
        $this->assertSame(101, $response->id);
    }

    /**
     * @test
     */
    public function putUpdatesResource(): void
    {
        $payload = [
            "id" => 1,
            "title" => "Updated Title",
            "body" => "Updated body",
            "userId" => 1,
        ];

        $response = Request::put(self::BASE_URL . "/posts/1", $payload);

        $this->assertIsObject($response);
        $this->assertObjectNotHasProperty("title", $response);
        $this->assertSame(1, $response->id);
    }

    /**
     * @test
     */
    public function patchPartiallyUpdatesResource(): void
    {
        $payload = [
            "title" => "Patched Title",
        ];

        $response = Request::patch(self::BASE_URL . "/posts/1", $payload);

        $this->assertIsObject($response);
        $this->assertObjectHasProperty("title", $response);
    }

    /**
     * @test
     */
    public function deleteRemovesResource(): void
    {
        $response = Request::delete(self::BASE_URL . "/posts/1", []);

        $this->assertTrue(
            is_object($response) || is_null($response) || is_array($response),
        );
    }

    /**
     * @test
     */
    public function unsupportedMethodThrowsException(): void
    {
        $this->expectException(InvalidRequestMethodException::class);
        $this->expectExceptionMessage("OPTIONS method is not supported!");

        Request::options(self::BASE_URL . "/posts");
    }

    /**
     * @test
     */
    public function anotherUnsupportedMethodThrowsException(): void
    {
        $this->expectException(InvalidRequestMethodException::class);

        Request::head(self::BASE_URL . "/posts");
    }

    /**
     * @test
     */
    public function allowedMethodsAreDefined(): void
    {
        $this->assertSame("GET", Request::READABLE);
        $this->assertSame("POST", Request::CREATABLE);
        $this->assertSame("PUT", Request::UPDATEABLE);
        $this->assertSame("PATCH", Request::EDITABLE);
        $this->assertSame("DELETE", Request::DELETABLE);
    }
}
