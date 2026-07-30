<?php

namespace Kit\Support\Interfaces\Array;

interface Separable
{
    public static function divide(array $array): array;

    public static function chunk(array $array, int $size): array;
}
