<?php

namespace Kit\Contracts\Interfaces;


interface Stack {
    public function push(mixed $value): void;
    public function pop(): mixed;
    public function toArray(): array;
}