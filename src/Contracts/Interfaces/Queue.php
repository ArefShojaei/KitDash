<?php

namespace Kit\Contracts\Interfaces;


interface Queue {
    public function enqueue(mixed $value): void;
    public function dequeue(): mixed;
    public function toArray(): array;
}