<?php

namespace Tests\Unit\Structure;

use PHPUnit\Framework\TestCase;

use Kit\Structure\HashTable;
use Kit\Structure\Interfaces\HashTable as IHashTable;

final class HashTableTest extends TestCase
{
    /**
     * @test
     */
    public function createInstance(): void
    {
        $instance = new HashTable();

        $this->assertIsObject($instance);
        $this->assertInstanceOf(HashTable::class, $instance);
        $this->assertInstanceOf(IHashTable::class, $instance);
    }

    /**
     * @test
     */
    public function isImplementedHashTableInterface(): void
    {
        $interfaces = class_implements(HashTable::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IHashTable::class, $interfaces);
    }

    /**
     * @test
     */
    public function newHashTableShouldBeEmpty(): void
    {
        $table = new HashTable();

        $this->assertTrue($table->isEmpty());
        $this->assertSame([], $table->toArray());
    }

    /**
     * @test
     */
    public function setAndGetValue(): void
    {
        $table = new HashTable();

        $table->set("name", "Aref");
        $table->set("age", 25);

        $this->assertSame("Aref", $table->get("name"));
        $this->assertSame(25, $table->get("age"));
        $this->assertFalse($table->isEmpty());
    }

    /**
     * @test
     */
    public function getNonExistentKeyReturnsNull(): void
    {
        $table = new HashTable();

        $table->set("name", "Aref");

        $this->assertNull($table->get("email"));
    }

    /**
     * @test
     */
    public function hasReturnsTrueForExistingKey(): void
    {
        $table = new HashTable();

        $table->set("name", "Aref");

        $this->assertTrue($table->has("name"));
        $this->assertFalse($table->has("age"));
    }

    /**
     * @test
     */
    public function hasOnEmptyTableReturnsFalse(): void
    {
        $table = new HashTable();

        $this->assertFalse($table->has("any-key"));
    }

    /**
     * @test
     */
    public function setOverwritesExistingKey(): void
    {
        $table = new HashTable();

        $table->set("name", "Aref");
        $table->set("name", "Ali");

        $this->assertSame("Ali", $table->get("name"));
    }

    /**
     * @test
     */
    public function canStoreDifferentTypes(): void
    {
        $table = new HashTable();

        $table->set("int", 100);
        $table->set("string", "hello");
        $table->set("array", [1, 2, 3]);
        $table->set("bool", true);
        $table->set("null", null);

        $this->assertSame(100, $table->get("int"));
        $this->assertSame("hello", $table->get("string"));
        $this->assertSame([1, 2, 3], $table->get("array"));
        $this->assertTrue($table->get("bool"));
        $this->assertNull($table->get("null"));
        $this->assertTrue($table->has("null")); // کلید وجود دارد حتی اگر مقدار null باشد
    }

    /**
     * @test
     */
    public function toArrayReturnsInternalStructure(): void
    {
        $table = new HashTable();

        $table->set("name", "Aref");
        $table->set("city", "Tehran");

        $result = $table->toArray();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @test
     */
    public function keysWithSameHashStillWorkCorrectly(): void
    {
        $table = new HashTable();

        // چون hash = strlen % 10، کلیدهای هم‌طول ممکن است در یک bucket قرار بگیرند
        $table->set("abc", 1); // length 3
        $table->set("xyz", 2); // length 3

        $this->assertSame(1, $table->get("abc"));
        $this->assertSame(2, $table->get("xyz"));
        $this->assertTrue($table->has("abc"));
        $this->assertTrue($table->has("xyz"));
    }
}
