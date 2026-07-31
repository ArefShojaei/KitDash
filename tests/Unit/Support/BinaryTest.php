<?php

namespace Tests\Unit\Support;

use Kit\Support\Binary;
use Kit\Support\Interfaces\Bin as IBinary;
use PHPUnit\Framework\TestCase;

final class BinaryTest extends TestCase
{
    private string $key = "puFVRoo2iOj0UT";
    private string $input = "Hello";

    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void
    {
        try {
            new Binary();
        } catch (\Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedBinaryInterface(): void
    {
        $interfaces = class_implements(Binary::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IBinary::class, $interfaces);
    }

    /**
     * @test
     */
    public function createBinaryInstance(): IBinary
    {
        $instance = Binary::create($this->key);

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Binary::class, $instance);
        $this->assertInstanceOf(IBinary::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createBinaryInstance
     */
    public function encodeInput(IBinary $binary): string
    {
        $encoded = $binary->encode($this->input);

        $this->assertIsString($encoded);
        $this->assertNotEmpty($encoded);
        $this->assertMatchesRegularExpression('/^[01]+$/', $encoded);
        $this->assertSame(0, strlen($encoded) % 8);

        return $encoded;
    }

    /**
     * @test
     * @depends createBinaryInstance
     * @depends encodeInput
     */
    public function decodeBinaryInput(IBinary $binary, string $encoded): void
    {
        $decoded = $binary->decode($encoded);

        $this->assertIsString($decoded);
        $this->assertSame($this->input, $decoded);
    }

    /**
     * @test
     */
    public function encodeAndDecodeShouldBeReversible(): void
    {
        $binary = Binary::create($this->key);

        $original = "KitDash is awesome!";
        $encoded = $binary->encode($original);
        $decoded = $binary->decode($encoded);

        $this->assertSame($original, $decoded);
    }

    /**
     * @test
     */
    public function differentKeysProduceDifferentEncodedValues(): void
    {
        $factory1 = Binary::create("key-one");
        $factory2 = Binary::create("key-two");

        $binary1 = $factory1->encode("Hello");
        $binary2 = $factory2->encode("Hello");

        $this->assertNotSame($binary1, $binary2);
    }

    /**
     * @test
     */
    public function decodeWithWrongKeyShouldNotReturnOriginal(): void
    {
        $factory1 = Binary::create("correct-key");
        $factory2 = Binary::create("wrong-key");

        $encoded = $factory1->encode("Secret");
        $decoded = $factory2->decode($encoded);

        $this->assertNotSame("Secret", $decoded);
    }

    /**
     * @test
     */
    public function encodeEmptyString(): void
    {
        $binary = Binary::create($this->key);

        $encoded = $binary->encode("");
        $decoded = $binary->decode($encoded);

        $this->assertSame("", $encoded);
        $this->assertSame("", $decoded);
    }

    /**
     * @test
     */
    public function encodeAndDecodeWithSpecialCharacters(): void
    {
        $binary = Binary::create($this->key);

        $original = "Hello @KitDash #2026!";
        $encoded = $binary->encode($original);
        $decoded = $binary->decode($encoded);

        $this->assertSame($original, $decoded);
    }

    /**
     * @test
     */
    public function sameKeyAlwaysProducesSameEncodedValue(): void
    {
        $binary1 = Binary::create($this->key);
        $binary2 = Binary::create($this->key);

        $encoded1 = $binary1->encode("Hello");
        $encoded2 = $binary2->encode("Hello");

        $this->assertSame($encoded1, $encoded2);
    }

    /**
     * @test
     */
    public function encodeMultipleTimesIsConsistent(): void
    {
        $binary = Binary::create($this->key);

        $first = $binary->encode("Test");
        $second = $binary->encode("Test");

        $this->assertSame($first, $second);
    }
}
