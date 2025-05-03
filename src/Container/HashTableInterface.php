<?php

namespace Kit\Container;


interface HashTableInterface {
    public function set(string $key, mixed $value): void;
    public function get(string $key): mixed;
    public function has(string $key): bool;
    public function toArray(): array;
}