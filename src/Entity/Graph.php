<?php

namespace Kit\Entity;

use Kit\Contracts\Interfaces\GraphEntity as IGraphEntity;


final class Graph implements IGraphEntity {
    private array $meta = [];


    public function __construct(public mixed $value) {}

    public function addMeta(mixed $value): void {
        $this->meta[] = $value;
    }

    public function getMeta(): array {
        return $this->meta;
    }
}