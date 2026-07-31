<?php

namespace Kit\Structure;

use Kit\Structure\Interfaces\Stack as IStack;

final class Stack implements IStack
{
    private array $data = [];

    public function push(mixed $value): void
    {
        array_push($this->data, $value);
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            return [];
        }

        return array_pop($this->data);
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
