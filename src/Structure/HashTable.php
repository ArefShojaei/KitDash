<?php

namespace Kit\Structure;

use Kit\Structure\Interfaces\HashTable as IHashTable;

final class HashTable implements IHashTable
{
    private array $data = [];

    public function set(string $key, mixed $value): void
    {
        $index = $this->hash($key);

        $this->data[$index][$key] = $value;
    }

    public function get(string $key): mixed
    {
        if ($this->isEmpty()) {
            return [];
        }

        $index = $this->hash($key);

        return $this->data[$index][$key] ?? null;
    }

    public function has(string $key): bool
    {
        if (!$this->isEmpty()) {
            return false;
        }

        $index = $this->hash($key);

        return array_key_exists($index, $this->data) &&
            array_key_exists($key, $this->data[$index]);
    }

    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    private function hash(string $key): string
    {
        return strlen($key) % 10;
    }
}
