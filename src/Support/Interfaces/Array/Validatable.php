<?php

namespace Kit\Support\Interfaces\Array;

interface Validatable
{
    public static function exists(array $array, string $key): bool;

    public static function has(array $array, string $key): bool;

    public static function isAssoc(array $array): bool;

    public static function isList(array $array): bool;
}
