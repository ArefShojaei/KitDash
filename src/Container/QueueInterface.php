<?php

namespace Kit\Container;


interface QueueInterface {
    public function enqueue(mixed $value): void;
    public function dequeue(): mixed;
    public function toArray(): array;
}