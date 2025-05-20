<?php

namespace Kit\Contracts\Interfaces;


interface HashTable extends Describer {
    public function set(string $key, mixed $value): void;
    public function get(string $key): mixed;
    public function has(string $key): bool;
}