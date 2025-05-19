<?php

namespace Kit\Contracts\Interfaces;


interface Tree {
    public function add(mixed $child): void;
    public function toArray(): array;
}