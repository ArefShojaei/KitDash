<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Kit\Container\Tree;
use Kit\Contracts\Interfaces\Tree as ITree;
use Kit\Entity\Tree as Node;


final class TreeTest extends TestCase {
    /**
     * @test
     */
    public function createInstance(): ITree {
        $instance = new Tree("root");
        
        $this->assertIsObject($instance);
        $this->assertInstanceOf(ITree::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createInstance
     */
    public function isImplementedQueueInterface(ITree $tree): void {
        $interfaces = class_implements($tree::class);

        $this->assertArrayHasKey(ITree::class, $interfaces);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function addChild(ITree $tree): void {
        $value = "child";
        
        $tree->add($value);

        $children = $tree->toArray()["children"];

        $this->assertIsArray($children);
        $this->assertCount(expectedCount:1, haystack:$children);
        $this->assertEquals($value, current($children)->value);
        $this->assertInstanceOf(Node::class, current($children));
        $this->assertIsString(current($children)->value);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function getStateToAnArray(ITree $tree): void {
        $keys = ["value", "children"];
        
        $store = $tree->toArray();

        $this->assertIsArray($store);
        $this->assertIsIterable($store);
        $this->assertCount(expectedCount:2, haystack:$store);
        $this->assertArrayHasKey(current($keys), $store);
        $this->assertArrayHasKey(end($keys), $store);
        $this->assertIsArray($store[end($keys)]);
        $this->assertIsIterable($store[end($keys)]);
    }
}