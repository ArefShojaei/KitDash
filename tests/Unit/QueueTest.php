<?php

namespace Tests\Unit;

use Kit\Container\Queue;
use Kit\Contracts\Interfaces\Queue as IQueue;
use PHPUnit\Framework\TestCase;


final class QueueTest extends TestCase {
    /**
     * @test
     */
    public function createInstance(): IQueue {
        $instance = new Queue;
        
        $this->assertIsObject($instance);
        $this->assertInstanceOf(IQueue::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createInstance
     */
    public function isImplementedQueueInterface(IQueue $queue): void {
        $interfaces = class_implements($queue::class);

        $this->assertArrayHasKey(IQueue::class, $interfaces);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function enqueueState(IQueue $queue): IQueue {
        $value = "Hello";
        
        $queue->enqueue($value);

        $store = $queue->toArray();

        $this->assertIsArray($store);
        $this->assertIsString($value);
        $this->assertContains($value, $store);
        $this->assertCount(expectedCount:1, haystack:$store);

        return $queue;
    }

    /**
     * @test
     * @depends enqueueState
     */
    public function dequeueState(IQueue $queue): IQueue {
        $expectedValue = "Hello";
        
        $deletedValue = $queue->dequeue();
        $store = $queue->toArray();

        $this->assertIsArray($store);
        $this->assertCount(expectedCount:0, haystack:$store);
        $this->assertIsString($deletedValue);
        $this->assertNotContains($deletedValue, $store);
        $this->assertEquals($expectedValue, $deletedValue);

        return $queue;
    }

    /**
     * @test
     * @depends dequeueState
     */
    public function getStateToAnArray(IQueue $queue): void {
        $store = $queue->toArray();

        $this->assertIsArray($store);
        $this->assertIsIterable($store);
        $this->assertCount(expectedCount:0, haystack:$store);
    }
}