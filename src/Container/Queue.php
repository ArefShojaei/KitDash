<?php

namespace Kit\Container;

use Kit\Container\QueueInterface;


final class Queue implements QueueInterface {
    private array $data = [];


    public function enqueue(mixed $value): void {
        array_push($this->data, $value);
    }

    public function dequeue(): mixed {
        if ($this->isEmpty()) return null;

        return array_shift($this->data);
    }

    public function toArray(): array {
        return $this->data;
    }

    private function isEmpty(): bool {
        return count($this->data) ? true : false;
    }
}