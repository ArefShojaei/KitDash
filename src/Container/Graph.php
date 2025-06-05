<?php

namespace Kit\Container;

use Kit\Contracts\Interfaces\Graph as IGraph;
use Kit\Entity\Graph as Node;


final class Graph implements IGraph {
    private array $nodes = [];

    private array $edges = [];


    public function addNode(string $value): Node {
        $node = new Node(trim($value));

        $this->nodes[] = $node;

        return $node;
    }

    public function addEdge(Node $start, Node $end): void {
        $this->edges[$start->value][] = $end;
        $this->edges[$end->value][] = $start;
    }

    public function getNode(string $value): ?Node {
        foreach ($this->nodes as $node) {
            if ($node->value === $value) return $node;
        }

        return null;
    }

    public function toArray(): array {
        return [
            "nodes" => $this->nodes,
            "edges" => $this->edges
        ];
    }
}