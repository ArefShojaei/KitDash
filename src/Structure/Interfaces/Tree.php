<?php

namespace Kit\Structure\Interfaces;

use Kit\Support\Interfaces\Array\Arrayable;

interface Tree extends Arrayable
{
    public function add(mixed $child): void;
}
