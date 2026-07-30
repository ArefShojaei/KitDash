<?php

namespace Kit\Support\Interfaces\String;

interface Countable
{
    public static function length(string $subject): int;

    public static function wordCount(string $subject): int;
}
