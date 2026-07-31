<?php

namespace Kit\Structure\Interfaces;

use Kit\Contracts\Interfaces\Arrayable;

interface Queue extends Validatable, Arrayable
{
    public function enqueue(mixed $value): void;

    public function dequeue(): mixed;
}
