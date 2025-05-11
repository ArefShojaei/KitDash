<?php

namespace Kit\Contracts\Interfaces;


interface HasArrValidation {
    public static function exists(array $array, string $key): bool;
    public static function has(array $array, string $key): bool;
    public static function isAssoc(array $array): bool;
    public static function isList(array $array): bool;
}
