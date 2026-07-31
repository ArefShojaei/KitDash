<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Kit\Structure\Graph\{Graph, Node};
use Kit\Structure\Interfaces\{Graph as IGraph, GraphNode as IGraphNode};

final class GraphTest extends TestCase
{
    /**
     * @test
     */
    public function createInstance(): void
    {
        $instance = new Graph();

        $this->assertIsObject($instance);
        $this->assertInstanceOf(Graph::class, $instance);
        $this->assertInstanceOf(IGraph::class, $instance);
    }

    /**
     * @test
     */
    public function isImplementedGraphInterface(): void
    {
        $interfaces = class_implements(Graph::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IGraph::class, $interfaces);
    }

    /**
     * @test
     */
    public function newGraphShouldBeEmpty(): void
    {
        $graph = new Graph();
        $state = $graph->toArray();

        $this->assertSame([], $state["nodes"]);
        $this->assertSame([], $state["edges"]);
    }

    /**
     * @test
     */
    public function addNode(): void
    {
        $graph = new Graph();

        $node1 = $graph->addNode("User#1");
        $node2 = $graph->addNode("User#2");

        $this->assertInstanceOf(Node::class, $node1);
        $this->assertInstanceOf(Node::class, $node2);
        $this->assertSame("User#1", $node1->value);
        $this->assertSame("User#2", $node2->value);

        $state = $graph->toArray();
        $this->assertCount(2, $state["nodes"]);
    }

    /**
     * @test
     */
    public function addNodeTrimsValue(): void
    {
        $graph = new Graph();

        $node = $graph->addNode("  User#3  ");

        $this->assertSame("User#3", $node->value);
    }

    /**
     * @test
     */
    public function getNodeIfExists(): void
    {
        $graph = new Graph();

        $graph->addNode("User#1");
        $graph->addNode("User#2");

        $node1 = $graph->getNode("User#1");
        $node2 = $graph->getNode("User#2");

        $this->assertInstanceOf(Node::class, $node1);
        $this->assertInstanceOf(Node::class, $node2);
        $this->assertSame("User#1", $node1->value);
        $this->assertSame("User#2", $node2->value);
    }

    /**
     * @test
     */
    public function getNodeIfNotExists(): void
    {
        $graph = new Graph();

        $graph->addNode("User#1");

        $this->assertNull($graph->getNode("User#99"));
        $this->assertNull($graph->getNode("Unknown"));
    }

    /**
     * @test
     */
    public function addEdgeCreatesBidirectionalConnection(): void
    {
        $graph = new Graph();

        $node1 = $graph->addNode("A");
        $node2 = $graph->addNode("B");

        $graph->addEdge($node1, $node2);

        $edges = $graph->toArray()["edges"];

        $this->assertArrayHasKey("A", $edges);
        $this->assertArrayHasKey("B", $edges);
        $this->assertCount(1, $edges["A"]);
        $this->assertCount(1, $edges["B"]);
        $this->assertSame($node2, $edges["A"][0]);
        $this->assertSame($node1, $edges["B"][0]);
    }

    /**
     * @test
     */
    public function canAddMultipleEdges(): void
    {
        $graph = new Graph();

        $a = $graph->addNode("A");
        $b = $graph->addNode("B");
        $c = $graph->addNode("C");

        $graph->addEdge($a, $b);
        $graph->addEdge($a, $c);

        $edges = $graph->toArray()["edges"];

        $this->assertCount(2, $edges["A"]);
        $this->assertCount(1, $edges["B"]);
        $this->assertCount(1, $edges["C"]);
    }

    /**
     * @test
     */
    public function toArrayReturnsCorrectStructure(): void
    {
        $graph = new Graph();

        $node = $graph->addNode("Root");
        $graph->addEdge($node, $graph->addNode("Child"));

        $state = $graph->toArray();

        $this->assertArrayHasKey("nodes", $state);
        $this->assertArrayHasKey("edges", $state);
        $this->assertCount(2, $state["nodes"]);
        $this->assertNotEmpty($state["edges"]);
    }

    /**
     * @test
     */
    public function nodeImplementsGraphNodeInterface(): void
    {
        $node = new Node("test");

        $this->assertInstanceOf(IGraphNode::class, $node);
    }

    /**
     * @test
     */
    public function nodeCanStoreMetaData(): void
    {
        $node = new Node("User#1");

        $node->addMeta(["role" => "admin"]);
        $node->addMeta("active");

        $meta = $node->getMeta();

        $this->assertCount(2, $meta);
        $this->assertSame(["role" => "admin"], $meta[0]);
        $this->assertSame("active", $meta[1]);
    }

    /**
     * @test
     */
    public function nodeMetaStartsEmpty(): void
    {
        $node = new Node("User#1");

        $this->assertSame([], $node->getMeta());
    }
}
