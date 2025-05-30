<?php

namespace Kit\Contracts\Interfaces;


interface HasConcatenation {
    public static function join(array $array, string $separator = ", "): string;
    public static function toCssStyles(array $array): string;
    public static function concat(array $array, array ...$arrays): array;
}
