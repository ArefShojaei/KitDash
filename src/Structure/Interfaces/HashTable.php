<?php

namespace Kit\Structure\Interfaces;

use Kit\Support\Interfaces\Array\Arrayable;

interface HashTable extends Validatable, Arrayable
{
    public function set(string $key, mixed $value): void;

    public function get(string $key): mixed;

    public function has(string $key): bool;
}
