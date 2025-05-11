<?php

namespace Kit\Container;

use Kit\Contracts\Interfaces\Queue as IQueue;


final class Queue implements IQueue {
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