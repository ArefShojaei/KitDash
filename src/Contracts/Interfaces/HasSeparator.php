<?php

namespace Kit\Contracts\Interfaces;


interface HasSeparator {
    public static function divide(array $array): array;
    public static function chunk(array $array, int $size): array;
}
