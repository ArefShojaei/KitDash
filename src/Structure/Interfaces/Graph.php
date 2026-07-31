<?php

namespace Kit\Structure\Interfaces;

use Kit\Structure\Graph\Node;
use Kit\Support\Interfaces\Array\Arrayable;

interface Graph extends Arrayable
{
    public function addNode(string $value): Node;

    public function addEdge(Node $start, Node $end): void;

    public function getNode(string $value): ?Node;
}
