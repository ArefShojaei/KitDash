<?php

namespace Kit\Contracts\Interfaces;


interface Stack extends Describer {
    public function push(mixed $value): void;
    public function pop(): mixed;
}