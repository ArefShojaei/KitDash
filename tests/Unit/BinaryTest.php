<?php

namespace Tests\Unit;

use Kit\Contracts\Interfaces\Binary as IBinary;
use Kit\Utils\Binary;
use PHPUnit\Framework\TestCase;


final class BinaryTest extends TestCase {
    private ?string $key;
    
    private ?string $input;


    protected function setUP(): void {
        $this->key = "puFVRoo2iOj0UT";

        $this->input = "Hello";
    }

    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void {
        try {
            new Binary;
        } catch (\Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test 
     */
    public function createBinaryInstance(): IBinary {
        $instance = Binary::create($this->key);

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Binary::class, $instance);

        return $instance;
    }

    /**
     * @test
     */
    public function isImplementedBinaryInterface(): void {
        $interfaces = class_implements(Binary::class);

        $this->assertArrayHasKey(IBinary::class, $interfaces);
    }

    /**
     * @test
     * @depends createBinaryInstance
     */
    public function encodeInput(IBinary $binary): string {
        $value = $binary->encode($this->input);

        $this->assertIsString($value);
        $this->assertIsNumeric($value);

        return $value;
    }

    /**
     * @test
     * @depends createBinaryInstance
     * @depends encodeInput
     */
    public function decodeBinaryInput(IBinary $binary, string $binaryValue): void {
        $value = $binary->decode($binaryValue);

        $this->assertIsString($value);
        $this->assertIsNotNumeric($value);
    }
}