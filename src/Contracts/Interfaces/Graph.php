<?php

namespace Kit\Contracts\Interfaces;

use Kit\Entity\Graph as Node;


interface Graph extends Describer {
    public function addNode(string $value): Node;
    public function addEdge(Node $start, Node $end): void;
    public function getNode(string $value): ?Node;
}