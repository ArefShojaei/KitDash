<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Kit\Structure\Queue;
use Kit\Structure\Interfaces\Queue as IQueue;

final class QueueTest extends TestCase
{
    /**
     * @test
     */
    public function createInstance(): void
    {
        $instance = new Queue();

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Queue::class, $instance);
        $this->assertInstanceOf(IQueue::class, $instance);
    }

    /**
     * @test
     */
    public function isImplementedQueueInterface(): void
    {
        $interfaces = class_implements(Queue::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IQueue::class, $interfaces);
    }

    /**
     * @test
     */
    public function newQueueShouldBeEmpty(): void
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());
        $this->assertSame([], $queue->toArray());
    }

    /**
     * @test
     */
    public function enqueueAddsValueToQueue(): void
    {
        $queue = new Queue();

        $queue->enqueue("Hello");
        $queue->enqueue("World");

        $this->assertFalse($queue->isEmpty());
        $this->assertCount(2, $queue->toArray());
        $this->assertSame(["Hello", "World"], $queue->toArray());
    }

    /**
     * @test
     */
    public function dequeueRemovesAndReturnsFirstValue(): void
    {
        $queue = new Queue();

        $queue->enqueue("A");
        $queue->enqueue("B");
        $queue->enqueue("C");

        $this->assertSame("A", $queue->dequeue());
        $this->assertSame("B", $queue->dequeue());
        $this->assertSame(["C"], $queue->toArray());
    }

    /**
     * @test
     */
    public function dequeueOnEmptyQueueReturnsEmptyArray(): void
    {
        $queue = new Queue();

        $this->assertIsArray($queue->dequeue());
        $this->assertTrue($queue->isEmpty());
    }

    /**
     * @test
     */
    public function enqueueAndDequeueShouldFollowFIFO(): void
    {
        $queue = new Queue();

        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertSame(1, $queue->dequeue());
        $this->assertSame(2, $queue->dequeue());
        $this->assertSame(3, $queue->dequeue());
        $this->assertTrue($queue->isEmpty());
    }

    /**
     * @test
     */
    public function toArrayReturnsCurrentState(): void
    {
        $queue = new Queue();

        $queue->enqueue("first");
        $queue->enqueue("second");

        $this->assertSame(["first", "second"], $queue->toArray());

        $queue->dequeue();

        $this->assertSame(["second"], $queue->toArray());
    }

    /**
     * @test
     */
    public function canEnqueueDifferentTypes(): void
    {
        $queue = new Queue();

        $queue->enqueue(123);
        $queue->enqueue("string");
        $queue->enqueue(["a", "b"]);
        $queue->enqueue(true);
        $queue->enqueue(null);

        $this->assertCount(5, $queue->toArray());
        $this->assertSame(123, $queue->dequeue());
        $this->assertSame("string", $queue->dequeue());
        $this->assertSame(["a", "b"], $queue->dequeue());
        $this->assertTrue($queue->dequeue());
        $this->assertNull($queue->dequeue());
    }
}
