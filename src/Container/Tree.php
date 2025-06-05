<?php

namespace Kit\Container;

use Kit\Contracts\Interfaces\Tree as ITree;
use Kit\Entity\Tree as Node;


final class Tree implements ITree {
    private Node $value;
    
    private array $children = [];


    public function __construct(mixed $value) {
        $this->value = new Node($value);
    }

    public function add(mixed $child): void {
        $this->children[] = new Node($child);
    }

    public function toArray(): array {
        return [
            "value" => $this->value,
            "children" => $this->children
        ];
    }
}