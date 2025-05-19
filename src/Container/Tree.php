<?php

namespace Kit\Container;

use Kit\Contracts\Interfaces\Tree as ITree;


final class Tree implements ITree {
    private mixed $value;
    
    private array $children = [];


    public function __construct(mixed $value) {
        $this->value = $value;
    }

    public function add(mixed $child): void {
        $this->children[] = $child;
    }

    public function toArray(): array {
        return [
            "value" => $this->value,
            "children" => $this->children
        ];
    }
}