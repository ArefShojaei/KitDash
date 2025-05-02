<?php

namespace Kit\Container;


interface StackInterface {
    public function push(mixed $value): void;
    public function pop(): mixed;
    public function toArray(): array;
}