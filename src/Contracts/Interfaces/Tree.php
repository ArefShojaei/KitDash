<?php

namespace Kit\Contracts\Interfaces;


interface Tree extends Describer {
    public function add(mixed $child): void;
}