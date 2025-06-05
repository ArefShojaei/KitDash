<?php

namespace Kit\Contracts\Interfaces;


interface GraphEntity {
    public function addMeta(mixed $value): void;
    public function getMeta(): array;
}