<?php

namespace Kit\Structure;

use Kit\Structure\Interfaces\Queue as IQueue;

final class Queue implements IQueue
{
    private array $data = [];

    public function enqueue(mixed $value): void
    {
        array_push($this->data, $value);
    }

    public function dequeue(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->data);
    }

    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
