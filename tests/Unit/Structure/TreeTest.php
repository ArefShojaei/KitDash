<?php

namespace Tests\Unit\Structure;

use PHPUnit\Framework\TestCase;

use Kit\Structure\Tree\{Tree, Node};
use Kit\Structure\Interfaces\Tree as ITree;

final class TreeTest extends TestCase
{
    /**
     * @test
     */
    public function createInstance(): void
    {
        $instance = new Tree("root");

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Tree::class, $instance);
        $this->assertInstanceOf(ITree::class, $instance);
    }

    /**
     * @test
     */
    public function isImplementedTreeInterface(): void
    {
        $interfaces = class_implements(Tree::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(ITree::class, $interfaces);
    }

    /**
     * @test
     */
    public function constructorSetsRootValue(): void
    {
        $tree = new Tree("root");

        $state = $tree->toArray();

        $this->assertInstanceOf(Node::class, $state["value"]);
        $this->assertSame("root", $state["value"]->value);
        $this->assertSame([], $state["children"]);
    }

    /**
     * @test
     */
    public function addChild(): void
    {
        $tree = new Tree("root");

        $tree->add("child-1");
        $tree->add("child-2");

        $children = $tree->toArray()["children"];

        $this->assertCount(2, $children);
        $this->assertInstanceOf(Node::class, $children[0]);
        $this->assertInstanceOf(Node::class, $children[1]);
        $this->assertSame("child-1", $children[0]->value);
        $this->assertSame("child-2", $children[1]->value);
    }

    /**
     * @test
     */
    public function toArrayReturnsCorrectStructure(): void
    {
        $tree = new Tree("root");
        $tree->add("child");

        $state = $tree->toArray();

        $this->assertIsArray($state);
        $this->assertArrayHasKey("value", $state);
        $this->assertArrayHasKey("children", $state);
        $this->assertInstanceOf(Node::class, $state["value"]);
        $this->assertIsArray($state["children"]);
        $this->assertCount(1, $state["children"]);
    }

    /**
     * @test
     */
    public function canAddDifferentTypesAsChildren(): void
    {
        $tree = new Tree("root");

        $tree->add(123);
        $tree->add(["nested" => true]);
        $tree->add(null);
        $tree->add(true);

        $children = $tree->toArray()["children"];

        $this->assertCount(4, $children);
        $this->assertSame(123, $children[0]->value);
        $this->assertSame(["nested" => true], $children[1]->value);
        $this->assertNull($children[2]->value);
        $this->assertTrue($children[3]->value);
    }

    /**
     * @test
     */
    public function nodeStoresValueCorrectly(): void
    {
        $node = new Node("test-value");

        $this->assertSame("test-value", $node->value);

        $node->value = "updated";
        $this->assertSame("updated", $node->value);
    }

    /**
     * @test
     */
    public function multipleTreesAreIndependent(): void
    {
        $tree1 = new Tree("A");
        $tree2 = new Tree("B");

        $tree1->add("child-A");
        $tree2->add("child-B");

        $this->assertCount(1, $tree1->toArray()["children"]);
        $this->assertCount(1, $tree2->toArray()["children"]);
        $this->assertSame("child-A", $tree1->toArray()["children"][0]->value);
        $this->assertSame("child-B", $tree2->toArray()["children"][0]->value);
    }
}
