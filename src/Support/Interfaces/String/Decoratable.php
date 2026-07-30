<?php

namespace Kit\Support\Interfaces\String;

interface Decoratable
{
    public static function squish(string $subject): string;

    public static function trim(string $subject, string $chars = " "): string;
}
