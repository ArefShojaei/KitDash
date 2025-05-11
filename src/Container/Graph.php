<?php

namespace Kit\Container;

use Kit\Contracts\Interfaces\Graph as IGraph;


final class Graph implements IGraph {
    private array $nodes = [];

    private array $edges = [];


    public function addNode($node): void {
        $this->nodes[] = $node;
    }

    public function addEdge($start, $end): void {
        $this->edges[$start][] = $end;
        $this->edges[$end][] = $start;
    }

    public function getNode($node): mixed {
        return $this->edges[$node] ?? null;
    }

    public function toArray(): array {
        return [
            "nodes" => $this->nodes,
            "edges" => $this->edges
        ];
    }
}