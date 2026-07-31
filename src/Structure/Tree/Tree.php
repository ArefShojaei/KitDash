<?php

namespace Kit\Structure\Tree;

use Kit\Structure\Tree\Node;
use Kit\Structure\Interfaces\Tree as ITree;

final class Tree implements ITree
{
    private Node $value;

    private array $children = [];

    public function __construct(mixed $value)
    {
        $this->value = new Node($value);
    }

    public function add(mixed $child): void
    {
        $this->children[] = new Node($child);
    }

    public function toArray(): array
    {
        return [
            "value" => $this->value,
            "children" => $this->children,
        ];
    }
}
