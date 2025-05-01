<?php

namespace Kit\Providers\Array;


interface HasCRUDInterface {
    public static function add(array $array, string $key, mixed $value): array;
    public static function get(array $array, string $key): mixed;
    public static function take(array $array, int $length): array;
    public static function nth(array $array, int $index): mixed;
    public static function compact(array $array): array;
    public static function last(array $array): mixed;
    public static function only(array $array, array $keys): array;
    public static function fill(array $array, mixed $value): array;
}
