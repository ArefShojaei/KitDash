<?php

namespace Kit\Structure\Interfaces;

interface GraphNode
{
    public function addMeta(mixed $value): void;

    public function getMeta(): array;
}
