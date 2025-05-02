<?php

namespace Kit\Helpers\Providers\Array;


interface HasConcatenationInterface {
    public static function join(array $array, string $separator = ", "): string;
    public static function toCssStyles(array $array): string;
    public static function conact(array $array, array ...$arrays): array;
}
