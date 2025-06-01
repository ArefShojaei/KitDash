<?php

namespace Tests\Unit;

use Kit\Container\HashTable;
use Kit\Contracts\Interfaces\HashTable as IHashTable;
use PHPUnit\Framework\TestCase;


final class HashTableTest extends TestCase {
    /**
     * @test
     */
    public function createInstance(): IHashTable {
        $instance = new HashTable;
        
        $this->assertIsObject($instance);
        $this->assertInstanceOf(IHashTable::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createInstance
     */
    public function isImplementedQueueInterface(IHashTable $table): void {
        $interfaces = class_implements($table::class);

        $this->assertArrayHasKey(IHashTable::class, $interfaces);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function setState(IHashTable $table): void {
        $key = "name";
        $value = "Aref";

        $table->set($key, $value);

        $store = $table->toArray();

        $this->assertIsArray($store);
        $this->assertCount(expectedCount:1, haystack:$store);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function getState(IHashTable $table): void {
        $key = "name";
        $expectedValue = "Aref";

        $value = $table->get($key);

        $this->assertIsString($value);
        $this->assertEquals($expectedValue, $value);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function validateToExistValueByKey(IHashTable $table): void {
        $key = "name";

        $isKeyExists = $table->has($key);

        $this->assertIsBool($isKeyExists);
        $this->assertTrue($isKeyExists);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function validateToNotExistValueByKey(IHashTable $table): void {
        $key = "age";

        $isKeyExists = $table->has($key);

        $this->assertIsBool($isKeyExists);
        $this->assertFalse($isKeyExists);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function getStateToAnArray(IHashTable $table): void {
        $store = $table->toArray();

        $this->assertIsArray($store);
        $this->assertIsIterable($store);
        $this->assertCount(expectedCount:1, haystack:$store);
    }
}