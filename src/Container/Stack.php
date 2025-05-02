<?php

namespace Kit\Container;

use Kit\Container\StackInterface;


final class Stack implements StackInterface {
    private array $data = [];


    public function push(mixed $value): void {
        array_push($this->data, $value);
    }

    public function pop(): mixed {
        if ($this->isEmpty()) return null;

        return array_pop($this->data);
    }

    public function toArray(): array {
        return $this->data;
    }

    private function isEmpty(): bool {
        return count($this->data) ? true : false;
    }
}