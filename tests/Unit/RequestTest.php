<?php

namespace Tests\Unit;

use Kit\Utils\Http;
use Kit\Utils\Request;
use PHPUnit\Framework\TestCase;


final class RequestTest extends TestCase {
    /**
     * Sample resource for working with API
     */
    private const BASE_URL = "https://jsonplaceholder.typicode.com";

    private array $validEndPoints = [
        "posts" => "/posts",
        "post" => "/posts/1",
    ];

    private array $inValidEndPoints = [
        "tags" => "/tags",
        "tag" => "/tags/1",
    ];
    

    /**
     * @test
     */
    public function isExtendsHttpObject(): void {
        $isExtends = is_subclass_of(Request::class, Http::class);
    
        $this->assertTrue($isExtends);
    }

    /**
     * @test
     */
    public function sendRequestToGetAllDataThatReturnsAnArray(): void {
        $url = self::BASE_URL . $this->validEndPoints["posts"];
        
        $posts = Request::get($url);
    
        $this->assertIsArray($posts);
        $this->assertIsIterable($posts);
    }

    /**
     * @test
     */
    public function sendInvalidRequestToNotGetAllDataThatReturnsEmptyObject(): void {
        $url = self::BASE_URL . $this->inValidEndPoints["tags"];
        
        $tags = Request::get($url);

        $this->assertIsNotArray($tags);
        $this->assertIsNotIterable($tags);
        $this->assertNotNull($tags);
        $this->assertIsObject($tags);
    }

    /**
     * @test
     */
    public function sendRequestToGetOneDataOfAnArrayThatReturnsAnObject(): void {
        $url = self::BASE_URL . $this->validEndPoints["post"];
        
        $post = Request::get($url);
    
        $this->assertIsObject($post);
    }

    /**
     * @test
     */
    public function sendInvalidRequestToNotGetOneDataOfAnArrayInAnObjectThatReturnsNull(): void {
        $url = self::BASE_URL . $this->inValidEndPoints["tag"];
        
        $tag = Request::get($url);
    
        $this->assertIsNotObject($tag);
        $this->assertNull($tag);
    }
    
    /**
     * @test
     */
    public function sendRequestToStoreNewDataThatReturnsAnObject(): void {
        $url = self::BASE_URL . $this->validEndPoints["posts"];
        
        $post = [
            "userId" => 100,
            "id" => 100,
            "title" => "New Post!",
            "body" => "This is my new Post that is stored by HTTP Request."
        ];

        $response = Request::post($url, $post);
    
        $this->assertIsObject($response);
        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(expected:101, actual:$response->id);
    }
    
    /**
     * @test
     */
    public function sendInvalidRequestToStoreNewDataThatReturnsEmptyObject(): void {
        $url = self::BASE_URL . $this->inValidEndPoints["tags"];
        
        $post = [
            "userId" => 100,
            "id" => 100,
            "title" => "New Post!",
            "body" => "This is my new Post that is stored by HTTP Request."
        ];

        $response = Request::post($url, $post);

        $this->assertIsObject($response);
        $this->assertObjectNotHasProperty("id", $response);
    }
}