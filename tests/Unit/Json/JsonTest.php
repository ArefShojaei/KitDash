<?php

namespace Tests\Unit\Json;

use PHPUnit\Framework\TestCase;

use Kit\Json\Json;
use Kit\Json\Interfaces\Json as IJson;
use Kit\Json\Exceptions\JsonException;

final class JsonTest extends TestCase
{
    /**
     * @test
     */
    public function isImplementedJsonInterface(): void
    {
        $interfaces = class_implements(Json::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IJson::class, $interfaces);
    }

    /**
     * @test
     */
    public function encodeConvertsArrayToJsonString(): void
    {
        $data = ["name" => "Aref", "age" => 25];

        $json = Json::encode($data);

        $this->assertIsString($json);
        $this->assertJson($json);
        $this->assertSame('{"name":"Aref","age":25}', $json);
    }

    /**
     * @test
     */
    public function encodePreservesUnicodeCharacters(): void
    {
        $data = ["message" => "سلام دنیا"];

        $json = Json::encode($data);

        $this->assertStringContainsString("سلام دنیا", $json);
        $this->assertStringNotContainsString("\\u", $json); // JSON_UNESCAPED_UNICODE
    }

    /**
     * @test
     */
    public function encodeThrowsExceptionOnEmptyArray(): void
    {
        $this->expectException(JsonException::class);
        $this->expectExceptionMessage("body can not be empty array!");

        Json::encode([]);
    }

    /**
     * @test
     */
    public function decodeConvertsJsonStringToObjectByDefault(): void
    {
        $json = '{"name":"Aref","age":25}';

        $result = Json::decode($json);

        $this->assertIsObject($result);
        $this->assertSame("Aref", $result->name);
        $this->assertSame(25, $result->age);
    }

    /**
     * @test
     */
    public function decodeConvertsJsonStringToArrayWhenAssociativeTrue(): void
    {
        $json = '{"name":"Aref","age":25}';

        $result = Json::decode($json, true);

        $this->assertIsArray($result);
        $this->assertSame("Aref", $result["name"]);
        $this->assertSame(25, $result["age"]);
    }

    /**
     * @test
     */
    public function decodeThrowsExceptionOnEmptyString(): void
    {
        $this->expectException(JsonException::class);
        $this->expectExceptionMessage("body can not be empty string!");

        Json::decode("");
    }

    /**
     * @test
     */
    public function encodeAndDecodeAreReversible(): void
    {
        $original = [
            "user" => [
                "name" => "Aref Shojaei",
                "skills" => ["PHP", "Laravel", "Testing"],
                "active" => true,
            ],
        ];

        $encoded = Json::encode($original);
        $decoded = Json::decode($encoded, true);

        $this->assertSame($original, $decoded);
    }

    /**
     * @test
     */
    public function decodeNestedJson(): void
    {
        $json = '{"data":{"items":[1,2,3],"meta":{"total":3}}}';

        $result = Json::decode($json);

        $this->assertIsObject($result);
        $this->assertIsObject($result->data);
        $this->assertIsArray($result->data->items);
        $this->assertSame(3, $result->data->meta->total);
    }

    /**
     * @test
     */
    public function encodeWithSpecialCharacters(): void
    {
        $data = [
            "quote" => 'He said "Hello"',
            "path" => "C:\\Users\\Aref",
        ];

        $json = Json::encode($data);

        $this->assertJson($json);
        $decoded = Json::decode($json, true);
        $this->assertSame($data["quote"], $decoded["quote"]);
        $this->assertSame($data["path"], $decoded["path"]);
    }
}
