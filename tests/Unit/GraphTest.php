<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Kit\Container\Graph;
use Kit\Contracts\Interfaces\Graph as IGraph;
use Kit\Entity\Graph as Node;


final class GraphTest extends TestCase {
    /**
     * @test
     */
    public function createInstance(): IGraph {
        $instance = new Graph;
        
        $this->assertIsObject($instance);
        $this->assertInstanceOf(IGraph::class, $instance);

        return $instance;
    }

    /**
     * @test
     * @depends createInstance
     */
    public function isImplementedQueueInterface(IGraph $graph): void {
        $interfaces = class_implements($graph::class);

        $this->assertArrayHasKey(IGraph::class, $interfaces);
    }

    /**
     * @test
     * @depends createInstance
     */
    public function addNode(IGraph $graph): IGraph {
        $values = ["User#1", "User#2"];
        
        $node1 = $graph->addNode(current($values));
        $node2 = $graph->addNode(end($values));

        $store = $graph->toArray();

        # First Node
        $this->assertIsObject($node1);
        $this->assertInstanceOf(Node::class, $node1);
        $this->assertIsString($node1->value);
        $this->assertNotNull($node1->value);

        # Second Node
        $this->assertIsObject($node2);
        $this->assertInstanceOf(Node::class, $node2);
        $this->assertIsString($node2->value);
        $this->assertNotNull($node2->value);

        # Graph
        $this->assertArrayHasKey(key:"nodes", array:$store);
        $this->assertIsArray($store["nodes"]);
        $this->assertIsIterable($store["nodes"]);
        $this->assertCount(expectedCount:2, haystack:$store["nodes"]);
        $this->assertSame($node1, current($store["nodes"]));
        $this->assertSame($node2, end($store["nodes"]));
        $this->assertInstanceOf($node1::class, current($store["nodes"]));
        $this->assertInstanceOf($node2::class, end($store["nodes"]));


        return $graph;
    }

    /**
     * @test
     * @depends addNode
     */
    public function getNodeIfExists(IGraph $graph): void {
        $existsValues = ["User#1", "User#2"];

        $node1 = $graph->getNode(current($existsValues));
        $node2 = $graph->getNode(end($existsValues));

        # First Node
        $this->assertNotNull($node1);
        $this->assertIsObject($node1);
        $this->assertInstanceOf(Node::class, $node1);
        $this->assertIsString($node1->value);
        
        # Second Node
        $this->assertNotNull($node2);
        $this->assertIsObject($node2);
        $this->assertInstanceOf(Node::class, $node2);
        $this->assertIsString($node2->value);
    }

    /**
     * @test
     * @depends addNode
     */
    public function getNodeIfNotExists(IGraph $graph): void {
        $notExistsValues = ["User#3", "User#4"];

        $node1 = $graph->getNode(current($notExistsValues));
        $node2 = $graph->getNode(end($notExistsValues));

        $this->assertNull($node1);
        $this->assertNull($node2);
    }

    /**
     * @test
     * @depends addNode
     */
    public function addEdge(IGraph $graph): void {
        $existsValues = ["User#1", "User#2"];

        $node1 = $graph->getNode(current($existsValues));
        $node2 = $graph->getNode(end($existsValues));

        $graph->addEdge($node1, $node2);

        $store = $graph->toArray();

        $this->assertArrayHasKey(key:"edges", array:$store);
        $this->assertIsArray($store["edges"]);
        $this->assertIsIterable($store["edges"]);
        $this->assertCount(expectedCount:2, haystack:$store["edges"]);
        $this->assertInstanceOf(Node::class, current($store["edges"][$node1->value]));
        $this->assertInstanceOf(Node::class, end($store["edges"][$node1->value]));
        $this->assertEquals($node2->value, current($store["edges"][$node1->value])->value);
        $this->assertEquals($node1->value, end($store["edges"][$node2->value])->value);
    }

    /**
     * @test
     * @depends addNode
     */
    public function getStateToAnArray(IGraph $graph): void {
        $store = $graph->toArray();

        $this->assertIsArray($store);
        $this->assertIsIterable($store);
        $this->assertCount(expectedCount:2, haystack:$store);
    }
}