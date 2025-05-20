<?php

namespace Kit\Contracts\Interfaces;


interface Queue extends Describer {
    public function enqueue(mixed $value): void;
    public function dequeue(): mixed;
}