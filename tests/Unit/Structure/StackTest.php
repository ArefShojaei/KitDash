<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Kit\Structure\Stack;
use Kit\Structure\Interfaces\Stack as IStack;

final class StackTest extends TestCase
{
    /**
     * @test
     */
    public function createInstance(): void
    {
        $instance = new Stack();

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Stack::class, $instance);
        $this->assertInstanceOf(IStack::class, $instance);
    }

    /**
     * @test
     */
    public function isImplementedStackInterface(): void
    {
        $interfaces = class_implements(Stack::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IStack::class, $interfaces);
    }

    /**
     * @test
     */
    public function newStackShouldBeEmpty(): void
    {
        $stack = new Stack();

        $this->assertTrue($stack->isEmpty());
        $this->assertSame([], $stack->toArray());
        $this->assertCount(0, $stack->toArray());
    }

    /**
     * @test
     */
    public function pushAddsValueToStack(): void
    {
        $stack = new Stack();

        $stack->push("Hello");
        $stack->push("World");

        $this->assertFalse($stack->isEmpty());
        $this->assertCount(2, $stack->toArray());
        $this->assertSame(["Hello", "World"], $stack->toArray());
    }

    /**
     * @test
     */
    public function popRemovesAndReturnsLastValue(): void
    {
        $stack = new Stack();

        $stack->push("A");
        $stack->push("B");
        $stack->push("C");

        $this->assertSame("C", $stack->pop());
        $this->assertSame("B", $stack->pop());
        $this->assertSame(["A"], $stack->toArray());
    }

    /**
     * @test
     */
    public function popOnEmptyStackReturnsEmptyArray(): void
    {
        $stack = new Stack();

        $this->assertIsArray($stack->pop());
        $this->assertCount(0, $stack->pop());
        $this->assertTrue($stack->isEmpty());
    }

    /**
     * @test
     */
    public function pushAndPopShouldFollowLIFO(): void
    {
        $stack = new Stack();

        $stack->push(1);
        $stack->push(2);
        $stack->push(3);

        $this->assertSame(3, $stack->pop());
        $this->assertSame(2, $stack->pop());
        $this->assertSame(1, $stack->pop());
        $this->assertTrue($stack->isEmpty());
    }

    /**
     * @test
     */
    public function toArrayReturnsCurrentState(): void
    {
        $stack = new Stack();

        $stack->push("first");
        $stack->push("second");

        $this->assertSame(["first", "second"], $stack->toArray());

        $stack->pop();

        $this->assertSame(["first"], $stack->toArray());
    }

    /**
     * @test
     */
    public function canPushDifferentTypes(): void
    {
        $stack = new Stack();

        $stack->push(123);
        $stack->push("string");
        $stack->push(["a", "b"]);
        $stack->push(true);
        $stack->push(null);

        $this->assertCount(5, $stack->toArray());
        $this->assertNull($stack->pop());
        $this->assertTrue($stack->pop());
        $this->assertSame(["a", "b"], $stack->pop());
    }
}
