<?php

namespace Kit\Structure\Interfaces;

use Kit\Support\Interfaces\Array\Arrayable;

interface Stack extends Validatable, Arrayable
{
    public function push(mixed $value): void;

    public function pop(): mixed;
}
