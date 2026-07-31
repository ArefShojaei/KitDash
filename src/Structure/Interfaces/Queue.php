<?php

namespace Kit\Structure\Interfaces;

use Kit\Support\Interfaces\Array\Arrayable;

interface Queue extends Validatable, Arrayable
{
    public function enqueue(mixed $value): void;

    public function dequeue(): mixed;
}
