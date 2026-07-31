<?php

namespace Kit\Structure\Graph;

use Kit\Structure\Interfaces\GraphNode as IGraphNode;

final class Node implements IGraphNode
{
    private array $meta = [];

    public function __construct(public string $value) {}

    public function addMeta(mixed $value): void
    {
        $this->meta[] = $value;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }
}
