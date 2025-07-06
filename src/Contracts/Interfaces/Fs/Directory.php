<?php

namespace Kit\Contracts\Interfaces\Fs;


interface Directory {
    public static function create(string $path): bool;
    public static function has(string $path): bool;
}