<?php

namespace Tests\Unit;

use Kit\Container\Stack;
use Kit\Contracts\Interfaces\Stack as IStack;
use PHPUnit\Framework\TestCase;


final class StackTest extends TestCase {
    /**
     * @test
     */
    public function createInstance(): IStack {
        $instance = new Stack;
        
        $this->assertIsObject($instance);
        $this->assertInstanceOf(IStack::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createInstance
     */
    public function isImplementedBinaryInterface(IStack $stack): void {
        $interfaces = class_implements($stack::class);

        $this->assertArrayHasKey(IStack::class, $interfaces);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function pushState(IStack $stack): void {
        $value = "Hello";
        
        $stack->push($value);

        $store = $stack->toArray();

        $this->assertIsArray($store);
        $this->assertIsString($value);
        $this->assertContains($value, $store);
        $this->assertCount(expectedCount:1, haystack:$store);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function popState(IStack $stack): void {
        $expectedValue = "Hello";
        
        $deletedValue = $stack->pop();
        $store = $stack->toArray();

        $this->assertIsArray($store);
        $this->assertCount(expectedCount:0, haystack:$store);
        $this->assertIsString($deletedValue);
        $this->assertNotContains($deletedValue, $store);
        $this->assertEquals($expectedValue, $deletedValue);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function getStateToAnArray(IStack $stack): void {
        $store = $stack->toArray();

        $this->assertIsArray($store);
        $this->assertIsIterable($store);
        $this->assertCount(expectedCount:0, haystack:$store);
    }
}